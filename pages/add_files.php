<?php
require_once 'class/Card.php';
require_once 'inputs.php';

$idCard = $segments[1];
// СОХРАНИМ НОМЕР ЗАЯВКИ В СЕССИЮ ДЛЯ ПЕРЕИМЕНОВАНИЯ ПРИ АЯКС ЗАГРУЗКЕ
$_SESSION['id_making_card'] = $idCard;
// var_dumpe($_SESSION);

$card = new Card();
$cardData = $card->getCardData($idCard);
require_once 'uploadFilesList.php';

//Расшифровка хранимых в БД абревиатур для html
$prichDecod = $fieldsFormData['prich'][$cardData[0]['prich']];
$cardData[0]['prich'] = $prichDecod;

// Человеческое переименование полей БД для html
$fields = array(
    "id" => "Номер заявки",
    "fioreb" => "ФИО ребенка",
    "dateroj" => "Дата рождения ребенка",
    "school" => "Школа/садик",
    "class" => "класс/группа",
    "organnapr" => "Направивший орган",
    "prich" => "Причина направления на ПМПК",
    "datepredpmpk" => "Дата предыдущей комиссии",
    "namepredpmpk" => "Наименование предыдущей комиссии",
);

// echo $_SERVER['HTTP_HOST'];
?>


<div class="page_head_div">
    <h1>Подать документы на ПМПК</h1>
    <span class="h1">Проверьте данные и прикрепите к обращению необходимые документы:</span>
</div>
<div class="list_block">
    <!--  вЫВОД ДАННЫХ КАРТОЧКИ ДЛЯ ПЕРЕПРОВЕРКИ  -->
    <?php foreach ($fields as $key => $val) : ?>
        <span><b><?= $val ?>: </b> <?= $cardData[0][$key] ?></span><br>
    <?php endforeach ?>
</div>
<div class="list_block">
    <!--  ВЫВОД СПИСКА НЕОБХОДИМЫХ ДОКУМЕНТОВ ДЛb>
    <!-- ОБЯЗАТЕЛЬНЫЕ -->
    <span class="h1">Для отправки на рассмотрение необходимо прикрепить следующие документы:</span><br>
    <ol>
        <span><b>Обязательно:</b></span><br>
        <?php foreach ($filesList['required'] as $nameDoc => $NameDocFile) : ?>
            <li><?= $nameDoc ?></li>
        <?php endforeach ?>
        <!--  ПРИ НАЛИЧИИ  -->
        <span><b>При наличии:</b></span><br>
        <?php foreach ($filesList['option'] as $nameDoc => $NameDocFile) : ?>
            <li><?= $nameDoc ?></li>
        <?php endforeach ?>
    </ol>
    <hr>

    <div class="wrapper_img">
        <div class="file_upload_div">
            <!-- <input type="file" multiple="multiple" accept=".txt,image/*"> -->
            <input type="file" multiple="multiple">
            <a href=" #" class="upload_files button_files">Загрузить файлы</a>
            <div class="ajax-reply">

            </div>
        </div>
        <div class="process_upload">
            <span>Подождите пока файл загрузится</span>
            <img src="/img/circle.gif" alt>
        </div>
    </div>
    <hr><a href="/sended_card/<?= $idCard ?>">
        <div class="btn_green add_files_button" id="parenDataOk">
            завершить и отправить
        </div>
    </a>
</div>


<script type='text/javascript' src='/js/jquery-3.5.1.js'></script>
<script type='text/javascript' src="/js/uploadFiles.js"></script>