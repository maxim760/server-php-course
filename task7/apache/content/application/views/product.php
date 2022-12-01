<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Подробно</title>
    <style>
        .wrapper: {
            display: flex;
            flex-direction: column;
            row-gap: 24px;
        }
    </style>
    <?php require_once 'application/_helper.php'; defineTheme(); ?>
</head>
<body>
<?php
if (!isset($data)) {
    echo "<h1 style='color: red'>Товар не найден</h1><div><a href='index.html'>На главную</a></li></div>";
    exit();
};
echo "<div class='wrapper'><h1>{$data['title']}</h1><div>{$data['description']}</div><div>Цена: {$data['price']}</div></div>";
echo "<div><a href='index.html'>На главную</a></li></div>";
echo "<div><a href='products.php'>Назад</a></li></div>";
?>
</body>
</html>