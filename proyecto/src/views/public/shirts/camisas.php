<?php 
include_once  __DIR__ .'../../../layouts/header.php';
?>

<?php

$shirts = getShirts();

if (count($shirts) > 0) {
    foreach ($shirts as $shirt) {
        echo "<h3>" .($shirt['nombre']) . "</h3>";
        echo "<p>Precio: $" . number_format($shirt['precio'], 2) . "</p>";
    }
} else {
    echo "<p>No hay productos disponibles.</p>";
}
?>

<?php
include_once  __DIR__ .'../../../layouts/footer.php';
?>