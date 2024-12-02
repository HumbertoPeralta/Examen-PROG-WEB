<?php 
    require __DIR__.'/../../helpers/functions.php';
?>

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
                <li><a class="menu-link" href="#">Hombres</a>
                    <ul class="submenu">
                        <li><a href="#">Sudaderas</a></li>
                        <li><a href="compra.HTML">Playeras</a></li>
                        <li><a href="#">Pantalones</a></li>
                        <li><a href="#">Camisas</a></li>
                        <li><a href="#">Tenis</a></li>
                    </ul>
                </li>
                <li><a class="menu-link" href="#">Mujeres</a>
                    <ul class="submenu">
                        <li><a href="#">Sudaderas</a></li>
                        <li><a href="compra.HTML">Playeras</a></li>
                        <li><a href="#">Pantalones</a></li>
                        <li><a href="#">Camisas</a></li>
                        <li><a href="#">Tenis</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <a class="logo" href="<?=BASE_URL?>"> AESTETIK </a>

        <div class="buscador">
            <input type="text" placeholder="Buscar...">
        </div>

    </header>