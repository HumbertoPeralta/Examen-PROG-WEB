<?php 
    require __DIR__.'/../../helpers/functions.php';
?>
<link rel="stylesheet" href="<?= ASSETS_URL ?>/css/styleHeader.css">
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/style.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Aestetik</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a class="menu-link" href="#">Categorías</a>
                    <ul class="submenu">
                        <li><a href="<?=BASE_URL?>/../src/views/public/hoodies/sudaderas.php">Sudaderas</a></li>
                        <li><a href="<?=BASE_URL?>/../src/views/public/tshirts/playeras.php">Playeras</a></li>
                        <li><a href="<?=BASE_URL?>/../src/views/public/pants/pantalones.php">Pantalones</a></li>
                        <li><a href="<?=BASE_URL?>/../src/views/public/shirts/camisas.php">Camisas</a></li>
                    </ul>
                </li>
            </ul>
        </nav>


        <a class="logo" href="<?=BASE_URL?>"> AESTETIK </a>

        <a href="<?=BASE_URL?>/login">
        <img src="<?=ASSETS_URL?>/img/user.svg" alt="Imagen" class="small-img">
        </a>
        <!-- <a class="logo" href="<?=BASE_URL?>/login"> Login </a> -->

        <!-- <div class="buscador">
            <input type="text" placeholder="Buscar...">
        </div> -->
        <script>
    // Toggle del menú para móviles
    document.getElementById('menu-toggle').addEventListener('click', function() {
        var menu = document.querySelector('nav ul');
        menu.classList.toggle('active');
    });
</script>

    </header>