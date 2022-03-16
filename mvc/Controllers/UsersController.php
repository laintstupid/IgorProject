<?php

declare(strict_types=1);

final class UserController
{
    public function users()
    {
        $usersView = new UserPage();
        $usersView->userHomePage();

        $userRepository = new UserRepository();
        $users = $userRepository->getAll();
    }
}