<?php
session_start();
if ($_SESSION['rol'] != 'admin') {
    header("Location: cliente_dashboard.php");
    exit();
}

include '../config/config.php'; // Incluir la configuración de la base de datos

// Verificar si se ha proporcionado un ID de producto
if (!isset($_GET['id'])) {
    header("Location: panel_administracion.php");
    exit();
}

$id_producto = intval($_GET['id']);

// Obtener los detalles del producto
$stmt = $pdo->prepare("SELECT * FROM productos WHERE id_producto = :id");
$stmt->execute(['id' => $id_producto]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
    header("Location: panel_administracion.php");
    exit();
}

// Manejar el envío del formulario de edición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion_producto = $_POST['descripcion_producto'];
    $precio_producto = $_POST['precio_producto'];
    $cantidad_producto = $_POST['cantidad_producto'];
    $categoria = $_POST['categoria'];
    $es_oferta = isset($_POST['oferta']) ? 1 : 0;
    $precio_oferta = $es_oferta ? $_POST['precio_oferta'] : null;

    // Manejo de la imagen
    $foto_producto = $producto['foto_producto']; // Mantener la foto actual por defecto
    if (isset($_FILES['foto_producto']) && $_FILES['foto_producto']['error'] == 0) {
        $foto_producto = $_FILES['foto_producto']['name'];
        move_uploaded_file($_FILES['foto_producto']['tmp_name'], "../uploads/productos/" . $foto_producto);
    }

    // Actualizar el producto en la base de datos
    $stmt = $pdo->prepare("UPDATE productos SET 
        nombre_producto = :nombre, 
        descripcion_producto = :descripcion, 
        precio_producto = :precio, 
        cantidad_producto = :cantidad, 
        categoria_producto = :categoria, 
        es_oferta = :es_oferta, 
        precio_oferta = :precio_oferta, 
        foto_producto = :foto 
        WHERE id_producto = :id");

    $stmt->execute([
        'nombre' => $nombre_producto,
        'descripcion' => $descripcion_producto,
        'precio' => $precio_producto,
        'cantidad' => $cantidad_producto,
        'categoria' => $categoria,
        'es_oferta' => $es_oferta,
        'precio_oferta' => $precio_oferta,
        'foto' => $foto_producto,
        'id' => $id_producto
    ]);

    header("Location: ../pages/admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #edc158; /* Color de fondo */
        }
        h1 {
            color: #333;
            text-align: center;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        button:hover {
            background: #218838;
        }
        #oferta-fields {
            display: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php include '../includes/navbar.php'; ?>

<h1>Editar Producto</h1>
<form action="editar_producto.php?id=<?php echo $id_producto; ?>" method="POST" enctype="multipart/form-data">
    <label for="nombre_producto">Nombre del Producto:</label>
    <input type="text" name="nombre_producto" id="nombre_producto" value="<?php echo $producto['nombre_producto']; ?>" required>

    <label for="descripcion_producto">Descripción:</label>
    <textarea name="descripcion_producto" id="descripcion_producto" required><?php echo $producto['descripcion_producto']; ?></textarea>

    <label for="precio_producto">Precio:</label>
    <input type="number" name="precio_producto" id="precio_producto" step="0.01" value="<?php echo $producto['precio_producto']; ?>" required>

    <label for="cantidad_producto">Cantidad:</label>
    <input type="number" name="cantidad_producto" id="cantidad_producto" value="<?php echo $producto['cantidad_producto']; ?>" required>

    <label for="categoria">Categoría:</label>
    <select name="categoria" required>
        <option value="botones" <?php if ($producto['categoria_producto'] == 'botones') echo 'selected'; ?>>Botones</option>
        <option value="accesorios" <?php if ($producto['categoria_producto'] == 'accesorios') echo 'selected'; ?>>Accesorios</option>
        <option value="fuelles" <?php if ($producto['categoria_producto'] == 'fuelles') echo 'selected'; ?>>Fuelles</option>
    </select>

    <label for="foto_producto">Foto del Producto (dejar en blanco para mantener la actual):</label>
    <input type="file" name="foto_producto" id="foto_producto" accept="image/*">

    <label for="oferta">Marcar como oferta:</label>
    <input type="checkbox" id="oferta" name="oferta" <?php if ($producto['es_oferta']) echo 'checked'; ?>>

    <div id="oferta-fields" style="display: <?php echo $producto['es_oferta'] ? 'block' : 'none'; ?>;">
        <label for="precio_oferta">Precio de Oferta:</label>
        <input type="number" name="precio_oferta" id="precio_oferta" step="0.01" value="<?php echo $producto['precio_oferta']; ?>">
    </div>

    <button type="submit">Actualizar Producto</button>
</form>

<script>
    document.getElementById('oferta').onclick = function() {
        const ofertaFields = document.getElementById('oferta-fields');
        ofertaFields.style.display = this.checked ? 'block' : 'none';
    }
</script>
</body>
</html>
