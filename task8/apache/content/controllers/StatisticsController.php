<?php
namespace app\controllers;

use app\models\Statistics;
use yii\web\Controller;

class StatisticsController extends Controller {
    public function actionShow(){

        $data = Statistics::getOne();
        return $this->render('show', ["data" => $data]);
    }
}