<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Статистика</title>
    <style>span { margin: 10px; }</style>
    <?php require_once '../_helper.php'; defineTheme(); ?>
</head>
<body>
<h3>Графики:</h3>
<div style="margin-bottom: 10px">
    <a href="/index.html">Назад</a>
</div>
<?php
echo "<div>";
/** @var TYPE_NAME $data */
echo "<img style='width: 33.3%' src=\"/graphs/show?type=0&data=$data\">";
echo "<img style='width: 33.3%'  src=\"/graphs/show?type=1&data=$data\">";
echo "<img style='width: 33.3%'  src=\"/graphs/show?type=2&data=$data\">";
echo "</div>";
?>
</body>
</html>