<html lang="en">
<head>
    <title>Admin UNIX</title>
</head>
<body>
<div>
    <style>
        button {
            min-width: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8px 16px;
            font-size: 20px;
            border-radius: 6px;
            margin: 0 12px 12px 0;
            background-color: orange;
            color: white;
            transition: background-color 0.2s ease-in;
            border: none;
            display: inline-block;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        button:hover {
            background: orangered;
        }
    </style>
    <button onclick="onClick('hostname')">hostname</button>
    <button onclick="onClick('id')">id</button>
    <button onclick="onClick('locale')">locale</button>
    <button onclick="onClick('ls')">ls</button>
    <button onclick="onClick('pwd')">pwd</button>
    <button onclick="onClick('uname')">uname</button>
    <button onclick="onClick('date')">date</button>
    <div>
        result: <span id="res"></span>
    </div>
</div>
<?php
    require "./Admin.php";
    $admin = new Admin();
?>
<script type="text/javascript">
    const resEl = document.getElementById("res")
    <?php
        $res = $admin->exec($_COOKIE["command"] ?: "");
    ?>
    resEl.textContent = "<?= $res ?>";
    function onClick(command) {
        document.cookie = `command=${command}`
        window.location.reload();
    }
</script>
</body>
</html>