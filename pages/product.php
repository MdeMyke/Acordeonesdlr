<?php
include '../config/config.php';

if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    try {
        // Consulta a la base de datos para obtener información del producto
        $sql = "SELECT * FROM productos WHERE id_producto = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id_producto]);
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$producto) {
            echo "Producto no encontrado.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
} else {
    echo "ID de producto no especificado.";
    exit;
}

// Consulta para obtener 5 productos aleatorios
try {
    $sql_related = "SELECT * FROM productos WHERE id_producto != :id ORDER BY RAND() LIMIT 5";
    $stmt_related = $pdo->prepare($sql_related);
    $stmt_related->execute(['id' => $id_producto]);
    $productos_relacionados = $stmt_related->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/stylenav.css">
    <link rel="icon" href="../assets/img/logo1.png" type="img/png">
    <title><?php echo htmlspecialchars($producto['nombre_producto']); ?></title>
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        .product-container {
            display: flex;
            max-width: 1200px;
            width: 100%;
            gap: 20px;
            margin: 0 auto;
            flex-wrap: wrap;
        }

        .card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
        }
        
        .product-image {
            flex: 1 1 100%; /* Tomar todo el ancho en pantallas pequeñas */
        }

        .product-image img {
            width: 100%;
            height: auto;
            max-height: 600px;
            object-fit: cover;
        }

        .product-details {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            width: 100%; /* Tomar todo el ancho en pantallas pequeñas */
            margin-left: auto;
            text-align: right; /* Alinear el texto a la derecha */
        }

        .product-details h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            text-transform: uppercase;
            margin-top: 0;
        }

        .product-details p {
            margin: 10px 0;
        }

        .divider {
            height: 1px;
            background-color: #ccc;
            margin: 10px 0;
        }

        .add-to-cart-button {
            background-color: #fca311;
            border: none;
            border-radius: 5px;
            padding: 12px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .add-to-cart-button:hover {
            background-color: #e5a300;
        }

        .price-quantity {
            margin-top: auto;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            margin-top: 50px;
        }

        .related-products {
            margin-top: 40px;
        }

        .related-title {
            text-align: center;
            font-size: 1.5rem;
            margin-top:80px;
            margin-bottom: 20px;
            color: #333;
        }

        .related-product-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .related-product {
            width: 180px;
            margin: 10px;
            text-align: center;
        }

        .related-product img {
            width: 180px;
            height: 180px; /* Establece la imagen cuadrada */
            object-fit: cover; /* Ajusta la imagen para cubrir el espacio */
            border-radius: 8px; /* Bordes redondeados para las imágenes */
        }

        .related-product h2 {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .related-product p {
            margin: 5px 0;
        }

        /* Media Queries para Responsividad */
        @media (min-width: 768px) { /* Para pantallas medianas y más grandes */
            .product-image {
                flex: 1 1 50%; /* Tomar el 50% del ancho */
            }

            .product-details {
                flex: 1 1 30%; /* Tomar el 30% del ancho */
                margin-left: auto; /* Mantener el margen a la derecha */
                text-align: right; /* Alinear el texto a la derecha */
            }
        }

            .openBtn {
        background-color: #fca311; /* Verde más atractivo */
        color: white; /* Texto blanco */
        border: none;
        border-radius: 8px; /* Bordes más redondeados */
        padding: 15px 0; /* Padding vertical, ajusta horizontal si deseas un espacio */
        cursor: pointer;
        font-weight: bold;
        font-size: 1.2rem;
        transition: background-color 0.3s ease, transform 0.2s ease; /* Efecto suave en el color y transformación */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        width: 100%; /* Hacer que el botón ocupe todo el ancho */
        }

        .openBtn:hover {
        background-color: #45a049; /* Color más oscuro al pasar el mouse */
        transform: scale(1.05); /* Aumentar ligeramente el tamaño al pasar el mouse */
        }

        .openBtn:active {
        transform: scale(0.95); /* Efecto de "presionar" el botón */
        }


    </style>
</head>
<?php include '../pages/botonfixed.php'; ?>

<nav>
    <?php include '../includes/navbar.php'; ?>
</nav>

<body>
    <section>
        <div class="product-container">
            <div class="card product-image">
                <img src="../uploads/productos/<?php echo $producto['foto_producto']; ?>" alt="<?php echo htmlspecialchars($producto['nombre_producto']); ?>">
            </div>
            <div class="card product-details">
                <h1><?php echo htmlspecialchars($producto['nombre_producto']); ?></h1>
                <div class="divider"></div>
                <p>Descripción: <?php echo htmlspecialchars($producto['descripcion_producto']); ?></p>
                <div class="divider"></div>
                <div class="price-quantity">
                    <p>Precio: $<?php echo number_format($producto['precio_producto'], 2); ?></p>
                    <p>Cantidad disponible: <?php echo $producto['cantidad_producto']; ?></p>
                </div>

                <?php
                // Enlace al producto en WhatsApp
                $producto_nombre = urlencode($producto['nombre_producto']);
                $producto_precio = number_format($producto['precio_producto'], 2);
                $producto_imagen = urlencode("https://acordeonesdlr-production.up.railway.app/uploads/productos/" . $producto['foto_producto']); // Cambia "tu-dominio.com" por tu dominio real

                // Genera la URL del producto
                $producto_link = "https://acordeonesdlr-production.up.railway.app/pages/product.php?id=" . $id_producto;

                $mensaje = "Hola, estoy interesado en el producto *$producto_nombre* que cuesta *$ $producto_precio*.\n\n\n\n" .
                    "Puedes ver el producto aquí: $producto_link";
                    
                $whatsapp_url = "https://wa.me/14088166630?text=" . $mensaje;
                ?>
                <!-- Muestra el botón de WhatsApp -->
                <a aria-label="Chat on WhatsApp" href="<?php echo $whatsapp_url; ?>" target="_blank" class="whatsapp-button">
                <button class="openBtn">Buy Now</button>
                </a>

            </div>
        </div>
    </section>
    <div class="related-products">
        <h2 class="related-title">Productos relacionados</h2>
        <div class="related-product-container">
            <?php foreach ($productos_relacionados as $related): ?>
                <div class="related-product">
                    <img src="../uploads/productos/<?php echo $related['foto_producto']; ?>" alt="<?php echo htmlspecialchars($related['nombre_producto']); ?>">
                    <h2><?php echo htmlspecialchars($related['nombre_producto']); ?></h2>
                    <p>Precio: $<?php echo number_format($related['precio_producto'], 2); ?></p>
                    <a href="product.php?id=<?php echo $related['id_producto']; ?>">
                        <button class="add-to-cart-button">Watch me</button>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <br>
        <br>
        <footer>
            <?php include '../includes/footer.php'; ?>
        </footer>
        <script>    
            // Puedes agregar scripts adicionales aquí
        </script>
    </body>
</html>
