<header id="secondary-header">
    <?php 
       include __DIR__ . '/../controlador/userController.php'; 
        $pfp = getProfilePicture();
    ?>
        <img src="/theoutfithelper/assets/img/uploads/<?php echo $pfp?>" alt="foto de perfil"> 
        <span>Hello, <?php
                    echo $_SESSION['name'];
                    ?>!
        </span>
        <a href="/theoutfithelper/controlador/userController.php?action=logout">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
</header>