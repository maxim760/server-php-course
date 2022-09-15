<html lang="en">
<head>
    <title>Drawer</title>
</head>
<body>
<?php
    require "./Drawer.php";
    $value = intval($_GET["num"]);
    new Drawer($value);
?>
</body>
</html>