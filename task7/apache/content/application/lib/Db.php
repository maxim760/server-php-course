<?php

class Db {
    public mysqli $connect;
    public function __construct(){
        $this->connect = mysqli_connect("db", "user", "password", "shop");
    }
}
