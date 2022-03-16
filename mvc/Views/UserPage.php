<?php

declare(strict_types=1);

final class UserPage
{
    public function userHomePage()
    {
        require 'UserPage.html';

        session_start();
        $email = $_SESSION['email'];

        $info = new UserRepository();
        $user = $info->getByEmail($email);

        $userId = $user->getId();
        $userEmail = $user->getEmail();
        $userName = $user->getName();

        echo ($userId) . "<br>";
        echo ($userEmail) . "<br>";
        echo ($userName) . "<br>";
    }
}