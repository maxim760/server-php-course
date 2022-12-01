<?php
class StatisticsController extends Controller {
    public function __construct()
    {
        parent::__construct();
        require_once "application/models/statistics.php";
        $this->model = new StatisticsModel();
    }

    function start()
    {
        $data = $this->model->getOne();
        $this->view->generate("statistics.php", $data);
    }
}