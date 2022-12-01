<?php
class PdfController extends Controller {
    public function __construct()
    {
        parent::__construct();
        require_once "application/models/pdf.php";
        $this->model = new PdfModel();
    }

    function start()
    {
        $data = $this->model->getAll();
        $this->view->generate("pdf.php", $data);
    }
}