<?php 
include_once  __DIR__ .'../../../layouts/header.php';
?>

<link rel="stylesheet" href="<?=ASSETS_URL?>/css/style.css">

<div class="title-container">
    <h1 class="centered-title">Pantalones</h1>
</div>

<?php

$pants = getPants();

if (count($pants) > 0) {
    echo '<div class="card-container">';
    foreach ($pants as $pants) {
        echo '<div class="card">';
        echo '<img src="' . htmlspecialchars($pants['imagen']) . '" alt="' . htmlspecialchars($pants['nombre']) . '">';
        echo "<h3>" .($pants['nombre']) . "</h3>";
        echo "<p>Precio: $" . number_format($pants['precio'], 2) . "</p>";
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