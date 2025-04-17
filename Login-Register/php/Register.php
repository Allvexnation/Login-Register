<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/Login-Register/css/signup.css">
    <link rel="icon" href="/Login-Register/icon/syt_logo_3qq_icon.ico">
</head>

<body>

    <div class="register-container">
        <div class="register-card">
            <h2>Register</h2>
            <form action="../Database/registerdb.php" method="POST">
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="register-button">Register</button>
                <div class="show-password">
                    <input type="checkbox" id="showPassword">
                    <label for="showPassword"><span class="sp">Show Password</span> </label>
                </div>
            </form>
            <p class="login-text">Already have an account? <a href="Login.php">Login</a></p>
        </div>
    </div>

</body>
<script src="../js/style.js"></script>
</html>