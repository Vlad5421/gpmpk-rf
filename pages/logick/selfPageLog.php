<?php

$vars = [
    'id',
    'fiorod',
    'email',
    'number',
    'role',
];

$parrentData = [
    'id' => [
        'value' => '',
        'decode' => 'ID профиля в базе',
    ],
    'fiorod' => [
        'value' => '',
        'decode' => 'Ваши ФИО',
    ],
    'email' => [
        'value' => '',
        'decode' => 'Электронная почта',
    ],
    'number' => [
        'value' => '',
        'decode' => 'Ваш номер телефона',
    ],
    'role' => [
        'value' => '',
        'decode' => 'Статус на портале',
    ],
];

foreach ($vars as $key) {
    // var_dumpe($key);
    $parrentData[$key]['value'] = $_SESSION['parrentData'][$key];
}
// print_arr($parrentData);
