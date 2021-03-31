<?php
require_once 'class/listCards.php';
require_once 'logick/myCardLog.php';

?>
<div class="page_head_div">
    <h1>Список поданных вами обращений:</h1>
</div>
<?php foreach ($sortedList as $blName => $blCards) : ?>
    <div class="list_block">
        <span class="h1">
            <?= $blName ?>
        </span>
        <?php foreach ($blCards as $card) : ?>

            <div class="my_cards_card">
                № <?= $card['id'] ?><br>
                ФИО ребенка: <?= $card['fioreb'] ?><br>
                дата рождения ребенка: <?= $card['dateroj'] ?><br>
                Цель прохождения комиссии: <?= $card['prich'] ?><br>
                Дата обращения: <?= $card['date'] ?><br>
                Комментарий проверяющего: <?= $card['comment'] ?><br>
                <a href="/add_files/<?= $card['id'] ?>">
                    <div class="btn_orange">
                        добавить документы
                    </div>
                </a>

            </div>

        <?php endforeach; ?>
    </div>
<?php endforeach; ?>