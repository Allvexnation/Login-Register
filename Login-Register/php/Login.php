<?php
session_start();

if (isset($_SESSION['registration_success'])) {
    echo "<script>alert('" . $_SESSION['registration_success'] . "');</script>";
    unset($_SESSION['registration_success']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/Login-Register/css/signin.css">
    <link rel="icon" href="/Login-Register/icon/syt_logo_3qq_icon.ico">
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <h2>Login</h2>
            <form id="loginForm" action="/Login-Register/Database/Logindb.php" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-button">Login</button>
                <div class="show-password">
                    <input type="checkbox" id="showPassword">
                    <label for="showPassword"><span class="sp">Show Password</span></label>
                </div>
            </form>
            <p class="signup-text">No account? <a href="/Login-Register/php/Register.php">Sign up</a></p>
        </div>
    </div>
</body>
<script src="../js/style.js"></script>
</html>