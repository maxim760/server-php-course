<?php
class GraphsController extends Controller {
    public function __construct()
    {
        parent::__construct();
        require_once "application/models/graphs.php";
        $this->model = new GraphsModel();
    }

    function start()
    {
        $this->model->start();
    }
}