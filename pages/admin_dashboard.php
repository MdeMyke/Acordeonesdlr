<?php
session_start();
if ($_SESSION['rol'] != 'admin') {
    header("Location: cliente_dashboard.php");
    exit();
}

include '../config/config.php'; // Incluir la configuración de la base de datos

// Obtener todos los productos
$productos = $pdo->query("SELECT * FROM productos")->fetchAll(PDO::FETCH_ASSOC);

// Obtener todos los usuarios
$usuarios = $pdo->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);

// Manejo de eliminación de productos
if (isset($_GET['eliminar'])) {
    $id_producto = intval($_GET['eliminar']);
    $stmt = $pdo->prepare("DELETE FROM productos WHERE id_producto = :id");
    $stmt->execute(['id' => $id_producto]);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #edc158; /* Color de fondo */
        }
        h1, h2 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto 20px;
            max-width: 500px; /* Max width for form */
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
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #28a745;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
        .productos, .usuarios {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .producto-card, .usuario-card {
            background: #fff;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(25% - 10px); /* Small cards */
            box-sizing: border-box;
            text-align: center; /* Center text */
        }
        .producto-card img {
            width: 100px; /* Fixed width for square images */
            height: 100px; /* Fixed height for square images */
            object-fit: cover; /* Ensures the image covers the box */
            border-radius: 5px;
        }
        .action-buttons {
            margin-top: 10px;
        }
        .action-buttons a {
            text-decoration: none;
            margin-right: 5px;
            color: #007bff; /* Color for edit button */
        }
        .action-buttons a.delete {
            color: red; /* Color for delete button */
        }
        @media (max-width: 768px) {
            .producto-card, .usuario-card {
                flex: 1 1 calc(50% - 10px); /* Adjust for medium screens */
            }
        }
        @media (max-width: 480px) {
            .producto-card, .usuario-card {
                flex: 1 1 100%; /* Stack on small screens */
            }
        }
    </style>
</head>
<body>
<?php include '../includes/navbar.php'; ?>

    <h1>Bienvenido al panel de Administración <?php echo $_SESSION['username']; ?></h1>

    <h2>Agregar Nuevo Producto</h2>
    <form action="agregar_producto.php" method="POST" enctype="multipart/form-data">
        <label for="nombre_producto">Nombre del Producto:</label>
        <input type="text" name="nombre_producto" id="nombre_producto" required>

        <label for="descripcion_producto">Descripción:</label>
        <textarea name="descripcion_producto" id="descripcion_producto" required></textarea>

        <label for="precio_producto">Precio:</label>
        <input type="number" name="precio_producto" id="precio_producto" step="0.01" required>

        <label for="cantidad_producto">Cantidad:</label>
        <input type="number" name="cantidad_producto" id="cantidad_producto" required>

        <label for="categoria">Categoría:</label>
        <select name="categoria" required>
            <option value="botones">Botones</option>
            <option value="accesorios">Accesorios</option>
            <option value="fuelles">Fuelles</option>
        </select>
        
        <label for="foto_producto">Foto del Producto:</label>
        <input type="file" name="foto_producto" id="foto_producto" accept="image/*" required>

        <label for="oferta">Marcar como oferta:</label>
        <input type="checkbox" id="oferta" name="oferta" onclick="toggleOfertaPrice()">

        <div id="oferta-fields" style="display:none;">
            <label for="precio_oferta">Precio de Oferta:</label>
            <input type="number" name="precio_oferta" id="precio_oferta" step="0.01">
        </div>
        <br>
        <br>
        <button type="submit">Agregar Producto</button>
    </form>

    <h2>Productos</h2>
    <div class="productos">
        <?php foreach ($productos as $producto): ?>
            <div class="producto-card">
                <h3><?php echo $producto['nombre_producto']; ?></h3>
                <p><?php echo $producto['descripcion_producto']; ?></p>
                <p>Precio: $<?php echo $producto['precio_producto']; ?></p>
                <p>Cantidad: <?php echo $producto['cantidad_producto']; ?></p>
                <img src="../uploads/productos/<?php echo $producto['foto_producto']; ?>" alt="<?php echo $producto['nombre_producto']; ?>">
                <p>Categoría: <?php echo $producto['categoria_producto']; ?></p>
                <?php if ($producto['es_oferta']): ?>
                    <p>Oferta: $<?php echo $producto['precio_oferta']; ?></p>
                <?php endif; ?>

                <div class="action-buttons">
                    <a href="../pages/editar_producto.php?id=<?php echo $producto['id_producto']; ?>">Editar</a>
                    <a href="?eliminar=<?php echo $producto['id_producto']; ?>" class="delete" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?');">Eliminar</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Usuarios</h2>
    <div class="usuarios">
        <?php foreach ($usuarios as $usuario): ?>
            <div class="usuario-card">
                <h3><?php echo $usuario['full_name']; ?></h3>
                <p>Username: <?php echo $usuario['username']; ?></p>
                <p>Email: <?php echo $usuario['email']; ?></p>
                <p>Teléfono: <?php echo $usuario['telefono']; ?></p>
                <p>Rol: <?php echo $usuario['rol']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
    function toggleOfertaPrice() {
        const ofertaFields = document.getElementById('oferta-fields');
        const ofertaCheckbox = document.getElementById('oferta');
        ofertaFields.style.display = ofertaCheckbox.checked ? 'block' : 'none';
    }
    </script>
</body>
</html>
