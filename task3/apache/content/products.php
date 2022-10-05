<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Товары</title>
    <style>
        span { margin: 10px; }
        .list {
            max-width: 450px;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            flex-direction: column;
        }
        .item {
            width: 100%;
            height: 40px;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            border: 1px solid black;
            display: flex;
            flex-direction: row;
            margin-top: 16px;
        }
        .item:hover {
            box-shadow: 0 0 5px rgba(0,0,0,0.25);
        }
    </style>
</head>
<body>
<h1>Товары</h1>
<li><a href="index.html">На главную</a></li>
<?php
$mysqli = new mysqli("db", "user", "password", "shop");
$result = $mysqli->query("select * from products");
?>
<div class="list">
    <?php foreach ($result as $item) {
        $id = $item['ID'];
        $link = "product.php?id=$id";

        echo "<a class='item' href='$link'>{$item['title']}</a>";
    }
    ?>
</div>
<a href="admin/index.php">Страница с доступом по паролю</a>
</body>
</html>