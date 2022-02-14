<?php
require 'controller.php';
require 'secondPageController.php';
require 'UserBase.php';
if ($_SERVER['REQUEST_URI'] === '/user') {
    $userPage = new secondPageController();
    $userPage->secondIfo();
}

$mainPage = new Controller1();
$mainPage->getInfo();
$userBase = new UserBase();
$userBase -> Base();
