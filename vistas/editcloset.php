<?php
include "../config/connection.php"; 
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
    <script src="../assets/js/main.js"></script>
</head>
<body>
    <?php include 'upper-header.php'; ?>
    <div class="main-wrapper">
        <?php include 'side-header.php'; ?>
        <div class="content-wrapper">
            <div class="title-cards">
                <h4>Tops</h4>  
                <button class="add-button" onclick="popUp()">
                            <i class="fa-solid fa-plus"></i>
                </button>

                <article id="piece-group">
                   <?php 
                        include "../controlador/pieceController.php";
                        showAllPieces('top');
                   ?>
                </article>
            </div>
                     <div class="title-cards">
                <h4>Bottoms</h4>
                <article id="piece-group">
                 <?php 
                        include "../controlador/pieceController.php";
                        showAllPieces('bottom');
                   ?>
                </article>
            </div>
        </div>
    </div>

    <?php include 'popup.php';?>
    <?php include 'background.php'; ?>
    <?php include 'footer.php'; ?>
</body>
</html>