<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = htmlspecialchars($_POST["firstname"]);
        $last_name = htmlspecialchars($_POST["lastname"]);

        if(empty($first_name) || empty($last_name)){
            header("Location: index.html");
            exit();
        } elseif (!ctype_alpha($first_name) || !ctype_alpha($last_name)) {
            header("Location: index.html");
            exit();
        }

        echo "Submited data:";
        echo "<br>";
        echo $first_name;
        echo "<br>";
        echo $last_name;
    }
?>