<?php
$error = (isset($_SESSION['loginError'])) ? $_SESSION['loginError'] : NULL;


// var_dumpe($user->parrentData);
?>
<div class="auth_block">
    <h1>Авторизуйтесь на портале</h1>
    <hr>

    <form action="/pages/do/login.php" id="auth_form" method="post">

        <label for="email">Введите логин (email):</label><br>
        <input type="email" class="form-control" name="email" id="email" placeholder="email">

        <label for="password">Введите пароль:</label><br>
        <input type="password" class="form-control" name="password" id="password" placeholder="пароль">
        <?php if ($error != NULL) : ?>
            <div class="auth_error">
                <span><?= $error ?></span>
            </div>
        <?php endif ?>
        <div class="btn_row">
            <button type="submit" class="btn_green">войти</button>
            <a href="/pages/do/regSet.php">
                <div class="btn_blue">зарегистрироваться</div>
            </a>
        </div>
        <hr>
        <b>ВНИМАНИЕ</b><br>
        23 ноября 2020 года на сайте ГПМПК.РФ проведено крупное обновление системы безопасности <br>
        Всвязи с этим, тем, кто регистрировался до этой даты, для работы на портале, необходимо <br>
        обновить пароль и активировать профиль:
        <a href="/make_pass" class="activate_link">Приступить</a>

    </form>
</div>
<!-- <script src="/js/jquery-3.5.1.js"></script>
<script src="/js/auth-reg.js"></script> -->

<?php

unset($_SESSION['loginError']);
unset($_SESSION['page']);

?>