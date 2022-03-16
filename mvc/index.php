<?php

declare(strict_types=1);

try {
require 'Require.php';

if ($_SERVER['REQUEST_URI'] === '/user') {
    $usersController = new UserController();
    $usersController->users();
} elseif ($_SERVER['REQUEST_URI'] === '/registration') {
    $register = new RegistrationController();
    $register->registerPage();
} elseif ($_SERVER['REQUEST_URI'] === '/registration-process') {
    $registerProcess = new Registration();
    $registerProcess->register();
} elseif ($_SERVER['REQUEST_URI'] === '/auth') {
    $authorizationPage = new AuthorizationController();
    $authorizationPage->authPage();
} elseif ($_SERVER['REQUEST_URI'] === '/auth-process'){
    $authorizeProcess = new AuthorizationProcess();
    $authorizeProcess->auth();
} elseif ($_SERVER['REQUEST_URI'] === '/updating'){
    $updatingProcess = new UpdateNameController();
    $updatingProcess->nameUpdate();
} else {
    $mainPage = new MainPageController();
    $mainPage->render();
}
} catch (Throwable $exception) {
    var_dump($exception->getMessage());
}