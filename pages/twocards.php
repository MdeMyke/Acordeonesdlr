<?php
// ofertas.php

// Incluir el archivo de configuración para la conexión a la base de datos
include 'config/config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertas</title>
    <link rel="stylesheet" href="styles.css"> <!-- Asegúrate de que este archivo CSS esté disponible -->
    <style>
        body {
            margin: 0; /* Eliminar márgenes del cuerpo */
            font-family: Arial, sans-serif; /* Fuente por defecto */
        }

        .ofertas-container {
            display: flex; /* Mostrar tarjetas en línea */
            overflow: hidden; /* Ocultar el desbordamiento */
            scroll-behavior: smooth; /* Desplazamiento suave */
            width: 100%; /* Ancho completo */
            justify-content: center; /* Centrar las tarjetas */
            position: relative; /* Necesario para el posicionamiento absoluto */
            transition: transform 0.5s ease; /* Transición suave al cambiar tarjetas */
        }

        .card1 {
            display: flex; /* Para colocar la imagen y el contenido uno al lado del otro */
            background-color: #fff; /* Fondo blanco para las tarjetas */
            border-radius: 12px; /* Bordes redondeados */
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2); /* Sombra */
            margin: 10px; /* Separación entre tarjetas */
            width: 90%; /* Ajusta el ancho de la tarjeta */
            max-width: 900px; /* Ancho máximo para evitar tarjetas demasiado grandes */
            transition: transform 0.3s ease; /* Transición suave al cambiar la posición de la tarjeta */
        }

        .card1 img {
            width: 400px; /* Establecer ancho fijo para la imagen */
            height: 400px; /* Establecer altura fija para hacerla cuadrada */
            object-fit: cover; /* Mantener las proporciones y cubrir el área */
            border-top-left-radius: 12px; /* Bordes redondeados en la parte superior */
            border-bottom-left-radius: 12px; /* Bordes redondeados en la parte inferior */
        }

        .card1-content {
            padding: 20px; /* Espacio interno */
            display: flex;
            flex-direction: column; /* Contenido apilado verticalmente */
            justify-content: center; /* Centrar verticalmente */
            width: 60%; /* Contenido ocupa el 60% del ancho de la tarjeta */
        }

        .card1-content h2 {
            font-size: 1.8rem; /* Tamaño de fuente para el nombre del producto */
            margin-bottom: 10px; /* Separación inferior */
        }

        .card1-content p {
            margin-bottom: 10px; /* Separación inferior */
        }

        .buy-button, .view-button {
    background-color: #d35400; /* Color de fondo para los botones */
    border: none; /* Sin borde */
    border-radius: 5px; /* Bordes redondeados */
    padding: 10px; /* Espacio interno */
    cursor: pointer; /* Cambiar cursor al pasar sobre el botón */
    font-weight: bold; /* Texto en negrita */
    margin-top: 5px; /* Separación superior entre botones */
    color: white; /* Color de texto blanco */
    text-decoration: none; /* Sin subrayado */
}

.buy-button:hover, .view-button:hover {
    background-color: #e5d6a7; /* Color al pasar el ratón sobre los botones */
}

        .controls {
            display: flex;
            justify-content: center; /* Centrar controles */
            margin: 10px 0; /* Margen vertical */
        }

        .control-button {
            background-color: #fce7bc; /* Color de fondo para los botones */
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados */
            padding: 10px; /* Espacio interno */
            cursor: pointer; /* Cambiar cursor al pasar sobre el botón */
            font-weight: bold; /* Texto en negrita */
            margin: 0 5px; /* Separación entre botones */
        }

        .dots-container {
            display: flex; /* Mostrar puntos en línea */
            justify-content: center; /* Centrar los puntos */
            margin-top: 10px; /* Margen superior */
        }

        .dot {
            height: 10px; /* Altura de cada punto */
            width: 10px; /* Ancho de cada punto */
            margin: 0 5px; /* Espacio entre puntos */
            border-radius: 50%; /* Hacer los puntos redondos */
            background-color: #ccc; /* Color gris para puntos inactivos */
            cursor: pointer; /* Cambiar cursor al pasar sobre los puntos */
        }

        .dot.active {
            background-color: #fca311; /* Color para el punto activo */
        }

        /* Consultas de medios para responsividad */
        @media (max-width: 900px) {
            .ofertas-container {
                flex-direction: column; /* Cambiar la dirección a columna en pantallas más pequeñas */
                align-items: center; /* Alinear tarjetas al centro */
            }

            .card1 {
                width: 100%; /* Ancho completo para tarjetas */
                max-width: 90%; /* Max ancho para no ser demasiado grandes */
            }

            .card1 img {
                width: 100%; /* Hacer la imagen responsiva */
                height: auto; /* Ajustar altura automáticamente */
            }
        }

        @media (max-width: 1000px) {
            .card1 {
                flex-direction: column; /* Cambiar la dirección a columna para que el contenido esté debajo de la imagen */
                width: 90%; /* Ancho del 90% */
            }

            .card1 img {
                height: 200px; /* Altura fija para imagen en pantallas pequeñas */
            }

            .card1-content {
                width: 100%; /* Hacer que el contenido ocupe el ancho completo */
                padding: 10px; /* Reducir el espaciado */
            }

            .card1-content h2 {
                font-size: 1.5rem; /* Tamaño de fuente más pequeño para títulos */
            }

            .card1-content p {
                font-size: 0.9rem; /* Tamaño de fuente más pequeño para descripciones */
            }

            .buy-button, .view-button, .control-button {
                padding: 8px; /* Espacio interno reducido */
                font-size: 0.9rem; /* Tamaño de fuente más pequeño para botones */
            }
        }
    </style>
</head>
<body>
<section id="section" style="position: relative;">
    <h1 class="productos-title">Best sellers!</h1>
    <div class="ofertas-container" id="ofertas-container">
        <?php
        try {
            $sql = "SELECT * FROM productos"; // Puedes ajustar la consulta para obtener solo las ofertas
            $stmt = $pdo->query($sql);
            $cards = []; // Arreglo para almacenar las tarjetas

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cards[] = '<div class="card1">
                                <img src="uploads/productos/' . $row['foto_producto'] . '" alt="' . $row['nombre_producto'] . '">
                                <div class="card1-content">
                                    <h2>' . $row['nombre_producto'] . '</h2>
                                    <p>' . $row['descripcion_producto'] . '</p>
                                    <p>Precio: $' . $row['precio_producto'] . '</p>
                                    <a href="product.php?id=' . $row['id_producto'] . '" class="view-button">Watch me</a> 
                                </div>
                            </div>'; // cierra card
            }

            // Imprimir las tarjetas (por ejemplo, las dos primeras)
            echo $cards[0];
            echo $cards[1]; // Asegúrate de que hay al menos dos tarjetas

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>
    <div class="controls">
        <button class="control-button" onclick="previousCard()">Former</button>
        <button class="control-button" onclick="nextCard()">Following</button>
    </div>
    <div class="dots-container" id="dots-container">
        <?php
        // Generar puntos para cada tarjeta
        for ($i = 0; $i < count($cards); $i++) {
            echo '<div class="dot" onclick="showCard(' . $i . ')"></div>';
        }
        ?>
    </div>
</section>

    <script>
    let currentIndex = 0; // Índice actual de la tarjeta visible
const cards1 = <?php echo json_encode($cards); ?>; // Convertir el arreglo de tarjetas a JavaScript

function showCard(index) {
    const container = document.getElementById('ofertas-container');
    container.innerHTML = cards1[index] + cards1[index + 1]; // Cambiar el contenido del contenedor a las tarjetas actuales
    updateDots(index); // Actualizar los puntos según el índice actual
}

function nextCard() {
    if (currentIndex < cards1.length - 2) {
        currentIndex++;
    } else {
        currentIndex = 0; // Volver al inicio si se llega al final
    }
    showCard(currentIndex);
}

function previousCard() {
    if (currentIndex > 0) {
        currentIndex--;
    } else {
        currentIndex = cards1.length - 2; // Volver al final si se llega al inicio
    }
    showCard(currentIndex);
}

// Cambiar automáticamente las tarjetas cada 3 segundos (3000 ms)
setInterval(nextCard, 3000);

function updateDots(index) {
    const dots = document.querySelectorAll('.dot'); // Obtener todos los puntos
    dots.forEach((dot, i) => {
        dot.classList.remove('active'); // Remover clase activa de todos
        if (i === index) {
            dot.classList.add('active'); // Agregar clase activa solo al punto correspondiente
        }
    });
}

// Inicializar puntos al cargar la página
updateDots(currentIndex);
</script>
</body>
</html>



