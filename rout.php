<?php

function paseUri()
{
    $res = [];
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $first = (stristr(trim($uri, '/'), '/', true) == false) ? trim($uri, '/') : stristr(trim($uri, '/'), '/', true);
    array_push($res, $first);
    $second = stristr(trim($uri, '/'), '/', false);
    array_push($res, trim($second, '/'));

    return ($_SERVER['REQUEST_URI'] == '/') ? ['self_page'] : $res;
}

if (!isset($_SESSION['parrentData']) or empty($_SESSION['parrentData']['id'])) {
    if (!empty($_SESSION['page'])) {
        $file = $_SESSION['page'];
    } else {
        $segments = paseUri();
        if ($segments[0] == 'self_activ' or $segments[0] == 'make_pass') {
            $file = 'pages/' . $segments[0] . '.php';
        } else {
            $file = ($segments[0] == 'self_activ') ? 'pages/self_activ.php' : 'pages/auth.php';
        }
    }
} else {
    unset($_SESSION['page']);
    $segments = paseUri();
    if ($segments[0] == '') {
        $segments[0] == 'self_page';
    }
    $file = 'pages/' . $segments[0] . '.php';
}
