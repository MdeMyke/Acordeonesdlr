<?php
include '../config/config.php';

try {
    // Consulta a la base de datos
    $sql = "SELECT * FROM productos WHERE es_oferta = 1";
    $stmt = $pdo->query($sql);

    // Obtener todos los productos
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Asegúrate de incluir tu archivo CSS -->
    <title>Carrusel de Productos</title>
    <style>
        
        
        .sale-background {
    position: absolute;
    top: 90;
    left: 0;
    width: 100%;
    height: 100%;
    color: #edc158; /* Color rojo claro */
    font-size: 100px; /* Ajusta el tamaño del texto según sea necesario */
    font-weight: bold;
    text-align: center;
    white-space: nowrap; /* Evita el salto de línea */
    overflow: hidden; /* Oculta el desbordamiento */
    pointer-events: none; /* Permite hacer clic en el carrusel */
    line-height: 0.5; /* Espaciado entre las líneas */
}

.sale-background span {
    display: inline-block;
    animation: move 10s linear infinite; /* Efecto de movimiento */
}

@keyframes move {
    0% { transform: translateX(100%); }
    100% { transform: translateX(-100%); }
}

/* Estilos básicos para el carrusel */
        .mi-carousel {
            position: relative;
            width: 90%; /* Ajusta el ancho según tus necesidades */
            max-width: 800px; /* Ancho máximo para el carrusel */
            margin: auto; /* Centra el carrusel */
            overflow: hidden;
            height: 400px; /* Ajusta la altura según tus necesidades */
        }

        .mi-carousel-inner {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }

        .mi-carousel-item {
            min-width: 100%; /* Solo un producto visible a la vez */
            height: 100%;
            position: relative;
        }

        .mi-carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Asegura que la imagen cubra el área */
        }

        .mi-info-container {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco con algo de transparencia */
            padding: 10px; /* Espaciado interno */
            border-radius: 5px; /* Bordes redondeados */
        }

        .mi-carousel-item h2, .mi-carousel-item .mi-price {
            margin: 0; /* Elimina margenes para evitar espaciado extra */
            color: black; /* Color del texto */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Sombra de texto */
        }

        .mi-actions {
            margin-top: 10px; /* Espacio entre el texto y los botones */
        }

        .mi-buy-button, .mi-cart-button {
            margin-left: 10px;
        }

        /* Estilos para los botones del carrusel */
        #miPrevBtn, #miNextBtn {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 10; /* Asegúrate de que los botones estén encima de otros elementos */
        }

        /* Estilo para la imagen en la esquina superior izquierda */
        .mi-top-left-image {
            position: absolute;
            top: 0px; /* Espacio desde la parte superior */
            left: 0px; /* Espacio desde la izquierda */
            width: 90px; /* Ajusta el tamaño según tus necesidades */
            height: auto; /* Mantiene la proporción */
            z-index: 5; /* Asegúrate de que esté debajo de los botones */
        }

        /* Estilos para los puntos de indicación */
        .mi-indicators {
            position: absolute;
            bottom: 10px; /* Espacio desde la parte inferior */
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 5px; /* Espacio entre los puntos */
        }

        .mi-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5); /* Color de los puntos */
            cursor: pointer;
        }

        .mi-active-indicator {
            background-color: orange; /* Color para el punto activo */
        }

        /* Estilos para los botones en la parte inferior */
        .mi-button-container {
            text-align: center; /* Centra los botones */
            margin-top: 10px; /* Espacio entre el carrusel y los botones */
        }
    </style>
</head>
<body>

<div class="sale-background">
    <span>
        SALE SALE SALE SALE SALE<br><br>
        SALE SALE SALE SALE SALE<br><br>
        SALE SALE SALE SALE SALE<br><br>
        SALE SALE SALE SALE SALE<br><br>
        SALE SALE SALE SALE SALE
    </span>
</div>

 

<div class="mi-carousel">
    <img src="../assets/img/sale.png" alt="Imagen Superior Izquierda" class="mi-top-left-image">
    <div class="mi-carousel-inner">
    <?php
    // Realiza la consulta para obtener solo productos en oferta
    try {
        $sql = "SELECT * FROM productos WHERE es_oferta = 1;";
        $stmt = $pdo->query($sql);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    foreach ($productos as $producto): ?>
        <div class="mi-carousel-item">
            <a href="product.php?id=<?php echo $producto['id_producto']; ?>">
                <img src="../uploads/productos/<?php echo $producto['foto_producto']; ?>" alt="<?php echo htmlspecialchars($producto['nombre_producto']); ?>">
            </a>
            <div class="mi-info-container">
                <h2><?php echo htmlspecialchars($producto['nombre_producto']); ?></h2>
                <p class="mi-price">$<?php echo number_format($producto['precio_oferta'], 2); ?></p>
                <div class="mi-actions">
                    <a href="product.php?id=<?php echo $producto['id_producto']; ?>" class="mi-buy-button">Watch me</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>

    <!-- Puntos de indicación -->
    <div class="mi-indicators">
        <?php for ($i = 0; $i < count($productos); $i++): ?>
            <div class="mi-indicator <?php echo $i === 0 ? 'mi-active-indicator' : ''; ?>" data-index="<?php echo $i; ?>"></div>
        <?php endfor; ?>
    </div>
</div>

<!-- Controles del carrusel debajo -->
<div class="mi-button-container">
    <button id="miPrevBtn">Former</button>
    <button id="miNextBtn">Following</button>
</div>
<script>

    document.addEventListener('DOMContentLoaded', () => {
        const carouselInner = document.querySelector('.mi-carousel-inner');
        const items = document.querySelectorAll('.mi-carousel-item');
        const indicators = document.querySelectorAll('.mi-indicator');
        let currentIndex = 0;

        function nextSlide() {
            currentIndex = (currentIndex + 1) % items.length;
            updateCarousel();
        }

        document.getElementById('miNextBtn').addEventListener('click', nextSlide);

        document.getElementById('miPrevBtn').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            updateCarousel();
        });

        indicators.forEach(indicator => {
            indicator.addEventListener('click', () => {
                currentIndex = parseInt(indicator.dataset.index);
                updateCarousel();
            });
        });

        function updateCarousel() {
            const offset = -currentIndex * 100; // Cambia la posición
            carouselInner.style.transform = `translateX(${offset}%)`; // Corrige la sintaxis

            // Actualizar los puntos de indicación
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('mi-active-indicator', index === currentIndex);
            });
        }

        // Cambiar el carrusel automáticamente cada 3 segundos
        setInterval(nextSlide, 3000);
    });
</script>


</body>
</html>

