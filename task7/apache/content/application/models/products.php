<?php
class ProductsModel extends Model {
    public function getAll() {
        return mysqli_query($this->connect, "select * from products");
    }
    public function getOne()
    {
        $id = $_GET["id"] ? intval($_GET["id"]) : "";
        if($id == "") {
            return null;
        }
        $statement = mysqli_prepare($this->connect, 'select * from products where id = ?');
        $statement->bind_param('i', $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }
}