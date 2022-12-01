<?php

require_once "application/lib/Db.php";

class Model
{
    public mysqli $connect;
    public function __construct() {
        $db = new Db();
        $this->connect = $db->connect;
    }
}