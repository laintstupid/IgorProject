<?php

declare(strict_types=1);

final class MainPageController
{
    public function render()
    {
        $view = new HomePage();
        $view->mainPage();
    }
}
