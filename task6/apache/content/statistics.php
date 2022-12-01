<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Статистика</title>
    <style>span { margin: 10px; }</style>
    <?php require_once '_helper.php'; defineTheme(); ?>
</head>
<body>
<h3>Графики:</h3>
<div style="margin-bottom: 10px">
    <a href="./index.html">Назад</a>
</div>
<?php
require '../vendor/autoload.php';
class Shape {
    var int $item1, $item2, $item3, $item4, $item5;
    public function __toString(): string {
        return sprintf(
        '[%d,%d,%d,%d,%d]',
            $this->item1, $this->item2, $this->item3, $this->item4, $this->item5
        );
    }
}

$loader = new Nelmio\Alice\Loader\NativeLoader();
/** @noinspection PhpUnhandledExceptionInspection */
$objectSet = $loader->loadData([
    Shape::class => [
        'shape{1..50}' => [
            'item1' => '<numberBetween(100, 1000)>',
            'item2' => '<numberBetween(100, 1000)>',
            'item3' => '<numberBetween(100, 1000)>',
            'item4' => '<numberBetween(100, 1000)>',
            'item5' => '<numberBetween(100, 1000)>'
        ],
    ]
]);
$array = $objectSet->getObjects();
$shape = $array["shape8"];
echo "<div>";
echo "<img style='width: 33.3%' src=\"/graphs.php?type=0&data=$shape\">";
echo "<img style='width: 33.3%'  src=\"/graphs.php?type=1&data=$shape\">";
echo "<img style='width: 33.3%'  src=\"/graphs.php?type=2&data=$shape\">";
echo "</div>";
?>
</body>
</html>