<?php
error_reporting(-1);
session_start();

require_once '../../pwd/connect.php';
require_once '../class/Card.php';
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

$draft = new Card();
$draft->makeDraftCard();
header("Location: /add_files/$draft->li");
