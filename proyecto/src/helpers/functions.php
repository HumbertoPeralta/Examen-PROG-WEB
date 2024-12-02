<?php 
require __DIR__.'/../config/database.php';
$config = require __DIR__.'/../config/config.php';
define('BASE_URL', $config['base_url']);
define('ASSETS_URL', $config['assets_url']);

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

