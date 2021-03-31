<?php
require_once 'class/Parrent.php';
require_once 'logick/regLog.php';

if (isset($_SESSION['reg']['email']) and !empty($_SESSION['reg']['email'])) {
    if (isset($_SESSION['reg']['actLink']) and !empty($_SESSION['reg']['actLink'])) {
        require_once 'mail/send-reg.php';
        $okey = 'На указанный email отправленно письмо с ссылкой для активации профиля.';
    }
}

?>
<div class="auth_block">
    <h1>Регистрация</h1>
    <hr>

    <form action="" id="reg_form" method="post">

        <label for="fiorod">Ваши Фамлия Имя Отчество:</label><br>
        <input type="fiorod" class="form-control" name="fiorod" id="email" placeholder="ФИО">

        <label for="email">Введите email:</label><br>
        <input type="email" class="form-control" name="email" id="email" placeholder="email">

        <label for="numbe">Укажите телефон (11 цифр: 89ххххххххх):</label><br>
        <input type="number" class="form-control" name="numbe" id="number" placeholder="телефон">

        <label for="pass">Создайте пароль:</label><br>
        <input type="password" class="form-control" name="pass" id="pass" placeholder="пароль">
        <?php if ($error != NULL) : ?>
            <div class="auth_error">
                <?php foreach ($error as $er) : ?>
                    <span><?= $er ?></span><br>
                <?php endforeach; ?>
            </div>
        <?php endif ?>
        <?php if (isset($okey)) : ?>
            <div class="reg_ok">
                <?= $okey ?>
            </div>
        <?php endif ?>
        <div class="btn_row">
            <button type="submit" class="btn_blue reg_btn">зарегистрироваться</button>
            <a href="/pages/do/authSet.php">
                <div class="btn_green">авторизоваться</div>
            </a>
        </div>
    </form>
</div>