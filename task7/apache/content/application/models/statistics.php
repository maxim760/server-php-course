<?php
require_once "shape.php";
require '../vendor/autoload.php';
class StatisticsModel extends Model {
    public $loader;
    public function __construct()
    {
        $this->loader = new Nelmio\Alice\Loader\NativeLoader();
    }

    /**
     * @throws \Nelmio\Alice\Throwable\LoadingThrowable
     */
    public function getAll() {
        $objectSet = $this->loader->loadData([
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
    public function getOne()
    {
        $all = $this->getAll();
        return $all["shape8"];
    }
}