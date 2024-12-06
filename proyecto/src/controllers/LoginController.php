<?php
require_once __DIR__ . '/../helpers/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validaciones básicas
    if (empty($email) || empty($password)) {
        die('Por favor completa todos los campos.');
    }

    // Validar el formato del correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('El formato del correo electrónico no es válido.');
    }

    // Conectar a la base de datos
    $pdo = getPDO();

    // Consultar el usuario en la base de datos
    $sql = "SELECT id_usuario, nombre_usuario, password, tipo FROM usuario WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die('Correo o contraseña incorrectos.');
    }

    // Verificar la contraseña
    if (!password_verify($password, $user['password'])) {
        die('Correo o contraseña incorrectos.');
    }

    // Configurar la sesión del usuario
    $_SESSION['id_usuario'] = $user['id_usuario'];
    $_SESSION['nombre_usuario'] = $user['nombre_usuario'];
    $_SESSION['tipo'] = $user['tipo'];

    // Redirigir al usuario según su tipo
    if ($user['tipo'] === 'administrador') {
        header('Location: /views/admin/tshirt/index.php'); // Ruta para administrador
    } else {
        header('Location: ' . BASE_URL . '/');
    }
    exit;
}
