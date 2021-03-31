<?php
error_reporting(-1);


class Card
{

    public $li;
    public $statuses = array(
        'new' => [
            'id' => 0,
            'str' => 'Не обработанные',
        ],
        'in_queue' => [
            'id' => 1,
            'str' => 'Записаные',
        ],
        'rejected' => [
            'id' => 2,
            'str' => 'Отклонённые',
        ],
        'arhived' => [
            'id' => 3,
            'str' => 'В архиве',
        ],
        'draft' => [
            'id' => 4,
            'str' => 'Черновик',
        ],
    );

    public function changeStatusCard($id_card, $new_stat)
    {
        global $bz;

        $data = [
            'stat' => $this->statuses[$new_stat]['id'],
            'id' => $id_card
        ];
        $sql = "UPDATE zapis_card SET `status`=:stat WHERE id=:id";
        $stmt = $bz->prepare($sql);
        $stmt->execute($data);
    }

    public function makeDraftCard()
    {
        global $bz;
        $id_parrent = $_SESSION['parrentData']['id'];
        $status = $this->statuses['draft']['id'];
        $comment = 'пусто';
        extract($_POST);
        $snopdrod = true;
        $snopdreb = true;
        $organnapr = $_POST['organnapr'];
        $prich = $_POST['prich'];
        $fioreb = $_POST['fioreb'];
        $dateroj = $_POST['dateroj'];
        $school = $_POST['school'];
        $class = $_POST['class'];
        $datepredpmpk = ($_POST['datepredpmpk'] == '') ? '0000-00-00' : $_POST['datepredpmpk'];
        $namepredpmpk = $_POST['namepredpmpk'];
        $sql = "INSERT INTO zapis_card(`id_parrent`, `organnapr`, `prich`, `fioreb`, `dateroj`, `school`, `class`, `datepredpmpk`, `namepredpmpk`, `snopdrod`, `snopdreb`, `status`, `comment`) VALUES ('$id_parrent', '$organnapr', '$prich', '$fioreb', '$dateroj',  '$school', '$class', '$datepredpmpk', '$namepredpmpk',  '$snopdrod', '$snopdreb', '$status', '$comment')";
        $bz->query($sql);
        // $stmt->execute();
        $this->li = $bz->lastInsertId();
    }

    function reparseDate($d)
    {
        if ($d == '0000-00-00') {
            $r = 'нет';
        } else {
            $dateData = date_parse_from_format("Y-m-d", $d);
            $r = $dateData['day'] . '.' . $dateData['month'] . '.' . $dateData['year'];
        }
        return $r;
    }

    public function getCardData($id)
    {
        global $bz;

        $sql = "SELECT * FROM zapis_card WHERE id = ?";
        $res = $bz->prepare($sql);
        $res->execute([$id]);
        $data = $res->fetchAll();
        $data[0]['dateroj'] = $this->reparseDate($data[0]['dateroj']);
        $data[0]['datepredpmpk'] = $this->reparseDate($data[0]['datepredpmpk']);
        return $data;
    }
}
