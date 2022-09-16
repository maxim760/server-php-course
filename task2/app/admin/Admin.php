<?php
class Admin {
    const VALID_COMMANDS = ["hostname", "date", "id", "locale", "pwd", "uname", "ls"];
    public function exec(string $command) {
        if(!in_array($command, self::VALID_COMMANDS)) {
            return "";
        }
        return shell_exec($command);
    }
}
?>