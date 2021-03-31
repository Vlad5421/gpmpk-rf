<?php

session_start();
$_SESSION['page'] = 'pages/auth.php';
unset($_SESSION['loginError']);
header('location: /');
