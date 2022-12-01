<?php
class AdminController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    function start()
    {
        $this->view->generate("admin/index.php");
//        $this->view->generate("admin/index.php");
    }
}