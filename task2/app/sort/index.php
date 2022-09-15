<html lang="en">
<head>
    <title>Quick sort</title>
</head>
<body>
<?php
require "./QuickSort.php";
$value = $_GET["array"] ?: "";
$sorter = new QuickSort($value);
echo $sorter->getSortedStr();
?>
</body>
</html>