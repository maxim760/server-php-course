<?php
function echoError($code = 500) {
    http_response_code($code);
    echo json_encode(array("error" => true));
}
function getConnect() {
    return mysqli_connect("db", "user", "password", "shop");
}
$method = $_SERVER['REQUEST_METHOD'];
$connect = getConnect();
if (!$connect) {
    echo "error in connect";
    die("Connection failed: " . mysqli_connect_error());
}
switch ($method) {
    case "GET": {
        if(!isset($_GET["id"])) {
            $result = mysqli_query($connect, "select ID, title from pdfs");
            $response = array();
            while($row = $result->fetch_assoc()) {
                $response[] = $row;
            }
            http_response_code(200);
            header('Content-Type:application/json');
            echo json_encode($response);
        } else {
            $result = mysqli_query($connect, "select pdf from pdfs where id = \"{$_GET['id']}\"");
            $row = mysqli_fetch_assoc($result);
            if(!isset($row["pdf"])) {
                header('Content-Type:application/json');
                echoError(404);
                return;
            }
            header('Content-type: application/pdf');
            echo $row['pdf'];
        }
        break;
    }
    default:
        echoError();
        break;
}
