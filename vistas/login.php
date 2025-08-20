<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outfit Helper - Log In </title>
    <link rel="stylesheet" href="/theoutfithelper/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/main.js"></script>
</head>
<body>
    <?php include 'background.php'; ?>

    <div id="side-bar-log-in">
        <h2>Welcome back!</h2>
        <p>Log in to start generating outfits and managing your closet.</p>
        <form action="/controlador/usuarioController.php" method="post">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="YourUsername" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Your password" required>
            </div>
            <button type="submit" class="main-button-menu" name="login">Log In</button>
        </form>
        <p class="register-link">Don't have an account? 
        <br><a href="">Register here</a></p>
    </div>
    <?php include 'footer.php'; ?>


</body>
</html>