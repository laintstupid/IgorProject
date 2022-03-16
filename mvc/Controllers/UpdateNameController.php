<?php

declare(strict_types=1);

final class UpdateNameController
{
    public function nameUpdate()
    {
        $connection = new PDO('mysql:host=localhost;dbname=Mysql', 'root', '77143031');
        $name = $_POST['name'];

        session_start();
        $email = $_SESSION['email'];

        $connection->exec("UPDATE users SET name = '$name' WHERE email = '$email'");
        header("Location: http://igor.prog/user");
    }
}
