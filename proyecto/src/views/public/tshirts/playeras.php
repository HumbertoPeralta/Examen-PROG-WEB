<?php 
include_once  __DIR__ .'../../../layouts/header.php';
?>
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/style.css">

<div class="title-container">
    <h1 class="centered-title">Playeras</h1>
</div>

<?php

$Tshirts = getTshirts();

if (count($Tshirts) > 0) {
    echo '<div class="card-container">';
    foreach ($Tshirts as $Tshirt) {
        $imagePath = ASSETS_URL . '/img/' . htmlspecialchars($Tshirt['imagen']);
        echo '<div class="card">';
        echo '<img src="' . $imagePath . '" alt="' . htmlspecialchars($Tshirt['nombre']) . '">';
        echo "<h3>" . htmlspecialchars($Tshirt['nombre']) . "</h3>";
        echo "<p>Precio: $" . number_format($Tshirt['precio'], 2) . "</p>";
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
