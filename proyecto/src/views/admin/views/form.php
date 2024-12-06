<?php 
include_once __DIR__.'/../../layouts/header.php';
require_once __DIR__ . '/../../../helpers/auth.php';
require __DIR__.'/../../../controllers/AdminController.php';

$title = 'Añadir Producto';
$categories = null;
$route = SRC_URL.'/controllers/AdminController.php';

if (isset($_GET['producto_id'])) {
    $id = filter_input(INPUT_GET, 'producto_id', FILTER_SANITIZE_STRING);
    $categories = show($id);
    $route .= "?producto_id=$id";
    $title = 'Editar Producto';
    
}
?>

<a href="javascript:history.back()" >
    <img src="<?= ASSETS_URL ?>/img/arrow-narrow-left.svg" alt="Imagen">
</a>


<form method="POST" action="<?= htmlspecialchars($route) ?>" enctype="multipart/form-data">
    <div class="form-container">
        <h2><?= $title ?></h2>

        <div class="input-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $categories['nombre'] ?? '' ?>" required>
        </div>

        <div class="input-group">
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" value="<?= $categories['precio'] ?? '' ?>" required>
        </div>

        <div class="input-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?= $categories['descripcion'] ?? '' ?></textarea>
        </div>

        <div class="input-group">
            <label for="talla">Talla:</label>
            <select id="talla" name="talla" required>
                <option value="S" <?= (isset($categories['talla']) && $categories['talla'] === 'S') ? 'selected' : '' ?>>S</option>
                <option value="M" <?= (isset($categories['talla']) && $categories['talla'] === 'M') ? 'selected' : '' ?>>M</option>
                <option value="L" <?= (isset($categories['talla']) && $categories['talla'] === 'L') ? 'selected' : '' ?>>L</option>
                <option value="XL" <?= (isset($categories['talla']) && $categories['talla'] === 'XL') ? 'selected' : '' ?>>XL</option>
            </select>
        </div>

        <div class="input-group">
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" value="<?= $categories['color'] ?? '' ?>" required>
        </div>

        <div class="input-group">
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" <?= $categories ? '' : 'required' ?>>
            <?php if (isset($categories['imagen']) && $categories['imagen']): ?>
                <p>Imagen actual: <img src="<?= htmlspecialchars($categories['imagen']) ?>" alt="Imagen actual" style="max-width: 100px;"></p>
            <?php endif; ?>
        </div>

        <div class="input-group">
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="playera" <?= (isset($categories['categoria']) && $categories['categoria'] === 'playera') ? 'selected' : '' ?>>Playera</option>
                <option value="camisa" <?= (isset($categories['categoria']) && $categories['categoria'] === 'camisa') ? 'selected' : '' ?>>Camisa</option>
                <option value="pantalon" <?= (isset($categories['categoria']) && $categories['categoria'] === 'pantalon') ? 'selected' : '' ?>>Pantalón</option>
                <option value="sudadera" <?= (isset($categories['categoria']) && $categories['categoria'] === 'sudadera') ? 'selected' : '' ?>>Sudadera</option>
            </select>
        </div>

        <button type="submit" class="submit-btn"><?= $title ?></button>

        <?php 
        if (isset($_SESSION['success'])): 
        ?>
            <p class="success"><?= htmlspecialchars($_SESSION['success']) ?></p>
        <?php 
        $_SESSION['success'] = '';
        endif;
        if (isset($_SESSION['errors'])):
        ?>
            <p class="error">
        <?php 
            foreach ($_SESSION['errors'] as $error):     
        ?>
                <?= htmlspecialchars($error) ?><br>
        <?php
            endforeach; 
        ?>
            </p>
        <?php
            $_SESSION['errors'] = [];
        endif; 
        ?>
    </div>
</form>
