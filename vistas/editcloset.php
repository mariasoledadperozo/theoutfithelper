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
</head>
<body>
    <div class="main-wrapper">
        <?php include 'header.php'; ?>
            <article id="piece-group">
                                <div class="piece-card">
                                    <img  class="piece-img" src="../assets/img/top-proof.png" alt="">
                                    <button>
                                            <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                                <div class="piece-card">
                                    <img  class="piece-img" src="../assets/img/top-proof.png" alt="">
                                    <button>
                                            <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                                <div class="piece-card">
                                    <img  class="piece-img" src="../assets/img/top-proof.png" alt="">
                                    <button>
                                            <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                                <div class="piece-card">
                                    <img  class="piece-img" src="../assets/img/top-proof.png" alt="">
                                    <button>
                                            <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                                <div class="piece-card">
                                    <img  class="piece-img" src="../assets/img/top-proof.png" alt="">
                                    <button>
                                            <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                                <div class="piece-card">
                                    <img  class="piece-img" src="../assets/img/top-proof.png" alt="">
                                    <button>
                                            <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                                <div class="piece-card">
                                    <img  class="piece-img" src="../assets/img/top-proof.png" alt="">
                                    <button>
                                            <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                                <div class="piece-card">
                                    <img  class="piece-img" src="../assets/img/top-proof.png" alt="">
                                    <button>
                                            <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                                <div class="piece-card">
                                    <img  class="piece-img" src="../assets/img/top-proof.png" alt="">
                                    <button>
                                            <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
</article>
    </div>
    <?php include 'background.php'; ?>
    <?php include 'footer.php'; ?>
</body>
</html>