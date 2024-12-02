<?php 
include_once  __DIR__ .'/../layouts/header.php';
?>

<?php

$productos = getBuys();

if (count($productos) > 0) {
    foreach ($productos as $producto) {
        echo "<h3>" .($producto['nombre']) . "</h3>";
        echo "<p>Precio: $" . number_format($producto['precio'], 2) . "</p>";
    }
} else {
    echo "<p>No hay productos disponibles.</p>";
}
?>

<?php
include_once  __DIR__ .'/../layouts/footer.php';
?>