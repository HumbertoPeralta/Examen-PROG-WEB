<?php 
include_once __DIR__.'/../../layouts/header.php';
require_once __DIR__ . '/../../../helpers/auth.php';
require __DIR__.'/../../../controllers/TshirtController.php';
$careers = index();
?>

<div class="table-container">
        <div class="table-container-header">
            <h1 class="h1-table">Listado de Carreras</h1>
            <a href="<?=BASE_URL?>/tshirt/form" class="add-button">Añadir Carrera</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Año del plan</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tshirts as $tshirt): ?>
                <tr>
                    <td><?=$tshirt['nombre']?></td>
                    <td><?=$tshirt['precio']?></td>
                    <td><?=$tshirt['descripcion']?></td>
                    <td><?=$tshirt['year']?></td>
                    <td class="actions">
                        <a href="#">Ver</a>
                        <a href="<?=BASE_URL?>/tshirt/form?producto_id=<?=$tshirt['id']?>">Editar</a>
                        <a href="#">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>     
            </tbody>
        </table>
    </div>