<?php
    session_start();

    $inactive_duration = 500;
    $cookie_time = 3600;

    if (isset($_SESSION['last_activity'])) {
        $session_lifetime = time() - $_SESSION['last_activity'];
        if ($session_lifetime > $inactive_duration) {
            session_unset();
            session_destroy();
            header("Location: index.html");
            exit();
        }
    }

    $_SESSION['last_activity'] = time();

    echo "<h1>Collection</h1>";

    if (isset($_COOKIE['PreviousCollection'])) {
        $previousCollection = json_decode($_COOKIE['PreviousCollection'], true);
    } else {
        $previousCollection = [];
    }

    if (isset($_SESSION["Collection"])) {
        $currentCollection = $_SESSION["Collection"];
    } else {
        $currentCollection = [];
    }

    $updatedCollection = array_merge($previousCollection, $currentCollection);

    setcookie("PreviousCollection", json_encode($updatedCollection), time() + $cookie_time, "/"); 

    if (!empty($updatedCollection)) {
        foreach ($updatedCollection as $index => $item) {
            echo "Title: " . htmlspecialchars($item["title"]) . "<br>";
            echo "Description: " . htmlspecialchars($item["description"]) . "<br>";
            echo "Price:</strong> " . htmlspecialchars($item["price"]) . "<br>";
        }
    }
?>
