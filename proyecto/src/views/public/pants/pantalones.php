<?php 
include_once  __DIR__ .'../../../layouts/header.php';
?>
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/style.css">

<div class="title-container">
    <h1 class="centered-title">Pantalones</h1>
</div>

<?php

$Pants = getPants();

if (count($Pants) > 0) {
    echo '<div class="card-container">';
    foreach ($Pants as $Pant) {
        $imagePath = ASSETS_URL . '/img/' . htmlspecialchars($Pant['imagen']);
        echo '<div class="card">';
        echo '<img src="' . $imagePath . '" alt="' . htmlspecialchars($Pant['nombre']) . '">';
        echo "<h3>" . htmlspecialchars($Pant['nombre']) . "</h3>";
        echo "<p>Precio: $" . number_format($Pant['precio'], 2) . "</p>";
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
