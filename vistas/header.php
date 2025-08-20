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
                <a href="">
                    <button class="main-button-menu">generate outfit</button>
                </a>
            </li>
            <li>
                <a href="">
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

        <a href="/theoutfithelper/vistas/login.php">
            <button class="secondary-button-menu">
                log out
            </button>
        </a>
    </nav>
</header> 


<header id="secondary-header">
        <img src="/theoutfithelper/assets/img/Atomo_Icono_Default.jpg" alt="foto de perfil"> 
        <span>Hello, <?php
                    $nombre = $_GET['nombre'] ?? 'name'; 
                    echo $nombre;
                    ?>!
        </span>
        <a href="vistas/login.php">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
</header>