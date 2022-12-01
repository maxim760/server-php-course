<?php
class Controller {

    public $model;
    public $view;

    public function __construct() {
        $this->view = new View();
    }

    function start()
    {
    }
    function echoError($code = 500) {
        http_response_code($code);
        echo json_encode(array("error" => true));
    }
}