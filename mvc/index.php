<?php

declare(strict_types=1);

try {
require 'mainPageController.php';
require 'usersController.php';
require 'userBase.php';
require 'registrationController.php';
require 'registration.php';
require 'authorizationController.php';
require 'authorizationProcess.php';

if ($_SERVER['REQUEST_URI'] === '/user') {
    $usersController = new usersController();
    $usersController->users();

} elseif ($_SERVER['REQUEST_URI'] === '/registration') {
    $register = new registrationController();
    $register->registerPage();

} elseif ($_SERVER['REQUEST_URI'] === '/registration-process') {
    $registerProcess = new registration();
    $registerProcess->register();

} elseif ($_SERVER['REQUEST_URI'] === '/auth') {
    $authorizationPage = new authorizationController();
    $authorizationPage->authPage();

} elseif ($_SERVER['REQUEST_URI'] === '/auth-process'){
    $authorizeProcess = new authorizationProcess();
    $authorizeProcess->auth();
} else {
    $mainPage = new mainPageController();
    $mainPage->getInfo();
}

} catch (Throwable $exception) {
    var_dump($exception->getMessage());
}
