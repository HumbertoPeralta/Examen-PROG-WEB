<?php 
include_once __DIR__ . '../../../layouts/header.php';
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: ' . BASE_URL . '/login');
    exit;
}
?>
<link rel="stylesheet" href="<?= ASSETS_URL ?>/css/styleProducto.css">

<div class="title-container">
    <h1 class="centered-title">Playeras</h1>
</div>

<?php
$tshirts = getTshirts();

if (count($tshirts) > 0) {
    foreach ($tshirts as $tshirt) {
        ?>
        <div class="card-container">
            <div class="card">
                <img src="<?= ASSETS_URL ?>/img/<?php echo htmlspecialchars($tshirt['imagen']); ?>" alt="Imagen de camiseta">
                <h3><?php echo htmlspecialchars($tshirt['nombre']); ?></h3>
                <!-- p><?php echo htmlspecialchars($tshirt['descripcion']); ?></p> -->
                <p><?php echo "Precio: $" . number_format($tshirt['precio'], 2); ?></p>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>No hay productos disponibles.</p>";
}
?>

<?php
include_once __DIR__ . '../../../layouts/footer.php';
?>

