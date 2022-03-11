<?php

declare(strict_types=1);

require 'secondPageView.php';
require 'userRepository.php';

final class usersController
{
    public function users()
    {
        $usersView = new secondPageView();
        $usersView->userPage();

        $userRepository = new userRepository();
        $users = $userRepository->getAll();
        var_dump($users[1]->getId());
    }
}