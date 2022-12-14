<?php
namespace app\controllers;

use app\models\Graphs;
use yii\web\Controller;

class GraphsController extends Controller {
    public function actionShow() {
        Graphs::start();
    }

}