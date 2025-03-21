<?php
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: Test.html"); 
        exit();
    }

?>