<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outfit Helper - Sign In </title>
    <link rel="stylesheet" href="/theoutfithelper/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <script src="../assets/js/main.js"></script>
</head>
<body>
    <?php include 'background.php'; ?>

    <div id="side-bar-log-in">
        <h2>Welcome to
            <br><span>
                The Outfit Helper!
            </span>
        </h2>
        <p>Create your account to start managing your closet.</p>
        <form action="/theoutfithelper/controlador/userController.php" method="POST">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Username"  maxlength="30" required>
            </div>
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="input-group">
                <label for="name">Last Name:</label>
                <input type="text" id="lastname" name="lastname" placeholder="LastName" required>
            </div>
            <div class="input-group">
                <label for="name">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <div>
                        <input type="password" id="pass" name="pass" placeholder="Password" required>
                        <i class="fa-solid fa-eye-slash" id="eye-state" onclick="pass('pass', 'eye-state')"></i>
                </div>
            </div>
            <div class="input-group">
                <label for="password">Confirm Password:</label>
                <div>
                    <input type="password" id="pass-com" name="confirm_password" placeholder="Confirm Password" required>
                    <i class="fa-solid fa-eye-slash" id="eye-state-com" onclick="pass('pass-com','eye-state-com')"></i>
                </div>
            </div>
            <div class="input-group">
                <label for="password">Profile Image:</label>
                <input type="file" id="pfp" accept="image/*" name="pfp" placeholder="Your profile picture" required>
            </div>
            <button type="submit" class="main-button-menu" name="SignIn">Sign In</button>
        </form>
        <p class="register-link">Have an account? 
        <br><a href="login.php">Log in here</a></p>
    </div>
    <?php include 'footer.php'; ?>


</body>
</html>