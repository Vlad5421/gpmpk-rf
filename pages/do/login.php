<?php

session_start();
require_once '../../pwd/connect.php';
require_once '../class/Parrent.php';

unset($_SESSION['loginError']);

if (isset($_POST) and !empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new Parrent($email);
    $user->loginUser($password);
    // var_dumpe($user->parrentData);
    if ($user->loginError == false) {
        $_SESSION['parrentData'] = $user->parrentData;
    } else {
        $_SESSION['loginError'] = $user->loginError;
    }
    // var_dumpe($user->parrentData);
} else {
    $loginError = 'Никаких данных не получено';
    $_SESSION['loginError'] = $loginError;
}

header('Location: /self_page');
