<?php

declare(strict_types=1);

require 'view.php';

final class MainPageController
{
    public function getInfo()
    {
        $obj = new View();
        $obj->mainPage();
    }
}
