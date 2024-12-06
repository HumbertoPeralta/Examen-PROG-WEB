<?php 
include_once  __DIR__ .'../../../layouts/header.php';
?>
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/style.css">

<div class="title-container">
    <h1 class="centered-title">Sudaderas</h1>
</div>

<?php

$hoodies = getHoodies();

if (count($hoodies) > 0) {
    echo '<div class="card-container">';
    foreach ($hoodies as $hoodie) {
        echo '<div class="card">';
        echo '<img src="' . htmlspecialchars($hoodie['imagen']) . '" alt="' . htmlspecialchars($hoodie['nombre']) . '">';
        echo "<h3>" .($hoodie['nombre']) . "</h3>";
        echo "<p>Precio: $" . number_format($hoodie['precio'], 2) . "</p>";
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