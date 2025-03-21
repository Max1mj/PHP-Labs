<?php

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        
        if (isset($_POST['login_input']) && isset($_POST['user_password'])) {
            $login = $_POST['login_input'];
            $password = $_POST['user_password'];

        
            $_SESSION["login"] = $login;
            $_SESSION["password"] = $password;
        
        
            if (isset($_SESSION["login"])) {
                echo "Hello, " . htmlspecialchars($_SESSION["login"]) . "<br>";
            }

            echo '<form method="post">
                <button type="submit" name="logout">Log Out</button>
              </form>';
        }

    }

    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: index.html");
        exit();
    }
?>