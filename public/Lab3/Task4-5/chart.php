<?php

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $item_title = htmlspecialchars($_POST["title"]);
        $item_desc = htmlspecialchars($_POST['description']);
        $item_price = htmlspecialchars($_POST['price']);

        $item = [
            "title" => $item_title,
            "description" => $item_desc,
            "price" => $item_price
        ];

        if (!isset($_SESSION["Charts"])) {
            $_SESSION["Charts"] = [];
        }

        $_SESSION["Charts"][] = $item;

        header("Location: index.html");
        exit();
    }
?>