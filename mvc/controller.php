<?php
class Controller1 {
    public function getInfo() {
        require 'view.php';
        $obj = new View();
        $obj->mainPage();
    }
}
