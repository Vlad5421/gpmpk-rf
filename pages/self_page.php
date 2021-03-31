<?php

require_once 'logick/selfPageLog.php';

?>

<div class="list_block self_block">
    <div class="page_head_div">
        <h1><?= $parrentData['fiorod']['value'] ?></h1>
    </div>
    <ul class="self_ul">
        <?php foreach ($parrentData as $field) : ?>
            <li><b><?= $field['decode'] ?>:</b> <?= $field['value'] ?></li>
        <?php endforeach; ?>
    </ul>
    <hr>
    <div class="self_remake">
        <form action="">
            <label for="fiorod"></label>
            <include></include>

        </form>
    </div>
</div>