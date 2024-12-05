<?php 
require __DIR__.'/../config/database.php';
$config = require __DIR__.'/../config/config.php';
define('BASE_URL', $config['base_url']);
define('ASSETS_URL', $config['assets_url']);
define('SRC_URL', $config['src_url']);
define('CAREERS_CACHE_FILE',  __DIR__ .'/../cache/careers.json');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function getBuys()
{
    $pdo = getPDO();

    try {
        $sql = "SELECT id_producto, nombre, precio FROM productos";
        $stmt = $pdo->query($sql);  
        $buys = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        return $buys;
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return [];
    }
}
 
function getTshirts()
{
    $pdo = getPDO();
    try {
        $sql = "SELECT id_producto, nombre, precio, descripcion, talla, color, imagen, categoria FROM productos WHERE categoria = 'playera'"; 
        $stmt = $pdo->query($sql);  
        $tshirts = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        return $tshirts;
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return [];
    }
}

function getPants()
{
    $pdo = getPDO();
    try {
        $sql = "SELECT id_producto, nombre, precio, descripcion, talla, color, imagen, categoria FROM productos WHERE categoria = 'pantalon'"; 
        $stmt = $pdo->query($sql);  
        $pants = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        return $pants;
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return [];
    }
}

function getHoodies()
{
    $pdo = getPDO();
    try {
        $sql = "SELECT id_producto, nombre, precio, descripcion, talla, color, imagen, categoria FROM productos WHERE categoria = 'sudadera'"; 
        $stmt = $pdo->query($sql);  
        $hoodies = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        return $hoodies;
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return [];
    }
}

function getShirts()
{
    $pdo = getPDO();
    try {
        $sql = "SELECT id_producto, nombre, precio, descripcion, talla, color, imagen, categoria FROM productos WHERE categoria = 'camisa'"; 
        $stmt = $pdo->query($sql);  
        $shirts = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        return $shirts;
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return [];
    }
}
