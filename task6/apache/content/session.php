<?php
    $method = $_SERVER['REQUEST_METHOD'];
    switch ($method) {
        case "POST":
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);
            post($data);
            break;
        default:
            echoError();
    }
    function post($data) {
        if (!array_key_exists("action", $data)) {
            return;
        }
        switch ($data["action"]) {
            case "bigFont":
                toggleBigFont();
                break;
            case "theme":
                toggleTheme();
                break;
            case "login":
                setLogin($data["login"]);
                break;
            default:
                echoError();
                break;
        }
    }

    function toggleBigFont() {
        $theme = $_SESSION["bigFont"] ?? false;
        $_SESSION["bigFont"] = !$theme;
    }


    function toggleTheme() {
        $theme = $_SESSION["theme"] ?? false;
        $_SESSION["theme"] = !$theme;
    }

    function setLogin($login) {
        if (!$login) {
            echoError();
            return;
        }
        $_SESSION["login"] = $login;
    }
