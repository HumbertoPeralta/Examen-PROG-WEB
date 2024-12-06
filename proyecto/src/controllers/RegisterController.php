<?php
require_once __DIR__.'/../helpers/functions.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = $_POST['nombre_usuario'] ?? '';
    $apellido_paterno = $_POST['apellido_paterno'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $tipo = 'cliente'; // Asignar tipo predeterminado como cliente.

    // Validaciones básicas
    if (empty($nombre_usuario) || empty($apellido_paterno) || empty($telefono) || empty($email) || empty($password)) {
        die('Todos los campos son obligatorios.');
    }

    // Validar formato del correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('El formato del correo electrónico no es válido.');
    }

    // Validar si el correo ya existe en la base de datos
    $pdo = getPDO();
    $sqlCheck = "SELECT COUNT(*) FROM usuario WHERE email = :email";
    $stmtCheck = $pdo->prepare($sqlCheck);
    $stmtCheck->execute(['email' => $email]);
    if ($stmtCheck->fetchColumn() > 0) {
        die('El correo electrónico ya está registrado.');
    }

    // Insertar el nuevo usuario
    $sql = "INSERT INTO usuario (nombre_usuario, apellido_paterno, telefono, email, password, tipo) 
            VALUES (:nombre_usuario, :apellido_paterno, :telefono, :email, :password, :tipo)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            'nombre_usuario' => $nombre_usuario,
            'apellido_paterno' => $apellido_paterno,
            'telefono' => $telefono,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT), // Cifrado seguro de contraseña
            'tipo' => $tipo // Tipo predeterminado
        ]);
        echo 'Usuario registrado con éxito.';
    } catch (PDOException $e) {
        error_log("Error al registrar usuario: " . $e->getMessage());
        die('Error al registrar el usuario.'. $e->getMessage());
    }
}
