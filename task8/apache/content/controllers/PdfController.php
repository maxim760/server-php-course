<?php
namespace app\controllers;

use app\models\Pdf;
use yii\web\Controller;

class PdfController extends Controller {
    public function actionAll() {
        $data = Pdf::getAll();
        return $this->render('all', ['data' => $data]);
    }
}