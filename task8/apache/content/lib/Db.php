<?php

namespace app\lib;

class Db {
    public static function connect(){
        return mysqli_connect("db", "user", "password", "shop");
    }
}