<?php
    require_once '../autoload.php';
    $validation = new Validation();
    $user_repository = new UserRepository();

    $action = $_POST['action'];

    switch ($action) {
        case 'login':
            login($_POST, $user_repository, $validation, $sessions, $redirect);
            break;
        case 'recovery_password':
            recoveryPassword($_POST, $user_repository, $validation, $sessions, $redirect, $email);
            break;
        case 'update_password':
            updatePassword($_POST, $user_repository, $validation, $sessions, $redirect);
            break;
        case 'activate':
            activate($_POST, $user_repository, $redirect);
            break;
        default:
            echo 'Action not available';
            break;
    }
        
    function login($request, $user_repository, $validation, $sessions, $redirect) {
        $alises = ['username' => 'usuario', 'password' => 'contraseña'];
        $validations = $validation->validateData($request, [
            'username' => 'required',
            'password' => 'required|min:6'
        ], $alises);

        if ($validations['status'] == 0) {
            $user = $user_repository->login($request);

            if ($user['user']) {
                if (password_verify($request['password'], $user['user']['password'])) {
                    $sessions->destroy('errors');
                    $redirect->redirectTo('/dashboard.html');
                } else {
                    $sessions->setSession('errors', ['login' => 'Usuario o contraseña invalida.']);
                    $redirect->redirectTo('/');
                }
            } else {
                $sessions->setSession('errors', ['login' => 'Usuario o contraseña invalida.']);
                $redirect->redirectTo('/');
            }
        } else {
            $sessions->setSession('errors', $validations['messages']);
            $redirect->redirectTo('/');
        }
    }

    function recoveryPassword($request, $user_repository, $validation, $sessions, $redirect, $email) {
        $alises = ['option_recovery' => 'recuperar', 'recovery' => 'usuario/email'];
        $validations = $validation->validateData($request, [
            'option_recovery' => 'required',
            'recovery'        => 'required'
        ], $alises);

        if ($validations['status'] == 0) {
            $user = $user_repository->recoveryPassword($request);
            if ($user['user']) {
                $recovery_code = rand(100000, 999999);
                $user['user']['recovery_code'] = $recovery_code;
                $user_repository->update($user['user']);
                $sessions->destroy('errors');

                sendEmail($user['user'], $email);
                $redirect->redirectTo('/forgot_password.php');
            } else {
                $sessions->setSession('errors', ['recovery_password' => 'Usuario o email invalidos.']);
                $redirect->redirectTo('/pages-register.php');
            }
        } else {
            $sessions->setSession('errors', $validations['messages']);
            $redirect->redirectTo('/pages-register.php');
        }
    }

    function updatePassword($request, $user_repository, $validation, $sessions, $redirect) {
        $alises = ['code' => 'codigo', 'new_password' => 'nueva contraseña', 'confirm_new_password' => 'confirmar nueva contraseña'];
        $validations = $validation->validateData($request, [
            'code'                 => 'required|max:6',
            'new_password'         => 'required',
            'confirm_new_password' => 'required'
        ], $alises);

        if ($validations['status'] == 0) {
            $user = $user_repository->recoveryPassword(['option_recovery' => 'recovery_code', 'recovery' => $request['code'] ]);
            if ($user['user']) {
                if ($request['new_password'] == $request['confirm_new_password']) {
                    $user['user']['password'] = password_hash($request['new_password'], PASSWORD_BCRYPT);
                    $user['user']['recovery_code'] = 0;
                    $user_repository->update($user['user']);
                    $sessions->destroy('errors');
                    $redirect->redirectTo('/');
                } else {
                    $sessions->setSession('errors', ['update_password' => 'Las contraseñas no son iguales.']);
                    $redirect->redirectTo('/forgot_password.php');
                }
            } else {
                $sessions->setSession('errors', ['update_password' => 'Codigo es invalido.']);
                $redirect->redirectTo('/forgot_password.php');
            }
        } else {
            $sessions->setSession('errors', $validations['messages']);
            $redirect->redirectTo('/forgot_password.php');
        }
    }

    function activate($request, $user_repository, $redirect) {
        $user = $user_repository->getByHash($request['hash']);
        $user['user']['status'] = 'ACTIVE';
        $user['user']['hash_activation'] = '0';
        $user_repository->update($user['user']);
        $redirect->redirectTo('/');
    }

    function sendEmail($data, $email) {
        $content['to'] = $data['email'];
        $content['nameTo'] = $data['name'] ." ". $data['last_name'];
        $content['html'] = true;
        $content['subject'] = "Actualizacion de contraseña";
        $content['body'] = "
            <body>
                <h1>Bievenido!!</h1>
                <p>El siguiente codigo es para realizar el cambio de tu contraseña en la plataforma</p>
                <p>Tu codigo es: {$data['recovery_code']}</p>
                <p>Gracias!!!</p>
            </body>
        ";
        $email->sendEmail($content);
    }