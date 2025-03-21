<?php

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        print_r($_SERVER);

        $ip = $_SERVER['REMOTE_ADDR'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $script_name = $_SERVER['PHP_SELF'];
        $method = $_SERVER['REQUEST_METHOD'];
        $file_path = $_SERVER['SCRIPT_FILENAME'];


        echo "<br>";
        echo "Ip adress: $ip <br>";
        echo "Name and Version: $user_agent <br>";
        echo "Script name: $script_name <br>";
        echo "Method: $method <br>";
        echo "Filepath: $file_path";
    }

?>