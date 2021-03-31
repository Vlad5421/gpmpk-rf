<?php
require_once 'class/Parrent.php';

$par = new Parrent();
$res = $par->activProfile($segments[1]);

?>


<div class="auth_block">
    <h1>Активация профиля</h1>
    <hr>
    <?php if ($res) : ?>
        <div class="activ_text">
            Профиль успешно активирован. Для продолжения работы с порталом авторизуйтесь.<br>
            <a href="/page/auth" class="activate_link">Авторизоваться</a>
        </div>
    <?php else : ?>
        <div class="activ_text">
            Не удалось активировать профиль.
        </div>
    <?php endif; ?>
</div>