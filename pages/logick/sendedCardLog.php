<?php
if (isset($_SESSION['id_making_card'])) {
    $id_making_card = $_SESSION['id_making_card'];
    unset($_SESSION['id_making_card']);
    $email = $_SESSION['parrentData']['email'];
    $nameRod = $_SESSION['parrentData']['fiorod'];

    $card = new Card();
    $card->changeStatusCard($id_making_card, 'new');

    $pageHead = 'Ваше обращение под номером' . $id_making_card . ' отправленно на обработку';
} else {
    $id_making_card = NULL;
    $pageHead = 'Отправить обращение на обработку можно только после изменения данных или добавления к нему документов.';
}
