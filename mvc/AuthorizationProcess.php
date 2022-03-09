<?php

declare(strict_types=1);

class AuthorizationProcess
{
    public string $email;
    public string $pass;
    public PDO $connection;
    public object $request;

    public function auth()
    {
        $this->email = filter_var(trim($_POST['Email']), FILTER_SANITIZE_STRING);
        $this->pass = filter_var(trim($_POST['Password']), FILTER_SANITIZE_STRING);

        $this->pass = md5($this->pass . "werwfs23hg41");

        $this->connection = new PDO('mysql:host=localhost;dbname=Mysql', 'root', '77143031');
        $this->request = $this->connection->prepare("SELECT * FROM `users` WHERE email=:email AND pass=:pass");
        $this->request->execute(['email' => $this->email, 'pass' => $this->pass]);
        $rows = [];
        while ($this->row = $this->request->fetch()) {
            $rows[] = $this->row;
        }
        if (count($rows) === 0) {
            echo "Такой пользователь не найден";
            exit();
        }
    }
}