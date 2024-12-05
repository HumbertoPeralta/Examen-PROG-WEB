<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('URL', '/Examen-PROG-WEB/proyecto/public');

$request = $_SERVER['REQUEST_URI'];

$request = strtok($request, '?');

switch($request){
    case '/':
        require_once __DIR__.'/../src/views/public/welcome.php';
        break;
    case '/login':
        require_once __DIR__.'/login.php';
        break;
    case '/logout':
        require_once __DIR__.'/../src/controllers/LogoutController.php';
        break;
    default:
        require_once __DIR__.'/../src/views/public/welcome.php';
        break;

}