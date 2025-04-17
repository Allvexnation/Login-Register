<?php
session_start();
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM signup WHERE username = :username");
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (trim($user['password']) === $password) {
            $_SESSION['username'] = $username;
            header("Location: ../php/home.php");
            exit();
        } else {
            $_SESSION['error'] = "Password does not match.";
            header("Location: ../php/error.php");
            exit();
        }
    } else {
        echo "Username not found.";
    }
}
?>
