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
</head>
<body>
<?php $id = $_GET["id"] ? intval($_GET["id"]) : "";
if (!isset($id) || !is_numeric($id)) {
    echo "<h1 style='color: red'>Товар не найден</h1><div><a href='index.html'>На главную</a></li></div>";
    exit();
};

$mysqli = new mysqli("db", "user", "password", "shop");
$statement = $mysqli->prepare('select * from products where id = ?');
$statement->bind_param('i', $id);
$statement->execute();
$result = $statement->get_result()->fetch_assoc();
if(!$result) {
    echo "<h1 style='color: red'>Товар не найден</h1><div><a href='index.html'>На главную</a></li></div>";
    exit();
}
echo "<div class='wrapper'><h1>{$result['title']}</h1><div>{$result['description']}</div><div>Цена: {$result['price']}</div></div>";
echo "<div><a href='index.html'>На главную</a></li></div>";
echo "<div><a href='products.php'>Назад</a></li></div>";
?>
</body>
</html>