<?php

function echoError() {
    echo json_encode(array("error" => true));
}
function getConnect() {
    return mysqli_connect("db", "user", "password", "shop");
}
function encryptPass($pass) {
    return '{SHA}' . base64_encode(sha1($pass, TRUE));
}
header('Content-Type:application/json');
$method = $_SERVER['REQUEST_METHOD'];
$connect = getConnect();
if (!$connect) {
    echo "error in connect";
    die("Connection failed: " . mysqli_connect_error());
}
if($method == "GET") {
    $result = mysqli_query($connect, "select * from auth");
    $response = array();
    while($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
    http_response_code(200);
    echo json_encode($response);
} else if($method == "POST") {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    if(!isset($data['password']) || !isset($data['login'])) {
        echoError();
        return;
    }
    $hash = encryptPass($data['password']);
    $sql = "insert into auth(login, password) values (\"{$data['login']}\", \"{$hash}\")";
    $result = mysqli_query($connect, $sql);
    http_response_code(201);
    echo json_encode(array_merge($data, ["ID" => mysqli_insert_id($connect)]));
} else if($method == "PUT") {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    if(!isset($data['login']) || !isset($data['password']) || !isset($data['id'])) {
        echoError();
        return;
    }
    $hash = encryptPass($data['password']);
    $sql = "update auth set login=\"{$data['login']}\", password=\"{$hash}\" where ID = \"{$data['id']}\"";
    $result = mysqli_query($connect, $sql);
    http_response_code(200);
    echo json_encode($data);
} else if($method == "DELETE") {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    if(!isset($data['id'])) {
        echoError();
        return;
    }
    $sql = "DELETE FROM auth WHERE ID = \"{$data['id']}\"";
    $result = mysqli_query($connect, $sql);
    http_response_code(200);
    echo json_encode(["id" => $data['id'], "affected_rows" => mysqli_affected_rows($connect)]);
} else {
    http_response_code(404);
    echoError();
}

?>