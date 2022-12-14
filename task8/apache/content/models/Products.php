<?php

namespace app\models;
use app\lib\Db;
use yii\db\ActiveRecord;
use Yii;
class Products extends ActiveRecord {
    public static function tableName()
    {
        return "products";
    }

    public static function getAll() {
        $connect = Db::connect();
        return mysqli_query($connect, "select * from products");
    }
    public static function getOne() {
        $connect = Db::connect();
        $id = Yii::$app->request->queryParams['id'];
        if($id == "") {
            return null;
        }
        $statement = mysqli_prepare($connect, 'select * from products where id = ?');
        $statement->bind_param('i', $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }
}
