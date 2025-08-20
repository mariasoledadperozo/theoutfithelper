<?php
include "config/connection.php"; 
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
            <div class="card-button">
                <section class="card-clothing">
                        <button class="arrow-button">
                                <i class="fa-solid fa-arrow-left"></i>
                         </button>
                                    <img src="/theoutfithelper/assets/img/top.png" alt="Clothing Item 1" id="clothing-img">
                        <button class="arrow-button">
                                 <i class="fa-solid fa-arrow-right"></i>
                        </button>
                </section>
                <button class="shuffle-button">shuffle!</button>
            </div>

              <div class="card-button">
                <section class="card-clothing">
                        <button class="arrow-button">
                                <i class="fa-solid fa-arrow-left"></i>
                         </button>
                                    <img src="/theoutfithelper/assets/img/top.png" alt="Clothing Item 1" id="clothing-img">
                        <button class="arrow-button">
                                 <i class="fa-solid fa-arrow-right"></i>
                        </button>
                </section>
                <button class="shuffle-button">shuffle!</button>
            </div>
    </div>

    <?php include 'vistas/background.php'; ?>
    <?php include 'vistas/footer.php'; ?>

</body>
</html>