<?php 
include_once  __DIR__ .'../../../layouts/header.php';
?>

<link rel="stylesheet" href="<?=ASSETS_URL?>/css/styleProducto.css">

<div class="title-container">
    <h1 class="centered-title">Pantalones</h1>
</div>

<?php
$pants = getPants();

if (count($pants) > 0) {
    foreach ($pants as $tpant) {
        ?>
        <div class="card-container">
            <div class="card">
            echo '<img src="' . htmlspecialchars($pants['imagen']) . '" alt="' . htmlspecialchars($pants['nombre']) . '">';
                <h3><?php echo htmlspecialchars($pants['nombre']); ?></h3>
                <!-- p><?php echo htmlspecialchars($pants['descripcion']); ?></p> -->
                <p><?php echo "Precio: $" . number_format($pants['precio'], 2); ?></p>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>No hay productos disponibles.</p>";
}
?>

</div>

<?php
include_once  __DIR__ .'../../../layouts/footer.php';
?>