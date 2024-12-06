<?php 
include_once  __DIR__ .'../../../layouts/header.php';
?>
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/style.css">

<div class="title-container">
    <h1 class="centered-title">Pantalones</h1>
</div>

<?php

$Hoodies = getHoodies();

if (count($Hoodies) > 0) {
    echo '<div class="card-container">';
    foreach ($Hoodies as $Hoodie) {
        $imagePath = ASSETS_URL . '/img/' . htmlspecialchars($Hoodie['imagen']);
        echo '<div class="card">';
        echo '<img src="' . $imagePath . '" alt="' . htmlspecialchars($Hoodie['nombre']) . '">';
        echo "<h3>" . htmlspecialchars($Hoodie['nombre']) . "</h3>";
        echo "<p>Precio: $" . number_format($Hoodie['precio'], 2) . "</p>";
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "<p>No hay productos disponibles.</p>";
}
?>

<?php
include_once  __DIR__ .'../../../layouts/footer.php';
?>
