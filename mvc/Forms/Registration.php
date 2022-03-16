<?php

declare(strict_types=1);

final class Registration
{
    public function register()
    {
        $email = htmlspecialchars(trim($_POST['Email']));
        $pass = htmlspecialchars(trim($_POST['Password']));
        $name = htmlspecialchars(trim($_POST['Name']));
        $email = strip_tags($email);
        $pass = strip_tags($pass);
        $name = strip_tags($name);

        if (mb_strlen($name) < 2 || mb_strlen($name) > 30) {
            echo 'Недопустимая длинна поля Name';
            exit();
        } elseif (mb_strlen($email) < 5 || mb_strlen($email) > 90) {
            echo 'Недопустимая длинна поля Email';
            exit();
        } elseif (mb_strlen($pass) < 2 || mb_strlen($pass) > 8) {
            echo 'Недопустимая длинна поля Password';
            exit();
        }

        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $connection = new PDO('mysql:host=localhost;dbname=Mysql', 'root', '77143031');

        $userRepository = new UserRepository();
        $user = $userRepository->getByEmail($email);

        if ($user === null) {
            session_start();
            $_SESSION['auth'] = true;
            $_SESSION['email'] = $email;
            $request = $connection->prepare("INSERT INTO `users` (`email`, `pass`, `name`) VALUES (?, ?, ?)");
            $request->bindParam(1, $email);
            $request->bindParam(2, $pass);
            $request->bindParam(3, $name);
            $request->execute();
            header("Location: http://igor.prog/user");
        } else {
            echo 'Такой пользователь уже существует';
        }
    }
}
