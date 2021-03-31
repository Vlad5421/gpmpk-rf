<?php

// Переменные, которые отправляет пользователь
$actLink = $_SESSION['reg']['actLink'];
$email = $_SESSION['reg']['email'];
unset($_SESSION['reg']);

$body = "
<h2>Регистрация на портале ГПМПК онлайн</h2><br>
Профиль с этим email зарегистрирован на сайте https://гпмпк.рф <br>
Для активации профиля пройдите по ссылке - <br>
<a href=\"http://гпмпк.рф/self_activ/$actLink\"> https://гпмпк.рф/self_activ/$actLink</a> <br>
<hr>
Если Вы не регистрировались на сайте ГПМПК г. Омска, пожалуйста проигнорируйте это сообщение. Оно пришло Вам ошибочно.
";

require_once 'send-all.php';
