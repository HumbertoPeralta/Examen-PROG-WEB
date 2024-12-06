<?php
require_once __DIR__ . '/../helpers/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        die('Por favor completa todos los campos.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('El formato del correo electrónico no es válido.');
    }

    $pdo = getPDO();

    $sql = "SELECT id_usuario, nombre_usuario, password, tipo FROM usuario WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die('Correo o contraseña incorrectos.');
    }

    if (!password_verify($password, $user['password'])) {
        die('Correo o contraseña incorrectos.');
    }

    $_SESSION['id_usuario'] = $user['id_usuario'];
    $_SESSION['nombre_usuario'] = $user['nombre_usuario'];
    $_SESSION['tipo'] = $user['tipo'];

    if ($user['tipo'] === 'administrador') {
        header('Location:' .BASE_URL. '/admin'); 
    } else {
        header('Location: ' . BASE_URL .'/');
    }
    exit;
}
