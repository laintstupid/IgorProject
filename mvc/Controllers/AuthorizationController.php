<?php

declare(strict_types=1);

final class AuthorizationController
{
    public function authPage()
    {
        session_start();
        if (count($_SESSION) === 0) {
            require '/home/igorsupr/PhpstormProjects/mvc/Forms/AuthorizationForm.html';
        } else {
            header("Location: http://igor.prog/user");
        }
    }
}