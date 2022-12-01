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
    <script>
        const getParams = (data) => ({
            method: 'POST',
            headers: { 'Content-Type': 'application/json; charset=UTF-8' },
            body: JSON.stringify(data)
        })
        const request = (param) => fetch('/session.php', getParams(param))
            .then(() => window.location.reload())
        const changeTheme = () => {
            request({action: "theme"})
        }
        const changeBigFont = () => {
            request({action: "bigFont"})
        }
        const setLogin = () => request({action: "login", login: document.querySelector('input').value || ""})
    </script>
    <?php require_once 'application/_helper.php'; defineTheme(); ?>
</head>
<body>
<h1>Товары</h1>
<?php if (isset($_SESSION["login"])) echo '<h1>Welcome ' . $_SESSION["login"] . '</h1><br/>'; ?>
<input placeholder="Введите логин..." value="<?php echo $_SESSION["login"] ?? '' ?>"><button onclick="setLogin()">Установить логин</button><br>
<button onclick="changeTheme()">Поменять тему</button>
<button id="big-font-btn" onclick="changeBigFont()">Включить большой шрифт</button>
<li><a href="../../index.php">На главную</a></li>
<li><a href="pdf.php">Страница для пдф</a></li>

<div class="list">
    <?php /** @var TYPE_NAME $data */
    foreach ($data as $item) {
        $id = $item['ID'];
        $link = "product.php?id=$id";

        echo "<a class='item' href='$link'>{$item['title']}</a>";
    }
    ?>
</div>
<a href="admin.php">Страница с доступом по паролю</a>
<script>

    if(<?= isset($_SESSION["bigFont"]) && $_SESSION["bigFont"] ? "true" : "false" ?>) {
        document.getElementById("big-font-btn").textContent = "Выключить большой шрифт"
    }
</script>
</body>
</html>