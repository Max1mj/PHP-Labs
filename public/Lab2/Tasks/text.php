<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["textupload"];
        $uploadText = "./../log.txt";
        if (isset($text)) {
            file_put_contents($uploadText, $text);
        }

        if (file_exists($uploadText)) {
            echo " File content: " . file_get_contents($uploadText) . "<br>";
        }
    }
?>
