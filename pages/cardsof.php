<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Productos</title>
    <style>
        :root {
            --space: 1rem; /* Ajuste del padding */
            --radius: 0.40rem;
            --product-title-font-size: 2rem;
            --product-title-color: black;
            --product-title-margin: 0.3rem 0; /* Ajuste de margin del título */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Helvetica Neue", sans-serif;
        }

        .productos-title {
            text-align: start;
            font-size: var(--product-title-font-size);
            color: var(--product-title-color);
            margin: var(--product-title-margin); /* Reduce el espacio del título */
            padding-left: 1rem;
        }

        .productos-container {
            display: flex;
            overflow-x: auto;
            padding: var(--space); /* Reduce el padding general */
            gap: var(--space); /* Mantiene el espacio entre productos */
            scrollbar-width: none;
        }

        .productos-container::-webkit-scrollbar {
            display: none;
        }

        .card {
            flex: 0 0 auto;
            width: 240px;
            background-color: white;
            border-radius: var(--radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem; /* Reducido el padding interno */
            text-align: center;
            transition: transform 0.3s ease;
            opacity: 0;
            transform: translateX(400px);
        }

        .card img {
            width: 100%;
            height: auto;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: var(--radius);
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card h2 {
            font-size: 1.5rem;
            color: black;
            margin-bottom: 5px;
        }

        .card p {
            font-size: 1rem;
            color: #555;
        }

        .arrow {
            cursor: pointer;
            background-color: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 50%;
            padding: 10px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            transition: background-color 0.3s;
        }

        .arrow:hover {
            background-color: rgba(255, 255, 255, 1);
        }

        .left-arrow {
            left: 10px;
        }

        .right-arrow {
            right: 10px;
        }

        .buy-button-of {
    width: 100%; /* Hacer que el botón ocupe todo el ancho de la tarjeta */
    padding: 15px; /* Aumentar el padding para que el botón sea más grande */
    background-color: #d35400;
    color: white;
    border: none;
    border-radius: var(--radius);
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.buy-button-of:hover {
    background-color: #d35400;
}
        
    </style>
</head>
<body>

<section id="section-alt1" style="position: relative;">
    <h1 class="productos-title">Fuelles</h1>
    <button class="arrow left-arrow">&#9664;</button>
    <button class="arrow right-arrow">&#9654;</button>
    <div class="productos-container">
        <?php
        include '../config/config.php';

        try {
            $sql = "SELECT * FROM productos WHERE categoria_producto = 'Fuelles'";
            $stmt = $pdo->query($sql);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="card">';
                echo '<img src="../uploads/productos/' . $row['foto_producto'] . '" alt="' . $row['nombre_producto'] . '">';
                echo '<h2>' . $row['nombre_producto'] . '</h2>';
                echo '<p>Price: $' . $row['precio_producto'] . '</p>';
                echo '<p>Available quantity: ' . $row['cantidad_producto'] . '</p>';

                // Formulario para el botón de comprar
                echo '<form action="product.php" method="GET">'; // El formulario ahora solo envía el ID del producto
                echo '<input type="hidden" name="id" value="' . $row['id_producto'] . '">'; // Asegúrate que el nombre del campo sea "id"
                echo '<button type="submit" class="buy-button-of">Watch me</button>';
                echo '</form>';
                
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js"></script>
<script>
    gsap.registerPlugin(ScrollTrigger);

    const productosContainer = document.querySelector('.productos-container');
    const cards = productosContainer.querySelectorAll('.card');
    
    gsap.utils.toArray(cards).forEach((card, index) => {
        gsap.to(card, {
            duration: 1,
            opacity: 1,
            x: 0,
            ease: "elastic.out(1, 0.75)",
            delay: index * 0.1,
            scrollTrigger: {
                trigger: productosContainer,
                start: "top bottom",
                toggleActions: "play none none reverse"
            }
        });
    });

    const leftArrow = document.querySelector('.left-arrow');
    const rightArrow = document.querySelector('.right-arrow');

    leftArrow.addEventListener('click', () => {
        productosContainer.scrollBy({
            left: -300,
            behavior: 'smooth'
        });
    });

    rightArrow.addEventListener('click', () => {
        productosContainer.scrollBy({
            left: 300,
            behavior: 'smooth'
        });
    });
</script>

</body>
</html>
