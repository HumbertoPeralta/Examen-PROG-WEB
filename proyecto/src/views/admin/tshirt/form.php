<?php 
    include_once __DIR__.'/../../layouts/header.php';
    require_once __DIR__ . '/../../../helpers/auth.php';
    require __DIR__.'/../../../controllers/TshirtController.php';
    
    $title = 'Añadir';
    $career = null;
    $route = SRC_URL.'/controllers/careerController.php';

    if(isset($_GET['producto_id'])){
        $title = 'Editar';
        $id = filter_input(INPUT_GET, 'producto_id', FILTER_SANITIZE_STRING);
        $career = show($id);
        $route.="?producto_id=$id";
    }
?>

<div class="form-container">
    <form action="<?=$route?>" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>

        <label for="talla">Talla:</label>
        <input type="text" id="talla" name="talla" required><br>

        <label for="color">Color:</label>
        <input type="text" id="color" name="color" required><br>

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" required><br>

        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" value="tshirt" readonly><br>

        <button type="submit">Agregar Playera</button>

        <?php 
            if(isset($_SESSION['success'])): 
            ?>
            
                <p class="success"><?php echo htmlspecialchars($_SESSION['success'])?></p>
            <?php 
            $_SESSION['success'] = '';
            endif;
            if(isset($_SESSION['errors'])):
            ?>
                <p class="error">
            <?php 
                foreach($_SESSION['errors'] as $error):     
            ?>
                    <?php echo htmlspecialchars($error);?>
            <?php
                endforeach; 
            ?>
                </p>
            <?php
                $_SESSION['errors'] = [];
            endif; 
            ?>
</form>
