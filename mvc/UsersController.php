<?php

declare(strict_types=1);

require 'secondPageView.php';

final class UsersController
{
    public function users()
    {
        $usersView = new secondPageView();
        $usersView->userPage();

        $userBase = new UserBase();
        $userBase->Base();
    }
}