<?php 
include_once  __DIR__ .'../../../layouts/header.php';
?>
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/style.css">

<div class="title-container">
    <h1 class="centered-title">Camisas</h1>
</div>

<?php

$Shirts = getShirts();

if (count($Shirts) > 0) {
    echo '<div class="card-container">';
    foreach ($Shirts as $Shirt) {
        $imagePath = ASSETS_URL . '/img/' . htmlspecialchars($Shirt['imagen']);
        echo '<div class="card">';
        echo '<img src="' . $imagePath . '" alt="' . htmlspecialchars($Shirt['nombre']) . '">';
        echo "<h3>" . htmlspecialchars($Shirt['nombre']) . "</h3>";
        echo "<p>Precio: $" . number_format($Shirt['precio'], 2) . "</p>";
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
