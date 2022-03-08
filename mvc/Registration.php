<?php

declare(strict_types=1);


class Registration
{
    public $email;
    public $pass;
    private PDO $connection;
    public $request;


    public function Register()
    {
        $this->email = filter_var(trim($_POST['Email']), FILTER_SANITIZE_STRING);
        $this->pass = filter_var(trim($_POST['Password']), FILTER_SANITIZE_STRING);
        $this->email = strip_tags($this->email);
        $this->pass = strip_tags($this->pass);
        if (mb_strlen($this->email) < 5 || mb_strlen($this->email) > 90) {
            echo 'Недопустимая длинна поля Email';
            exit();
        } elseif
        (mb_strlen($this->pass) < 2 || mb_strlen($this->pass) > 8) {
            echo 'Недопустимая длинна поля Password';
            exit();
        }

        $this->pass = md5($this->pass . "werwfs23hg41");

        $this->connection = new PDO('mysql:host=localhost;dbname=Mysql', 'root', '77143031');

        $this->request = $this->connection->query("SELECT email FROM `users` WHERE `email` = '$this->email'");
        $rows = [];
        while ($this->row = $this->request->fetch()) {
            $rows[] = $this->row;
        }
        if (count($rows) === 0) {
            $this->request = $this->connection->prepare("INSERT INTO `users` (`email`, `pass`) VALUES (?, ?)");
            $this->request->bindParam(1, $this->email);
            $this->request->bindParam(2, $this->pass);
            $this->request->execute();
        } else {
            echo 'Такой пользователь уже существует';
        }
    }
}
