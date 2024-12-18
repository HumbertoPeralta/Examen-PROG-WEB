<?php 
require_once __DIR__.'/../helpers/functions.php';
require_once __DIR__ . '/../helpers/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    clean_post_inputs();
    if(isset($_GET['producto_id'])){ 
        update(filter_input(INPUT_GET, 'producto_id', FILTER_SANITIZE_STRING)); 
    }else{
        store(); 
    }
}


function index($categoria)
{
    $pdo = getPDO();

    try {
        $sql = "SELECT id_producto,nombre, precio, descripcion, talla, color, imagen, categoria 
                FROM productos 
                WHERE categoria = :categoria";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['categoria' => $categoria]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return [];
    }
}


function show($id) 
{
    $id = htmlspecialchars($id); 
    if ($id === null) {
        return []; 
    }
    $pdo = getPDO(); 
    try {
        $sql = "SELECT * FROM productos WHERE id_producto = :id_producto LIMIT 1"; 
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_producto' => $id]); 
        $categoriesData = $stmt->fetch(PDO::FETCH_ASSOC); 
        if (!$categoriesData) {
            return []; 
        }
        return $categoriesData; 
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return []; 
    }
}

function delete($id_producto) {
    $pdo = getPDO();  

    try {
        $sql = "DELETE FROM productos WHERE id_producto = :id_producto";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_producto' => $id_producto]);

        $categoriesData = show($id_producto); 
        if ($categoriesData && isset($categoriesData['imagen'])) {
            $oldImagePath = __DIR__ . '/../../public/assets/img/' . $categoriesData['imagen'];
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);  
            }
        }

        set_success_message('Producto eliminado con éxito.');  
    } catch (PDOException $e) {
        error_log("Error al eliminar el producto: " . $e->getMessage());  
        set_error_message_redirect('No se pudo eliminar el producto.'); 
    }

    redirect_back();
}

if (isset($_GET['delete_id'])) {
    $id_producto = filter_input(INPUT_GET, 'delete_id', FILTER_SANITIZE_NUMBER_INT);

    if ($id_producto && is_numeric($id_producto)) {
        delete($id_producto);  
    }
}


function store() {
    $imageName = saveImage(); 
    
    $pdo = getPDO();

    try {
        $sql = "INSERT INTO productos (nombre,precio,descripcion,talla,color,categoria,imagen) VALUES (:nombre,:precio,:descripcion,:talla,:color,:categoria,:imagen)";
        $stmt = $pdo->prepare($sql); 
        $data = [
            'nombre' => $_POST['nombre'], 
            'precio' => $_POST['precio'],
            'descripcion' => $_POST['descripcion'],
            'talla' => $_POST['talla'],
            'color' => $_POST['color'],
            'categoria' => $_POST['categoria'],
            'imagen' => $imageName != null ? 'tshirts/'.$imageName : null 
        ];

        $stmt->execute($data); 
        
        set_success_message('Se ha agregado el producto.'); 
        redirect_back(); 
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage()); 
        set_error_message_redirect($e->getMessage()); 
    }
}

function update($id) {
    $pdo = getPDO(); 
    $categoriesData = show($id); 
    $imageName = saveImage(); 

    try {
        $sql = "UPDATE productos SET 
                    nombre = :nombre, 
                    precio = :precio, 
                    descripcion = :descripcion, 
                    talla = :talla, 
                    color = :color, 
                    categoria = :categoria,
                    imagen = :imagen
                WHERE id_producto = :id_producto"; 
        $stmt = $pdo->prepare($sql);
        $data = [
            'id_producto' => $id, 
            'nombre' => $_POST['nombre'],
            'precio' => $_POST['precio'],
            'descripcion' => $_POST['descripcion'],
            'talla' => $_POST['talla'],
            'color' => $_POST['color'],
            'categoria' => $_POST['categoria'],
            'imagen' => $imageName ? 'tshirts/'.$imageName : $categoriesData['imagen'] 
        ];

        $stmt->execute($data); 
       
        if ($imageName && $categoriesData['imagen']) {
            $oldImagePath = __DIR__ . '/../../public/assets/img/' . $categoriesData['imagen'];
            if (file_exists($oldImagePath)) 
                unlink($oldImagePath); 
        }
        
        set_success_message('Se han guardado los cambios.'); 
        redirect_back(); 
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage()); 
        set_error_message_redirect($e->getMessage()); 
    }

    
}

function saveImage()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['imagen'];

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($image['type'], $allowedTypes)) {
            set_error_message_redirect('Solo se permiten imágenes JPEG, PNG o GIF.');
        }

        if ($image['size'] > 2 * 1024 * 1024) {
            set_error_message_redirect("El tamaño de la imagen no debe exceder los 2 MB.");
        }

        $uploadDir = __DIR__ . '/../../public/assets/img/tshirts/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); 
        }

        $imageName = uniqid('img_', true) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);

        $imagePath = $uploadDir . $imageName;
        if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
            set_error_message_redirect("Error al mover la imagen.");
        }

        return $imageName; 
    }
    
    return null; 
}