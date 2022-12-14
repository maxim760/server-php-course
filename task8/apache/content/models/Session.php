<?php
namespace app\models;
require_once "../_helper.php";
use Yii;
class Session {
    public static function toggleBigFont() {
        $session = Yii::$app->session;
        $current = $session->get("bigFont") ?? false;
        $session->set("bigFont", !$current);
    }


    public static function toggleTheme() {
        $session = Yii::$app->session;
        $current = $session->get("theme") ?? false;
        $session->set("theme", !$current);
    }

    public static function setLogin() {
        $session = Yii::$app->session;
        $login = Yii::$app->request->queryParams['value'];
        $session->set("login", $login);
    }
}