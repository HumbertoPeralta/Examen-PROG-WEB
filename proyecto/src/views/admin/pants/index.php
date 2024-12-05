<?php 
include_once __DIR__.'/../../layouts/header.php';
require_once __DIR__ . '/../../../helpers/auth.php';
require __DIR__.'/../../../controllers/PantsController.php';
$pants = index();
?>


<div class=>
    <h1>Panel administrador</h1>
</div>

<div class="table-container">
        <div class="table-container-header">
            <h1 class="h1-table">Listado de pantalones</h1>
            <a href="<?=SRC_URL?>/views/admin/pants/form.php" class="add-button">Añadir playera</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Talla</th>
                    <th>color</th>
                    <th>Imagen</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pants as $pant): ?>
                <tr>
                    <td><?=$pant['nombre']?></td>
                    <td><?=$pant['precio']?></td>
                    <td><?=$pant['descripcion']?></td>
                    <td><?=$pant['talla']?></td>
                    <td><?=$pant['color']?></td>
                    <td><?=$pant['imagen']?></td>
                    <td><?=$pant['categoria']?></td>
                </tr>
                <?php endforeach; ?>     
            </tbody>
        </table>
    </div>