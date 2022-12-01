<?php
require_once "application/_helper.php";
class SessionModel extends Model {
    public string $method = "";
    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function start() {
        switch ($this->method) {
            case "POST":
                $json = file_get_contents('php://input');
                $data = json_decode($json, true);
                $this->post($data);
                break;
            default:
                echoError();
        }
    }
    private function post($data) {
        if (!array_key_exists("action", $data)) {
            return;
        }
        switch ($data["action"]) {
            case "bigFont":
                $this->toggleBigFont();
                break;
            case "theme":
                $this->toggleTheme();
                break;
            case "login":
                $this->setLogin($data["login"]);
                break;
            default:
                echoError();
                break;
        }
    }

    private function toggleBigFont() {
        $theme = $_SESSION["bigFont"] ?? false;
        $_SESSION["bigFont"] = !$theme;
    }


    private function toggleTheme() {
        $theme = $_SESSION["theme"] ?? false;
        $_SESSION["theme"] = !$theme;
    }

    private function setLogin($login) {
        if (!$login) {
            echoError();
            return;
        }
        $_SESSION["login"] = $login;
    }
}