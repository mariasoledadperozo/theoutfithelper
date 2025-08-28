<?php
include "config/connection.php"; 
session_start();
if(!isset($_SESSION['user'])){
        header('Location: vistas/login.php'); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outfit Helper - Home</title>
    <link rel="stylesheet" href="/theoutfithelper/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    
        <div class="main-wrapper">
        <?php include 'vistas/header.php'; ?>
            <article id="clothing-cards">
                <?php 
                include 'controlador/pieceController.php';
               echo generateRandomPiece('T'); 
               echo generateRandomPiece('B'); 
                ?>
        </article>
    </div>

    <?php include 'vistas/background.php'; ?>
    <?php include 'vistas/footer.php'; ?>

</body>
</html>