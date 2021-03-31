<?php
// error_reporting(-1);
session_start();
require_once('pwd/connect.php');
require_once('rout.php');
var_dumpe(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
print_arr($_SESSION);
print_arr($segments);

?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">



    <meta charset="UTF-8">
    <title>Подать документы на ПМПК онлайн</title>
</head>

<body>
    <div class="mywrapper">

        <!--  Вставили верхнее меню  -->
        <div class="blokfull_menu ">
            <div class="logo">
                <img src="/img/logo.png" alt="ГПМПК">
            </div>
            <div class="menu_buttons">
                <a href="/add_card" class="button15">Подать документы</a>
                <a href="/pages/do/logout.php" class="button15">выход</a>
            </div>
        </div>

        <div class="telo">
            <!--  Вставили левое меню  -->
            <div class="left_nav">
                <span class="head_left_nav">Мои разделы</span>
                <div class="left">
                    <hr>
                </div>
                <a href="/self_page" class="button_left_nav">Профиль</a>
                <a href="/my_cards" class="button_left_nav">Поданные заявки</a>
                <a href="#" class="button_left_nav">Назначенные комиссии</a>
            </div>
            <div class="workspace">
                <?php
                if (file_exists($file))
                    require $file;
                else
                    echo 'pages/404.php';
                ?>
            </div>
        </div>
        <!-- Вставили футер -->
        <!-- <div class="footer">
            <div class="footer_telo">
                <span style="font-size: 20px; color:white">ДЛЯ РОДИТЕЛЕЙ - <a href="https://гпмпк.рф">форма</a></span><br>
                Городской центр психолого-педагогической, медицинской и социальной помощи - <a href="https://гцппмсп.рф">ГЦППМСП</a><br>
                Городская психолого-медикщ-педагогическая комиссия - <a href="https://гпмпк.рф">ГПМПК</a><br>
                Региональный веб-портал для родителей - <a href="https://родителям55.рф">ПОДДЕРЖКА СЕМЕЙ, ИМЕЮЩИХ ДЕТЕЙ</a><br>
            </div>
        </div> -->
    </div>

</body>

</html>