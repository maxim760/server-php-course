<?php
function echoError($code = 500) {
    http_response_code($code);
    echo json_encode(array("error" => true));
}
function getConnect() {
    return mysqli_connect("db", "user", "password", "shop");
}
header('Content-Type:application/json');
$method = $_SERVER['REQUEST_METHOD'];
$connect = getConnect();
if (!$connect) {
    echo "error in connect";
    die("Connection failed: " . mysqli_connect_error());
}
switch ($method) {
    case "GET": {
        $result = mysqli_query($connect, "select * from products");
        $response = array();
        while($row = $result->fetch_assoc()) {
            $response[] = $row;
        }
        http_response_code(200);
        echo json_encode($response);
        break;
    }
    case "POST":
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        if(!isset($data['title']) || !isset($data['description']) || !isset($data['price'])) {
            echoError();
            return;
        }
        $sql = "insert into products(title, price, description) values (\"{$data['title']}\", {$data['price']}, \"{$data['description']}\")";
        $result = mysqli_query($connect, $sql);
        http_response_code(201);
        echo json_encode(array_merge($data, ["ID" => mysqli_insert_id($connect)]));
        break;
    case "PUT":
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        if(!isset($data['title']) || !isset($data['description']) || !isset($data['price']) || !isset($data['id'])) {
            echoError();
            return;
        }
        $sql = "update products set title=\"{$data['title']}\", description=\"{$data['description']}\", price={$data['price']} where ID = \"{$data['id']}\"";
        $result = mysqli_query($connect, $sql);
        http_response_code(200);
        echo json_encode($data);
        break;
    case "DELETE":
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        if(!isset($data['id'])) {
            echoError();
            return;
        }
        $sql = "DELETE FROM products WHERE ID = \"{$data['id']}\"";
        $result = mysqli_query($connect, $sql);
        http_response_code(200);
        echo json_encode(["id" => $data['id'], "affected_rows" => mysqli_affected_rows($connect)]);
        break;
    default:
        echoError();
        break;
}
