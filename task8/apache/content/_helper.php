<?php
    function echoError() {
        http_response_code(500);
        echo json_encode(array("error" => true));
    }
    function defineTheme() {
        if (isset($_SESSION["theme"]) && $_SESSION["theme"]) echo <<<A
            <style>
                *, *::after, *::before {
                    background-color: #424242;
                    color: #e3e3e3;
                }
            </style>
        A;
        if(isset($_SESSION["bigFont"]) && $_SESSION["bigFont"])  {
            echo <<<A
                <style>
                    html { font-size: 24px; }
                    button {font-size: 24px;}
                    input {font-size: 24px;}
                </style>
            A;
        }

    }
?>