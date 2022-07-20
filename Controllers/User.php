<?php
    require_once '../autoload.php';

    $action = $_POST['action'];

    switch ($action) {
        case 'store':
            store($_POST, $user_repository, $validation, $sessions, $redirect, $email);
            break;
        case 'all':
            recoveryPassword($_POST, $user_repository, $validation, $sessions, $redirect, $email);
            break;
        case 'update_password':
            updatePassword($_POST, $user_repository, $validation, $sessions, $redirect);
            break;
        default:
            echo 'Action not available';
            break;
    }

    function store($request, $user_repository, $validation, $sessions, $redirect, $email) {
        $alises = ['identification' => 'identificacion', 'name' => 'nombres', 'last_name' => 'apellidos',
        'email' => 'correo electronico', 'type' => 'tipo usuario', 'username' => 'usuario', 'password' => 'contraseña',
        'dep_prog' => 'programa'];
        $validations = $validation->validateData($request, [
            'identification' => 'required|numeric', 
            'name'           => 'required|alpha_spaces|max:100', 
            'last_name'      => 'required|alpha_spaces|max:100',
            'email'          => 'required|email|max:150', 
            'type'           => 'required|numeric', 
            'username'       => 'required|alpha_num|max:20', 
            'password'       => 'required|min:6|max:20',
            'dep_prog'       => 'required|numeric'
        ], $alises);

        if ($validations['status'] == 0) {
            $request['password'] = password_hash($request['password'], PASSWORD_BCRYPT);
            $request['hash_activation'] = ($request['id'] == 0) ? hash('sha256', $request['password']) : 0;
            $user = ($request['id'] == "0") ? $user_repository->create($request) : $user_repository->update($request);

            if ($user['status'] == 1) {
                $sessions->destroy('errors');
                $sessions->setSession('success', $user);
                $redirect->redirectTo('/users');

                ($request['id'] == "0") ? sendEmail($request, $email) : '';
            }
        } else {
            $sessions->setSession('errors', $validations['messages']);
            $redirect->redirectTo('/users/store.php');
        }
    }

    function sendEmail($data, $email) {
        $content['to'] = $data['email'];
        $content['nameTo'] = $data['name'] ." ". $data['last_name'];
        $content['html'] = true;
        $content['subject'] = "Bienvenido a nuestro administrador";
        $url = " http://localhost/admin/activar.php?key={$data['hash_activation']}";
        $content['body'] = "
            <body>
                <h1>Bievenido {$content['nameTo']}</h1>
                <p>Te damos la bienvenido a nuestro administrador, para activar tu cuenta el paso final es ir a dar clic <a href='{$url}'>AQUI</a> para activar tu cuenta</p>
                <p>Gracias!!!</p>
            </body>
        ";
        $email->sendEmail($content);
    }