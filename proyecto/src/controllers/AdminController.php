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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto_id = filter_input(INPUT_POST, 'id_producto', FILTER_SANITIZE_NUMBER_INT);

    if ($producto_id) {
        $pdo = getPDO();
        try {
            $sql = "DELETE FROM productos WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $producto_id]);

            $_SESSION['success'] = 'Producto eliminado con éxito.';
        } catch (PDOException $e) {
            error_log("Error al eliminar producto: " . $e->getMessage());
            $_SESSION['errors'] = ['Error al eliminar el producto.'];
        }
    } else {
        $_SESSION['errors'] = ['ID del producto inválido.'];
    }

    header('Location: index.php');
    exit;
}

function store() {
    $imageName = saveImage(); 
    
    $pdo = getPDO(); // Obtiene la conexión PDO.

    try {
        $sql = "INSERT INTO productos (nombre,precio,descripcion,talla,color,categoria,imagen) VALUES (:nombre,:precio,:descripcion,:talla,:color,:categoria,:imagen)";
        $stmt = $pdo->prepare($sql); // Prepara la consulta SQL.
        $data = [
            'nombre' => $_POST['nombre'], // Datos del formulario.
            'precio' => $_POST['precio'],
            'descripcion' => $_POST['descripcion'],
            'talla' => $_POST['talla'],
            'color' => $_POST['color'],
            'categoria' => $_POST['categoria'],
            'imagen' => $imageName != null ? 'tshirts/'.$imageName : null // Guarda la URL de la imagen si existe.
        ];

        $stmt->execute($data); // Ejecuta la consulta.
        
        set_success_message('Se ha agregado la playera.'); // Mensaje de éxito.
        redirect_back(); // Redirige al usuario.
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage()); // Registra el error.
        set_error_message_redirect($e->getMessage()); // Mensaje de error.
    }
}

// Actualiza una carrera existente.
function update($id) {
    $pdo = getPDO(); // Obtiene la conexión PDO.
    $categoriesData = show($id); // Obtiene los datos de la carrera existente.
    $imageName = saveImage(); // Guarda la nueva imagen si se subió.

    try {
        $sql = "UPDATE productos SET 
                    nombre = :nombre, 
                    precio = :precio, 
                    descripcion = :descripcion, 
                    talla = :talla, 
                    color = :color, 
                    categoria = :categoria,
                    imagen = :imagen
                WHERE id_producto = :id_producto"; // Consulta para actualizar la carrera.
        $stmt = $pdo->prepare($sql);
        $data = [
            'id_producto' => $id, 
            'nombre' => $_POST['nombre'],
            'precio' => $_POST['precio'],
            'descripcion' => $_POST['descripcion'],
            'talla' => $_POST['talla'],
            'color' => $_POST['color'],
            'categoria' => $_POST['categoria'],
            'imagen' => $imageName ? 'tshirts/'.$imageName : $categoriesData['imagen'] // Usa la nueva imagen si existe.
        ];

        $stmt->execute($data); // Ejecuta la consulta.
        // Borra la imagen previa si se subió una nueva.
        if ($imageName && $categoriesData['imagen']) {
            $oldImagePath = __DIR__ . '/../../public/assets/img/' . $categoriesData['imagen'];
            if (file_exists($oldImagePath)) 
                unlink($oldImagePath); // Elimina la imagen antigua.
        }
        
        set_success_message('Se han guardado los cambios.'); // Mensaje de éxito.
        redirect_back(); // Redirige al usuario.
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage()); // Registra el error.
        set_error_message_redirect($e->getMessage()); // Mensaje de error.
    }

    
}

// Guarda una imagen en el servidor.
function saveImage()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['imagen'];

        // Validar tipo de archivo (solo imágenes).
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($image['type'], $allowedTypes)) {
            set_error_message_redirect('Solo se permiten imágenes JPEG, PNG o GIF.');
        }

        // Validar tamaño (máximo 2 MB).
        if ($image['size'] > 2 * 1024 * 1024) {
            set_error_message_redirect("El tamaño de la imagen no debe exceder los 2 MB.");
        }

        // Crear una carpeta para las imágenes si no existe.
        $uploadDir = __DIR__ . '/../../public/assets/img/tshirts/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Crea la carpeta con permisos.
        }

        // Generar un nombre único para la imagen.
        $imageName = uniqid('img_', true) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);

        // Mover la imagen a la carpeta de destino.
        $imagePath = $uploadDir . $imageName;
        if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
            set_error_message_redirect("Error al mover la imagen.");
        }

        return $imageName; // Retorna el nombre de la imagen.
    }
    
    return null; // Si no se subió imagen, retorna null.
}