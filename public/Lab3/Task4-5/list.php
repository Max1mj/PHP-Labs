<?php

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET"){

        if (isset($_GET['add'])) {
            $indexToAdd = (int)$_GET['add'];
            if (isset($_SESSION["Charts"][$indexToAdd])) {
                if (!isset($_SESSION["Collection"])) {
                    $_SESSION["Collection"] = [];
                }
                $_SESSION["Collection"][] = $_SESSION["Charts"][$indexToAdd];
            }
        }

        if (isset($_SESSION["Charts"]) && is_array($_SESSION["Charts"])){
            
            echo "Chart Items: <br>";

            foreach ($_SESSION["Charts"] as $index => $chart) {

                echo "Title: " . htmlspecialchars($chart["title"]) . "<br>";
                echo "Description: " . htmlspecialchars($chart["description"]) . "<br>";
                
                echo "Price: " .  htmlspecialchars($chart["price"]) . "<br>";
                echo "<a href='list.php?add=$index'>Add</a> <br>";

            }
        }
        echo "<br><a href='collection.php'>View Collection</a>";
        
    }
?>