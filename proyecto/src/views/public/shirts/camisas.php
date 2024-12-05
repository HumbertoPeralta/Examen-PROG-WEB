<?php 
include_once  __DIR__ .'../../../layouts/header.php';
?>
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/style.css">

<div class="title-container">
    <h1 class="centered-title">Camisas</h1>
</div>

<?php

$shirts = getShirts();

if (count($shirts) > 0) {
    echo '<div class="card-container">';
    foreach ($shirts as $shirt) {
        echo '<div class="card">';
        echo '<img src="' . htmlspecialchars($shirt['imagen']) . '" alt="' . htmlspecialchars($shirt['nombre']) . '">';
        echo "<h3>" .($shirt['nombre']) . "</h3>";
        echo "<p>Precio: $" . number_format($shirt['precio'], 2) . "</p>";
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