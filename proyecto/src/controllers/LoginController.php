<?php
require_once __DIR__.'/../helpers/functions.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION = [];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'password123') {
        $_SESSION['user'] = $username;
        header('Location: '.BASE_URL.'/careers');
        exit;
    } else {
        set_error_message_redirect('Error al iniciar sesión');
    }
}
?>