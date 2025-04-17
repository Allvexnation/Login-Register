<?php
session_start();
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO signup (email, phone, username, password) VALUES (:email, :phone, :username, :password)");
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);

    if ($stmt->execute()) {
        $_SESSION['registration_success'] = "Registration successful!";
        header("Location: ../php/Login.php");
        exit(); 
    } else {
        echo "Error: Registration failed.";
    }
}
?>