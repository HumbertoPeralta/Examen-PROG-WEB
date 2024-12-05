<?php 
    include_once __DIR__.'/../../layouts/header.php';
    require_once __DIR__ . '/../../../helpers/auth.php';
    require __DIR__.'/../../../controllers/TshirtController.php';
    
    $title = 'Añadir';
    $tshirt = null;
    $route = SRC_URL.'/controllers/TshirtController.php';

    if(isset($_GET['producto_id'])){
        $title = 'Editar';
        $id = filter_input(INPUT_GET, 'producto_id', FILTER_SANITIZE_STRING);
        $tshirt = show($id);
        $route.="?producto_id=$id";
    }
?>

<form method="POST" action="<?=SRC_URL?>/controllers/TshirtController.php" enctype="multipart/form-data">
    <div class="form-container">
        <h2>Agregar Playera</h2>

        <div class="input-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="input-group">
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>
        </div>

        <div class="input-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
        </div>

        <div class="input-group">
            <label for="talla">Talla:</label>
            <select id="talla" name="talla" required>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
        </div>

        <div class="input-group">
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" required>
        </div>

        <div class="input-group">
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" required>
        </div>

        <div class="input-group">
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="playera">Playera</option>
                <option value="camisa">Camisa</option>
                <option value="pantalon">Pantalon</option>
                <option value="sudadera">Sudadera</option>
            </select>
        </div>

        <button type="submit" class="submit-btn">Agregar Playera</button>
    
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
    
    </div>

</form>
