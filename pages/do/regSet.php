<?php

session_start();
$_SESSION['page'] = 'pages/registration.php';
header('location: /');
