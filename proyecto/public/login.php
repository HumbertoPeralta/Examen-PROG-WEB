<?php 
    require __DIR__.'/../src/helpers/functions.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300..700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>

body {
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

.login-form {
    display: flex;
    flex-direction: column;
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 1.5rem;
}

.input-group {
    margin-bottom: 1rem;
}

label {
    display: block;
    margin-bottom: 0.5rem;
    color: #555;
}

input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
}

button {
    background-color: #1877f2;
    color: white;
    border: none;
    padding: 0.75rem;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #166fe5;
}

.extra-options {
    display: flex;
    justify-content: space-between;
    margin-top: 1rem;
}

a {
    color: #1877f2;
    text-decoration: none;
    font-size: 0.9rem;
}

a:hover {
    text-decoration: underline;
}

@media (max-width: 480px) {
    .container {
        padding: 1rem;
    }
}
    </style>

</head>

<body>

    <div class="container">

        <h2>Iniciar sesión</h2>

        <?php 

        if (isset($_SESSION['errors'][0]))  

            echo "<p style='color:red;'>".$_SESSION['errors'][0]."</p>";

            unset($_SESSION['errors']);

        ?>

        <form method="POST" action="<?=SRC_URL?>/controllers/LoginController.php">

            <div class="input-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password"  required>
            </div>
            <button type="submit">Entrar</button>
            <div class="extra-options">
                <a href="#">¿Olvidaste tu contraseña?</a>
                <a href="#">Crear cuenta</a>
            </div>
        </form>

    </div>

</body>

</html>