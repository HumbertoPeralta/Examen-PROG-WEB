<?php 
include_once __DIR__.'/../../layouts/header.php';
require_once __DIR__ . '/../../../helpers/auth.php';
require __DIR__.'/../../../controllers/AdminController.php';

$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : 'playera';

$categorias = index($categoriaSeleccionada);
?>

<div>
    <h1>Panel administrador</h1>
</div>

<div class="category-selector">
    <form method="GET" action="">
        <label for="categoria">Seleccionar categoría:</label>
        <select id="categoria" name="categoria" onchange="this.form.submit()">
            <option value="playera" <?= $categoriaSeleccionada === 'playera' ? 'selected' : '' ?>>Playera</option>
            <option value="camisa" <?= $categoriaSeleccionada === 'camisa' ? 'selected' : '' ?>>Camisa</option>
            <option value="sudadera" <?= $categoriaSeleccionada === 'sudadera' ? 'selected' : '' ?>>Sudadera</option>
            <option value="pantalon" <?= $categoriaSeleccionada === 'pantalon' ? 'selected' : '' ?>>Pantalón</option>
        </select>
    </form>
</div>

<div class="table-container">
    <div class="table-container-header">
        <h1 class="h1-table">Listado de <?= htmlspecialchars($categoriaSeleccionada) ?>s</h1>
        <a href="<?=SRC_URL?>/views/admin/views/form.php" class="add-button">Añadir <?= htmlspecialchars($categoriaSeleccionada) ?></a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Talla</th>
                <th>Color</th>
                <th>Imagen</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= htmlspecialchars($categoria['nombre']) ?></td>
                <td><?= htmlspecialchars($categoria['precio']) ?></td>
                <td><?= htmlspecialchars($categoria['descripcion']) ?></td>
                <td><?= htmlspecialchars($categoria['talla']) ?></td>
                <td><?= htmlspecialchars($categoria['color']) ?></td>
                <td><img src="<?= htmlspecialchars($categoria['imagen']) ?>" alt="<?= htmlspecialchars($categoria['nombre']) ?>" style="max-width: 100px;"></td>
                <td><?= htmlspecialchars($categoria['categoria']) ?></td>
                <td class="actions">
                <a href="<?= SRC_URL ?>/views/admin/views/form.php?producto_id=<?= $categoria['id_producto'] ?>">Editar</a>
                <a href="<?= SRC_URL ?>/controllers/AdminController.php?delete_id=<?= $categoria['id_producto'] ?>" class="delete-button">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>     
        </tbody>
    </table>
</div>
