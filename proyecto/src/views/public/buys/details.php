<?php 
include_once  __DIR__ .'../../../layouts/header.php';
?>
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/style.css">

<div class="title-container">
    <h1 class="centered-title">Sudaderas</h1>
</div>

<?php

$productos = getBuys();

if (count($productos) > 0) {
    foreach ($productos as $producto) {
        echo '<div class="card">';
        echo '<img src="' . htmlspecialchars($productos['imagen']) . '" alt="' . htmlspecialchars($productos['nombre']) . '">';
        echo "<h3>" .($producto['nombre']) . "</h3>";
        echo "<p>Precio: $" . number_format($producto['precio'], 2) . "</p>";
        echo '</div>';
    }
} else {
    echo "<p>No hay productos disponibles.</p>";
}
?>
</div>

<?php
include_once  __DIR__ .'../../../layouts/footer.php';
?>