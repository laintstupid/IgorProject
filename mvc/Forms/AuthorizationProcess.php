<?php

declare(strict_types=1);

final class AuthorizationProcess
{
    public function auth()
    {
        $email = htmlspecialchars(trim($_POST['Email']));
        $pass = htmlspecialchars(trim($_POST['Password']));
        $name = htmlspecialchars(trim($_POST['Name']));

        $validation = new UserRepository();
        $user = $validation->getByEmail($email);
        if ($user === null) {
            echo 'Такого пользователя не существует';
        }

        $hash = $user->getPass();

        if (password_verify($pass, $hash)) {
            session_start();
            $_SESSION['auth'] = true;
            $_SESSION['email'] = $email;
            header("Location: http://igor.prog/user");
        } else {
            echo 'Неверный пароль';
        }
    }
}