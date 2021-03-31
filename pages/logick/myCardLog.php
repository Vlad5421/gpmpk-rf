<?php

$id_parr = $_SESSION['parrentData']['id'];
$list = new ListCards($id_parr);
$sortedList = $list->sortingByStatus();
