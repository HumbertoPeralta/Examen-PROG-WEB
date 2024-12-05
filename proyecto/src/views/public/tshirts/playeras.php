<?php 
include_once  __DIR__ .'../../../layouts/header.php';
?>
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/style.css">

<div class="title-container">
    <h1 class="centered-title">Playeras</h1>
</div>

<?php

$tshirts = getTshirts();

if (count($tshirts) > 0) {
    echo '<div class="card-container">';
    foreach ($tshirts as $tshirt) {
        echo '<div class="card">';
        echo '<img src="' . htmlspecialchars($tshirt['imagen']) . '" alt="' . htmlspecialchars($tshirt['nombre']) . '">';
        echo '<h3>' . htmlspecialchars($tshirt['nombre']) . '</h3>';
        /* echo '<p>' . htmlspecialchars($tshirt['descripcion']) . '</p>'; */
        echo '<p>Precio: $' . number_format($tshirt['precio'], 2) . '</p>';
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