<?php
namespace app\controllers;

use app\models\Admin;
use Yii;
use yii\web\Controller;

class AdminController extends Controller{
    public function actionIndex() {
        return $this->render('index');
    }
}
