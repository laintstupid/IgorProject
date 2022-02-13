<?php

class secondPageController
{
    public function secondIfo() {
        require 'secondPageView.php';
        $obj2 = new secondPageView();
        $obj2-> userPage();
    }

}