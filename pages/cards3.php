<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Productos</title>
    <style>
        :root {
            --spacing-3: 1rem;
            --corner-radius-3: 0.40rem;
            --title-font-size-3: 2rem;
            --title-color-3: black;
            --title-margin-3: 0.3rem 0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Helvetica Neue", sans-serif;
        }

        .productos-title-v3 {
            text-align: start;
            font-size: var(--title-font-size-3);
            color: var(--title-color-3);
            margin: var(--title-margin-3);
            padding-left: 1rem;

        }

        .productos-container-v3 {
            display: flex;
            overflow-x: auto;
            padding: var(--spacing-3);
            gap: var(--spacing-3);
            scrollbar-width: none;
        }

        .productos-container-v3::-webkit-scrollbar {
            display: none;
        }

        .card-v3 {
            flex: 0 0 auto;
            width: 240px;
            background-color: white;
            border-radius: var(--corner-radius-3);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: var(--spacing-3);
            text-align: center;
            transition: transform 0.3s ease;
            opacity: 0;
            transform: translateX(400px);
        }

        .card-v3 img {
            width: 100%;
            height: auto;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: var(--corner-radius-3);
        }

        .card-v3:hover {
            transform: scale(1.05);
        }

        .card-v3 h2 {
            font-size: 1.5rem;
            color: black;
            margin-bottom: 10px;
        }

        .card-v3 p {
            font-size: 1rem;
            color: #555;
        }

        .arrow-v3 {
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

        .arrow-v3:hover {
            background-color: rgba(255, 255, 255, 1);
        }

        .left-arrow-v3 {
            left: 10px;
        }

        .right-arrow-v3 {
            right: 10px;
        }

        .buy-button3 {
    width: 100%; /* Hacer que el botón ocupe todo el ancho de la tarjeta */
    padding: 15px; /* Aumentar el padding para que el botón sea más grande */
    background-color: #d35400;
    color: white;
    border: none;
    border-radius: var(--radius);
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.buy-button3:hover {
    background-color: #d35400;
}
    </style>
</head>
<body>

<section id="section-alt3" style="position: relative;">
    <h1 class="productos-title-v3">Buttons</h1>
    <button class="arrow-v3 left-arrow-v3">&#9664;</button>
    <button class="arrow-v3 right-arrow-v3">&#9654;</button>
    <div class="productos-container-v3">
        <?php
        include '../config/config.php';

        try {
            // Modificamos la consulta para filtrar por la categoría "botones"
            $sql = "SELECT * FROM productos WHERE categoria_producto = 'botones'";
            $stmt = $pdo->query($sql);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="card-v3">';
                echo '<img src="../uploads/productos/' . $row['foto_producto'] . '" alt="' . $row['nombre_producto'] . '">';
                echo '<h2>' . $row['nombre_producto'] . '</h2>';
                echo '<p>Price: $' . $row['precio_producto'] . '</p>';
                echo '<p>Available quantity: ' . $row['cantidad_producto'] . '</p>';
                // Formulario para el botón de ver producto
                echo '<form action="product.php" method="GET">';
                echo '<input type="hidden" name="id" value="' . $row['id_producto'] . '">';
                echo '<button type="submit" class="buy-button3">Watch me</button>';
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

    const productosContainerV3 = document.querySelector('.productos-container-v3');
    const cardsV3 = productosContainerV3.querySelectorAll('.card-v3');
    
    gsap.utils.toArray(cardsV3).forEach((card, index) => {
        gsap.to(card, {
            duration: 1,
            opacity: 1,
            x: 0,
            ease: "elastic.out(1, 0.75)",
            delay: index * 0.1,
            scrollTrigger: {
                trigger: productosContainerV3,
                start: "top bottom",
                toggleActions: "play none none reverse"
            }
        });
    });

    const leftArrowV3 = document.querySelector('.left-arrow-v3');
    const rightArrowV3 = document.querySelector('.right-arrow-v3');

    leftArrowV3.addEventListener('click', () => {
        productosContainerV3.scrollBy({
            left: -300,
            behavior: 'smooth'
        });
    });

    rightArrowV3.addEventListener('click', () => {
        productosContainerV3.scrollBy({
            left: 300,
            behavior: 'smooth'
        });
    });
</script>
