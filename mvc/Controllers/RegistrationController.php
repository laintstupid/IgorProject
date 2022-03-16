<?php

declare(strict_types=1);

final class RegistrationController
{
    public function registerPage()
    {
        session_start();
        if (count($_SESSION) === 0) {
            require '/home/igorsupr/PhpstormProjects/mvc/Forms/RegistrationForm.html';
        } else {
            header("Location: http://igor.prog/user");
        }
    }
}