<?php

declare(strict_types=1);

try {
require 'MainPageController.php';
require 'UsersController.php';
require 'UserBase.php';
require 'RegistrationController.php';
require 'Registration.php';
require 'AuthorizationController.php';
require 'AuthorizationProcess.php';

if ($_SERVER['REQUEST_URI'] === '/user') {
    $usersController = new UsersController();
    $usersController->users();

} elseif ($_SERVER['REQUEST_URI'] === '/registration') {
    $register = new RegistrationController();
    $register->registerPage();

} elseif ($_SERVER['REQUEST_URI'] === '/registration-process') {
    $registerProcess = new Registration();
    $registerProcess->Register();

} elseif ($_SERVER['REQUEST_URI'] === '/auth') {
    $authorizationPage = new AuthorizationController();
    $authorizationPage->AuthPage();

} elseif ($_SERVER['REQUEST_URI'] === '/auth-process'){
    $authorizeProcess = new AuthorizationProcess();
    $authorizeProcess->auth();

} else {
    $mainPage = new MainPageController();
    $mainPage->getInfo();
}
} catch (Throwable $exception) {
    var_dump($exception->getMessage());
}
