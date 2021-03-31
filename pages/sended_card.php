<?php
require_once 'class/Card.php';
require_once 'logick/sendedCardLog.php';
if (isset($id_making_card) and !empty($id_making_card)) {
    require_once "mail/send-rq.php";
}
?>

<div class="list_block">
    <div class="page_head_div">
        <h1><?= $pageHead ?></h1>
        <span>
            <?php if (isset($result) and $result == 'success') : ?>
                <p>
                    На электронную почту <b><?= $email ?></b> отправленно сообщение.
                </p>
            <?php else : ?>
                <p>
                    У нас не получилось отправить письмо на почту <b><?= $_SESSION['parrentData']['email'] ?></b>
                </p>
            <?php endif; ?>
            <p>
                Еще раз проверьте правильность электронной почты, и если нашли ошибку, позвоните по номеру <b>77-77-79</b> и сообщите, что неправильно указали почту.
            </p>
            <p>
                Иначе мы не сможем оповестить Вас о том, на какие дату и время назначена комиссия.
            </p>
        </span>
    </div>
</div>