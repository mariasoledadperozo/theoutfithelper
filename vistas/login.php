<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outfit Helper - Log In</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="/theoutfithelper/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script src="../assets/js/main.js"></script>
</head>
<body>
    <?php include 'background.php'; ?>
    <div id="side-bar-log-in">
        <h2>Welcome back!</h2>
        <p>Log in to start generating outfits and managing your closet.</p>
        <form action="../controlador/userController.php" method="post">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="user" placeholder="Username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <div>
                        <input type="password" id="pass" name="pass" placeholder="Password" required>
                        <i class="fa-solid fa-eye-slash" id="eye-state" onclick="pass('pass','eye-state')"></i>
                </div>
            </div>
            <button type="submit" class="main-button-menu" name="login">Log In</button>
        </form>
        <p class="register-link">Don't have an account? 
        <br><a href="signin.php">Register here</a></p>
    </div>
    <?php include 'footer.php'; ?>

</body>
</html>