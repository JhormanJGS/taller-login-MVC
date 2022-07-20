<?php
    require('vendor/autoload.php');
    
    require_once 'Utils/validation.php';
    require_once 'Utils/session.php';
    require_once 'Utils/redirect.php';
    require_once 'Utils/email.php';
    require_once 'Libs/Conexion.php';
    require_once 'Models/User.php';
    require_once 'Repository/User.php';

    $sessions = new Sesssion();
    $redirect = new Redirect();
    $email = new Email();

    $validation = new Validation();
    $user_repository = new UserRepository();