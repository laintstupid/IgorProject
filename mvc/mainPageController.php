<?php

declare(strict_types=1);

require 'view.php';

final class mainPageController
{
    public function getInfo()
    {
        $obj = new View();
        $obj->mainPage();
    }
}
