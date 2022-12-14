<?php
namespace app\controllers;


use app\models\Session;
use yii\web\Controller;

class SessionController extends Controller {

    public function actionIndex(){
        Session::start();
    }
    public function actionFont(){
        return Session::toggleBigFont();
    }
    public function actionTheme(){
        return Session::toggleTheme();
    }
    public function actionLogin(){
        return Session::setLogin();
    }
}