<?php

declare(strict_types=1);

final class authorizationProcess
{
    public function auth()
    {
        $email = filter_var(trim($_POST['Email']), FILTER_SANITIZE_STRING);
        $pass = filter_var(trim($_POST['Password']), FILTER_SANITIZE_STRING);

        $connection = new PDO('mysql:host=localhost;dbname=Mysql', 'root', '77143031');
        $request = $connection->prepare("SELECT pass FROM users WHERE email=:email");
        $request->execute(['email' => $email]);
        $hash = $request->fetch();

        if (password_verify($pass, $hash['pass'])) {
            session_start();
            $_SESSION['auth'] = true;
            $_SESSION['email'] = $email;
            echo 'Вы успешно вошли';
        } else {
            echo 'Пользователь не найден или неверно введён пароль';
        }
    }
}