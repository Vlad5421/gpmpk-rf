<?php

require_once 'inputs.php';

?>
<div class="page_head_div">
    <h1>Подать документы на ПМПК</h1>
    <span class="h1">Проверьте и заполните данные:</span>
</div>
<div class="list_block">
    <form action="pages/do/make_draft_card.php" method="post" id="form_pmpk">
        <div class="check_perent_data">


            <!-- <hr> -->
            <?php foreach ($fieldsFormData['all'] as $field) : ?>
                <div class="item">
                    <label for="fiorod"><b><?= $field['label'] ?></b></label><input type="<?= $field['type'] ?>" name="<?= $field['name'] ?>" id="<?= $field['name'] ?>" value="<?= $field['value'] ?>" class="form-control">
                </div>
            <?php endforeach; ?>
            <label class="prich">Причина направления на ПМПК:</label>
            <div class="item">
                <?php foreach ($fieldsFormData['prich'] as $key => $val) : ?>
                    <input type="radio" name="prich" value="<?= $key ?>">
                    <label><?= $val ?></label><br>
                <?php endforeach; ?>
            </div>
            <div class="item">
                <input type="checkbox" name="snopdrod" id="snopdrod" autocomplete=off required>
                <label for="snopdrod">Согласие на обработку персональных данных родителя/законного представителя ребенка, подающего заявление: </label>
            </div>
            <div class="item">
                <input type="checkbox" name="snopdreb" id="snopdreb" autocomplete=off required>
                <label for="snopdreb">Согласие на обработку персональных данных ребенка: </label>
            </div>

            <div class="btn_row">
                <a id="cancel_add_card" href="/self_page">
                    <div class="btn_red">
                        отменить
                    </div>
                </a>
                <div class="btn_green send" id="parenDataOk">
                    верно
                </div>
            </div>

        </div>


    </form>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/form_maker.js"></script>
</div>