<?php 
include_once  __DIR__ .'../../../layouts/header.php';
?>

<?php

$pants = getPants();

if (count($pants) > 0) {
    foreach ($pants as $pants) {
        echo "<h3>" .($pants['nombre']) . "</h3>";
        echo "<p>Precio: $" . number_format($pants['precio'], 2) . "</p>";
    }
} else {
    echo "<p>No hay productos disponibles.</p>";
}
?>

<?php
include_once  __DIR__ .'../../../layouts/footer.php';
?>