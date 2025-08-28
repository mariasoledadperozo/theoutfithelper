<header id="main-header">
    <nav>
        <article>
        <a href="index.php">
            <h1>
                the <span>outfit</span> helper
            </h1>
        </a>
        <ul>
            <li>
                <a href="../index.php">
                    <button class="main-button-menu">generate outfit</button>
                </a>
            </li>
            <li>
                <a href="vistas/editcloset.php">
                    <button class="main-button-menu">edit closet</button>
                </a>
            </li>
            <li>
                <a href="">
                    <button class="main-button-menu">settings</button>
                </a>
            </li>
        </ul>
        </article>

        <a href="/theoutfithelper/controlador/userController.php?action=logout">
            <button class="secondary-button-menu">
                log out
            </button>
        </a>
    </nav>
</header> 


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