<?php

declare(strict_types=1);

final class registration
{
    public function register()
    {
        $email = filter_var(trim($_POST['Email']), FILTER_SANITIZE_STRING);
        $pass = filter_var(trim($_POST['Password']), FILTER_SANITIZE_STRING);
        $email = strip_tags($email);
        $pass = strip_tags($pass);

        if (mb_strlen($email) < 5 || mb_strlen($email) > 90) {
            echo 'Недопустимая длинна поля Email';
            exit();
        } elseif
        (mb_strlen($pass) < 2 || mb_strlen($pass) > 8) {
            echo 'Недопустимая длинна поля Password';
            exit();
        }

        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $connection = new PDO('mysql:host=localhost;dbname=Mysql', 'root', '77143031');

        $request = $connection->prepare('SELECT email FROM `users` WHERE email=:email');
        $request->execute(['email' => $email]);
        $rows = [];
        while ($row = $request->fetch()) {
            $rows[] = $row;
        }

        if (count($rows) === 0) {
            $request = $connection->prepare("INSERT INTO `users` (`email`, `pass`) VALUES (?, ?)");
            $request->bindParam(1, $email);
            $request->bindParam(2, $pass);
            $request->execute();
            echo "Вы успешно зарегестрировались";
        } else {
            echo 'Такой пользователь уже существует';
        }
    }
}
