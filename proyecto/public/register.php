<?php
require __DIR__ . '/../src/helpers/functions.php';
require_once __DIR__ . '/../src/controllers/RegisterController.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
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
        <h2 style="font-size: 50px;">Bienvenido!</h2>
        <h2>Ingresa tus datos para registrarte</h2>

        <?php

        if (isset($_SESSION['errors'][0]))

            echo "<p style='color:red;'>" . $_SESSION['errors'][0] . "</p>";

        unset($_SESSION['errors']);

        ?>

        <form id="registrationForm" method="POST" action="<?= SRC_URL ?>/controllers/RegisterController.php">

            <div class="input-group">
                <label for="nombre_usuario">Nombre</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" required>
                <small id="nombreError" style="color: red; display: none;">El nombre es obligatorio.</small>
            </div>
            <div class="input-group">
                <label for="apellido_paterno">Apellido:</label>
                <input type="text" id="apellido_paterno" name="apellido_paterno" required>
                <small id="apellidoError" style="color: red; display: none;">El apellido es obligatorio.</small>
            </div>

            <div>
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required pattern="\d{10}">
                <small id="telefonoError" style="color: red; display: none;">El teléfono debe tener 10 dígitos.</small>
            </div>

            <div class="input-group">
                <label for="email">Correo electronico</label>
                <input type="email" id="email" name="email" required>
                <small id="emailError" style="color: red; display: none;">Correo no válido o ya registrado.</small>
            </div>
            <div class="input-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required minlength="6">
                <small id="passwordError" style="color: red; display: none;">La contraseña debe tener al menos 6 caracteres.</small>
            </div>
            <div class="input-group">
                <label for="confirmPassword">Confirmar Contraseña:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                <small id="confirmPasswordError" style="color: red; display: none;">Las contraseñas no coinciden.</small>
            </div>

            <button type="submit">Registrarme</button>

            </div>
        </form>
        <script src="<?=ASSETS_URL ?>/js/validations.js"></script>
    </div>

</body>

</html>