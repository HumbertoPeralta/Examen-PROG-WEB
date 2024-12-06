<?php
require __DIR__ . '/../src/helpers/functions.php';
require_once __DIR__ . '/../src/controllers/LoginController.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/styleLogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300..700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="container">
        <a href="<?= BASE_URL ?>/">
            <img src="<?= ASSETS_URL ?>/img/logo.svg" alt="Imagen" class="small-img">
        </a>
        
        <h2 style="font-size: 50px;"" >Bienvenido!</h2>
        <h2>Ingresa tus datos para iniciar sesión</h2>

        <?php

        if (isset($_SESSION['errors'][0]))

            echo "<p style='color:red;'>" . $_SESSION['errors'][0] . "</p>";

        unset($_SESSION['errors']);

        ?>

        <form method="POST" action="<?= SRC_URL ?>/controllers/LoginController.php">

            <div class="input-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Entrar</button>
            <div class="extra-options">
                <a href="#"></a>
                <a href="<?=BASE_URL?>/../public/register.php">Crear cuenta</a>
            </div>
        </form>

    </div>

</body>

</html>