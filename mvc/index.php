<?php

declare(strict_types=1);

try {

require 'controller.php';
require 'UsersController.php';
require 'UserBase.php';
require 'SELECT.php';


if ($_SERVER['REQUEST_URI'] === '/user') {
    $usersController = new UsersController();
    $usersController->users();
} else {
    $mainPage = new MainPageController();
    $mainPage->getInfo();
}

$connect = new PDO('mysql:host=localhost;dbname=Mysql',  'root', '77143031');
$qb = new queryBuilder($connect);
$qb->select('name, birth');
$qb->from('users');
$qb->where('id > 2');
$qb->groupBy('name');
$qb->having('AVG(birth)');
$qb->orderBy('name');
$qb->fetchAll();

} catch (Throwable $exception) {
    var_dump($exception->getMessage());
}
