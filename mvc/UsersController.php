<?php

declare(strict_types=1);

require 'secondPageView.php';
require 'UserRepository.php';

final class UsersController
{
    public function users()
    {
        $usersView = new secondPageView();
        $usersView->userPage();

        $userRepository = new UserRepository();
        $users = $userRepository->getAll();
        var_dump($users[1]->getId());
    }
}