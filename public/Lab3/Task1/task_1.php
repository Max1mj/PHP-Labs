<?php

    $cookie_name = 'user';

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_cookie'])) {
        setcookie($cookie_name, "", time() - 3600, "/");
        echo "Cookie has been deleted.";
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['username'])) {
        
            $user_name = $_POST['username'];
            $cookie_value = $user_name;
            $data_time = 604800;
    
            setcookie($cookie_name, $cookie_value, time() + $data_time , "/");
    
            echo "User: " . $user_name . " is saved";
        
    }


    if (isset($_COOKIE[$cookie_name])) {
        $name = $_COOKIE[$cookie_name];
        echo "Hello " . $name . "! <br>";
    } 

?>