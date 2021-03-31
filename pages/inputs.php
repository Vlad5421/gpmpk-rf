<?php



$rod = $_SESSION['parrentData']['fiorod'];
$emailo = $_SESSION['parrentData']['email'];
$numbero = $_SESSION['parrentData']['number'];
$tag = '<b>*</b>';

$fieldsFormData = [
  'all' => [
    [
      'label' => 'Фамилия, имя, отчество родителя/законного представителя ребенка, подающего заявление: ',
      'name' => 'fiorod',
      'value' => "$rod",
      'type' => 'text',
      'required' => 'required',
      'disabled' => 'disabled'
    ],
    ['label' => 'Электронная почта: ', 'name' => 'email', 'value' => "$emailo", 'type' => 'email', 'required' => 'required', 'disabled' => 'disabled'],
    ['label' => 'Номер телефона 11 цифр (89ххххххххх): ', 'name' => 'number', 'value' => "$numbero", 'type' => 'text', 'required' => 'required', 'disabled' => 'disabled'],
    // [
    //   'label' => 'Цель направления на ПМПК: ', 'name' => 'prich', 'value' => "$pricho", 'type' => 'text', 'required' => 'required', 'disabled' => 'readonly'
    // ],
    [
      'label' => 'Фамилия Имя Отчество ребёнка: ',
      'type' => 'text',
      'name' => 'fioreb',
      'required' => 'required',
      'disabled' => '',
      'value' => ''
    ],
    [
      'label' => 'Дата рождения ребёнка: ', 'type' => 'date', 'name' => 'dateroj', 'required' => 'required', 'disabled' => '', 'value' => ''
    ],
    [
      'label' => 'Наименование организации, направившей ребенка на ПМПК: ', 'type' => 'text', 'name' => 'organnapr', 'required' => 'required', 'disabled' => '', 'value' => ''
    ],
    [
      'label' => 'Наименование организации, в которой обучается ребенок: ', 'type' => 'text', 'name' => 'school', 'required' => 'required', 'disabled' => '', 'value' => ''
    ],
    [
      'label' => 'Класс/группа: ', 'type' => 'text', 'name' => 'class', 'required' => 'required', 'disabled' => '', 'value' => ''
    ],
    [
      'label' => 'Дата предыдущего прохождения ПМПК (если было): ', 'type' => 'date', 'name' => 'datepredpmpk', 'required' => '', 'disabled' => '', 'value' => ''
    ],
    ['label' => 'Наименование ПМПК, которую проходил ребенок (если было): ', 'type' => 'text', 'name' => 'namepredpmpk', 'required' => '', 'disabled' => '', 'value' => '']
  ],
  'prich' =>
  [
    'oopsh' => 'Определение образовательной программы школьника',
    'oopd' => 'Определение образовательной программы дошкольника',
    'gia' => 'Определение условий прохождения ГИА',
    'mse1' => 'Первичное освидетельствование на МСЭ',
    'mse2' => 'Повторное освидетельствование на МСЭ',
  ]
];
