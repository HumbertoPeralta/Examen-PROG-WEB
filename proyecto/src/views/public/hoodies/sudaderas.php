<?php 
include_once  __DIR__ .'../../../layouts/header.php';
?>

<?php

$hoodies = getHoodies();

if (count($hoodies) > 0) {
    foreach ($hoodies as $hoodies) {
        echo "<h3>" .($hoodies['nombre']) . "</h3>";
        echo "<p>Precio: $" . number_format($hoodies['precio'], 2) . "</p>";
    }
} else {
    echo "<p>No hay productos disponibles.</p>";
}
?>

<?php
include_once  __DIR__ .'../../../layouts/footer.php';
?>