<?php

class UserBase
{
    public $link;
    public $users;
    public function Base()
    {
        $this -> link = mysqli_connect('localhost', 'root', '77143031', 'Mysql');
        $this -> users = mysqli_query($this->link, "SELECT * FROM users");
        $this->users = mysqli_fetch_all($this->users);
        var_dump($this->users);
    }
}