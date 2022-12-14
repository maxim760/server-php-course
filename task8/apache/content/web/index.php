<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
ini_set('memory_limit', '512M');
require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/vendor/yiisoft/yii2/Yii.php';

$config = require dirname(__DIR__)  . '/config/web.php';

try {
    (new yii\web\Application($config))->run();
} catch (\yii\base\InvalidConfigException $e) {
    echo "error no yii web app";
    echo $e;
}
