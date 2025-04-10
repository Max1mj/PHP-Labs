<?php
    session_start();
    require 'db_connect.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST['user_name']);
        $email = trim($_POST['user_email']);
        $password = trim($_POST['user_password']);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            die("User exists");
        }

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            die("User with this email is exists");
        }

        $request = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if ($request->execute([$username, $email, $hashed_password])) {
            echo "Successful! <br>";
            echo "<a href='login.html'>Log In</a>";
        } else {
            echo "Registration error.";
        }


        $conn = null;
    }
?>
