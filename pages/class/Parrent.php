<?php

class Parrent
{

    public $baseLink;
    public $actLink;
    public $parrentDataFields = [
        'id',
        'fiorod',
        'email',
        'number',
        'pass',
        'role'
    ];
    public $parrentData = [];
    public $loginError = 'не логинились';


    public function __construct($email = NULL)
    {
        global $bz;
        $this->baseLink = $bz;
        $this->parrentData['email'] = $email;
    }

    function dataUser($email)
    {
        $quer = $this->baseLink->prepare("SELECT * FROM parrents WHERE `email` = ?");
        $quer->execute([$email]);
        return $quer->fetchAll();
    }

    function checkPass($row)
    {
        $pass = $this->parrentData['pass'];
        // Проверяем пароль
        if (password_verify($row, $pass)) {
            $mes = false;
        } else {
            $mes = 'Неверный пароль.';
        }
        return $mes;
    }

    function checkAct()
    {
        $row = $this->baseLink->prepare("SELECT * FROM parrents WHERE `email` = ? LIMIT 1");
        $row->execute([$this->parrentData['email']]);
        $data = $row->fetch();
        // var_dumpe($data);
        if ($data['act_status'] == true) {
            foreach ($this->parrentDataFields as $key) {
                $this->parrentData[$key] = $data[$key];
            }
            return $data['act_status'];
        } else {
            return false;
        }
    }


    function checkUserEmail($email)
    {
        // Проверяем наличие пользователя с таким email-ом
        $quer = $this->baseLink->prepare("SELECT COUNT(0) AS 'row_count' FROM parrents WHERE `email` = ?");
        $quer->execute([$email]);
        $res = $quer->fetch();
        if ($res['row_count'] > 0) {
            return true;
        } else {
            return false;
        }
    }
    function checkUserNumber($number)
    {
        // Проверяем наличие пользователя с таким email-ом
        $quer = $this->baseLink->prepare("SELECT COUNT(0) AS 'row_count' FROM parrents WHERE `number` = ?");
        $quer->execute([$number]);
        $res = $quer->fetch();
        if ($res['row_count'] > 0) {
            return true;
        } else {
            return false;
        }
    }

    function loginUser($row)
    {
        //Проверяем наличие юзера.
        if ($this->checkUserEmail($this->parrentData['email'])) {
            //Проверяем активацию
            if ($this->checkAct($this->parrentData['email'])) {
                //Чекаем пароль и логиним юзера (fals == успех)
                if ($this->checkPass($row) == false) {
                    $this->loginError = false;
                } else {
                    $this->loginError = 'неправильный пароль';
                }
            } else {
                $this->loginError = 'акккаунт не активирован по ссылке в письме';
            }
        } else {
            $this->loginError = 'пользователя не существует';
        }
    }

    function regParrent($data)
    {
        if ($this->checkUserEmail($data['email'])) {
            return 'Пользователь с таким email уже существует';
        } else {
            //создаем ссылку для активации
            $coding = $data['pass'] . $data['email'];
            $data['act_link'] = password_hash($coding, PASSWORD_DEFAULT);
            $this->actLink = $data['act_link'];
            //Добавляем пользователя в БД и в свойства объекта
            $data['pass'] = password_hash($data['pass'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO parrents (fiorod, email, `number`, pass, act_link) VALUES (:fiorod, :email, :numbe, :pass, :act_link)";
            $stmt = $this->baseLink->prepare($sql);
            $stmt->execute($data);
            return false;
        }
    }

    function activProfile($link)
    {
        $quer = $this->baseLink->prepare("SELECT COUNT(0) AS 'row_count' FROM parrents WHERE act_link = '$link'");
        $quer->execute();
        $res = $quer->fetch();
        if ($res['row_count'] > 0) {
            $query = $this->baseLink->prepare("UPDATE parrents SET act_status = 1 WHERE act_link = '$link'");
            $query->execute();
            return true;
        } else {
            return false;
        }
    }

    function makeNewPassword($post)
    {
        if ($this->checkUserNumber($post['numbe'])) {
            //находим юзера по номеру телефона
            $row = $this->baseLink->prepare("SELECT * FROM parrents WHERE `number` = ? LIMIT 1");
            $row->execute([$post['numbe']]);
            $data = $row->fetch();
            // var_dumpe($data);
            // получаем и устанавливаем email
            $this->parrentData = $data;
            //создаем ссылку для активации
            $coding = $post['pass'] . $data['email'];
            // var_dumpe($coding);
            $this->actLink = password_hash($coding, PASSWORD_DEFAULT);
            // обновляем данные в пользователе
            $pass = password_hash($post['pass'], PASSWORD_DEFAULT);
            $actLink = $this->actLink;
            $number = $post['numbe'];
            // var_dumpe($number);
            $row = $this->baseLink->prepare("UPDATE parrents SET pass = ?, act_link = ? WHERE `number` = ?");
            try {
                $row->execute([$pass, $actLink, $number]);
                $err = false;
            } catch (PDOException $e) {
                $err = $e->getMessage();
            }
            return $err;
        }


        // устанавливаем новый пароль

    }
}
