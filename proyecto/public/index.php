<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('URL', '/Examen-PROG-WEB/proyecto/public');

$request = $_SERVER['REQUEST_URI'];

$request = strtok($request, '?');

switch($request){
    case URL . '/':
        require_once __DIR__.'/../src/views/public/welcome.php';
        break;
    case URL . '/login':
        require_once __DIR__.'/login.php';
        break;
    case URL . '/tshirt':
        require_once __DIR__.'/../src/views/admin/tshirt/index.php';
        break;
    case URL . '/logout':
        require_once __DIR__.'/../src/controllers/LogoutController.php';
        break;
    default:
        http_response_code(404);        
    break;

}