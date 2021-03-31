<?php

$error = [];

if (isset($_POST) and !empty($_POST)) {
    if ($_POST['fiorod'] == '' or $_POST['email'] == '' or $_POST['numbe'] == '' or $_POST['pass'] == '') {
        if ($_POST['fiorod'] == '') array_push($error, 'Не указаны ФИО');
        if ($_POST['email'] == '') array_push($error, 'Не указан email');
        if ($_POST['numbe'] == '') array_push($error, 'Не указан телефон');
        if ($_POST['pass'] == '') array_push($error, 'Вы не ввели пароль');
    } else {
        $par = new Parrent($_POST['email']);
        $reg = $par->regParrent($_POST);
        // Если регистрация вернет false, значит регистрация прошла успешно
        if ($reg == false) {
            unset($_SESSION['page']);
            $_SESSION['reg']['actLink'] = $par->actLink;
            $_SESSION['reg']['email'] = $par->parrentData['email'];
        } else {
            array_push($error, $reg);
        }
    }
}
