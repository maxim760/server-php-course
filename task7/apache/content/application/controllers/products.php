<?php
class ProductsController extends Controller {
    public function __construct()
    {
        parent::__construct();
        require_once "application/models/products.php";
        $this->model = new ProductsModel();
    }

    function start()
    {
        $data = $this->model->getAll();
        $this->view->generate("products.php", $data);
    }
}