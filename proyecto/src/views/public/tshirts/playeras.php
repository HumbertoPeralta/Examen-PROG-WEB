<?php 
include_once  __DIR__ .'../../../layouts/header.php';
?>

<?php

$tshirts = getTshirts();

if (count($tshirts) > 0) {
    foreach ($tshirts as $tshirt) {
        echo "<h3>" .($tshirt['nombre']) . "</h3>";
        echo "<p>Precio: $" . number_format($tshirt['precio'], 2) . "</p>";
    }
} else {
    echo "<p>No hay productos disponibles.</p>";
}
?>

<?php
include_once  __DIR__ .'../../../layouts/footer.php';
?>