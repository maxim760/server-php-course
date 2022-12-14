<?php

namespace app\controllers;

use app\models\Products;
use yii\web\Controller;
class ProductsController extends Controller
{
    public function actionAll(){
        $data = Products::getAll();
        return $this->render('all', ['data' => $data]);
    }
    public function actionView(){
        $data = Products::getOne();
        return $this->render('view', ['data' => $data]);
    }

}
