<?php
class Admin {
    public function exec(string $command) {
        if($command === "") {
            return "";
        }
        return exec($command);
    }
}
?>