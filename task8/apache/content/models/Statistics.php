<?php

namespace app\models;
use app\models\Shape;
use Nelmio\Alice\Loader\NativeLoader;
class Statistics
{
    public static function getAll() {
        $loader = new NativeLoader();
        $objectSet = $loader->loadData([
            Shape::class => [
                'shape{1..50}' => [
                    'item1' => '<numberBetween(100, 1000)>',
                    'item2' => '<numberBetween(100, 1000)>',
                    'item3' => '<numberBetween(100, 1000)>',
                    'item4' => '<numberBetween(100, 1000)>',
                    'item5' => '<numberBetween(100, 1000)>'
                ]
            ]
        ]);
        return $objectSet->getObjects();
    }
    public static function getOne()
    {
        $all = self::getAll();
        return $all["shape8"];
    }
}