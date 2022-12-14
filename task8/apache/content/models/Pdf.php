<?php

namespace app\models;
use app\lib\Db;
class Pdf
{
    public static function getAll() {
        $connect = Db::connect();
        return mysqli_query($connect, "select ID, title from pdfs");
    }
}