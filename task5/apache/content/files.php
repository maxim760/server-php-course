<?php
require_once '_helper.php';
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case "POST":
        upload();
        break;
    default:
        header('Location: '. "./pdf.php");
        break;
}
function upload() {
    $mysqli = new mysqli("db", "user", "password", "shop");
    $isPdf = $_FILES["file"]["type"] == 'application/pdf';
    if(!$isPdf) {
        echo $_FILES["file"]["type"];
        echoError();
    }
    $tempFile = $_FILES["file"]["tmp_name"];
    $content = file_get_contents($tempFile);
    $fileName = $_FILES["file"]["name"] ?: "file.pdf";
    $insert_sql = "INSERT INTO pdfs (title, pdf) VALUES(\"{$fileName}\", ?);";
    $statement = $mysqli->prepare($insert_sql);
    $statement->bind_param("s", $content);
    $current_id = $statement->execute();
    header('Location: '. "./pdf.php");
}
?>