<?php

declare(strict_types=1);

require 'controller.php';
require 'UsersController.php';
require 'UserBase.php';

if ($_SERVER['REQUEST_URI'] === '/user') {
    $usersController = new UsersController();
    $usersController->users();
} else {
    $mainPage = new MainPageController();
    $mainPage->getInfo();
}
