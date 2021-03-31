<?php

class ListCards
{
    public $parrentData = [];
    public $baseLink;
    public $countCards;
    public $cards = [];
    public $cardsByStatus = [];
    public $statuses = array(
        0 => [
            'name' => 'new',
            'str' => 'Ожидают записи',
        ],
        1 => [
            'name' => 'in_queue',
            'str' => 'Записаные',
        ],
        2 => [
            'name' => 'rejected',
            'str' => 'Отклонённые',
        ],
        3 => [
            'name' => 'arhived',
            'str' => 'В архиве',
        ],
        4 => [
            'name' => 'draft',
            'str' => 'Черновики',
        ],
    );


    function __construct($id_parr)
    {
        global $bz;
        $this->baseLink = $bz;
        // Получаем данные всех заявок поданных этим родителем
        $sql = "SELECT * FROM zapis_card WHERE id_parrent = '$id_parr'";
        $prepare = $this->baseLink->query($sql)->fetchAll();
        $this->cards = $prepare;
        // Устанавливаем количество д=поданных им заявок
        $this->countCards = count($this->cards);
        // Получаем основные данные родителя
        $this->parentData = $_SESSION['parrentData'];
        // Создаем список заявок, сортированный по статусу
        // $this->cardsByStatus = $this->sortingByStatus();
    }

    function sortingByStatus()
    {
        $cards = $this->cards;
        $sortedList = [];
        foreach ($this->statuses as $key => $value) {
            $sortedList[$value['str']] = [];
        }
        foreach ($cards as $card) {
            $name = $this->statuses[$card['status']]['str'];
            array_push($sortedList[$name], $card);
        }
        return $sortedList;
    }
}
