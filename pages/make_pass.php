<?php

require_once 'class/Parrent.php';
require_once 'logick/makePassLog.php';

if (isset($_SESSION['reg']['email']) and !empty($_SESSION['reg']['email'])) {
    if (isset($_SESSION['reg']['actLink']) and !empty($_SESSION['reg']['actLink'])) {
        require_once 'mail/sendMakePass.php';
        $okey = 'На email ' . $email . ' отправленно письмо с ссылкой для активации профиля.';
    }
}

?>

<div class="auth_block">
    <h1>Обновление пароля</h1>
    <form action="" method="post">

        <label for="numbe">Укажите телефон (11 цифр: 89ххххххххх):</label><br>
        <input type="number" class="form-control" name="numbe" id="number" placeholder="телефон">

        <label for="pass">Укажите новый пароль:</label><br>
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
            <button type="submit" class="btn_blue reg_btn">обновить пароль</button>

        </div>

    </form>
</div>