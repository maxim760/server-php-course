<?php

class SessionController extends Controller {
    public function __construct()
    {
        parent::__construct();
        require_once "application/models/session.php";
        $this->model = new SessionModel();
    }
    function start()
    {
        $this->model->start();
    }
}