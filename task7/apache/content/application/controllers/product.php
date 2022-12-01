<?php
class ProductController extends Controller {
    public function __construct()
    {
        parent::__construct();
        require_once "application/models/products.php";
        $this->model = new ProductsModel();
    }

    function start()
    {
        $data = $this->model->getOne();
        $this->view->generate("product.php", $data);
    }
}