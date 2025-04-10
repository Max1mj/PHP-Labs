<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.html");
        exit();
    }

    echo "Hello, " . $_SESSION['user_name'];
?>
