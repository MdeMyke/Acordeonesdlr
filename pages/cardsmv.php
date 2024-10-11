<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Productos Alternativos</title>
    <style>
        :root {
            --spacing-alt: 1rem;
            --radius-alt: 0.40rem;
            --product-title-font-size-alt: 2rem;
            --product-title-color-alt: #333;
            --product-title-margin-alt: 0.3rem 0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Arial", sans-serif;
        }

        .productos-title-alt {
            text-align: start;
            font-size: var(--product-title-font-size-alt);
            color: var(--product-title-color-alt);
            margin: var(--product-title-margin-alt);
            padding-left: 1rem;

        }

        .productos-container-alt {
            display: flex;
            overflow-x: auto;
            padding: var(--spacing-alt);
            gap: var(--spacing-alt);
            scrollbar-width: none;
        }

        .productos-container-alt::-webkit-scrollbar {
            display: none;
        }

        .card-alt {
            flex: 0 0 auto;
            width: 240px;
            background-color: #f9f9f9;
            border-radius: var(--radius-alt);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
            padding: var(--spacing-alt);
            text-align: center;
            transition: transform 0.4s ease;
            opacity: 0;
            transform: translateX(300px);
        }

        .card-alt img {
            width: 100%;
            height: auto;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: var(--radius-alt);
        }

        .card-alt:hover {
            transform: scale(1.08);
        }

        .card-alt h2 {
            font-size: 1.6rem;
            color: #444;
            margin-bottom: 12px;
        }

        .card-alt p {
            font-size: 0.95rem;
            color: #666;
        }

        .arrow-alt {
            cursor: pointer;
            background-color: rgba(230, 230, 230, 0.8);
            border: none;
            border-radius: 50%;
            padding: 12px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            transition: background-color 0.3s;
        }

        .arrow-alt:hover {
            background-color: rgba(255, 255, 255, 1);
        }

        .left-arrow-alt {
            left: 15px;
        }

        .right-arrow-alt {
            right: 15px;
        }

        .buy-button-mv {
    width: 100%; /* Hacer que el botón ocupe todo el ancho de la tarjeta */
    padding: 15px; /* Aumentar el padding para que el botón sea más grande */
    background-color: #d35400;
    color: white;
    border: none;
    border-radius: var(--radius);
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.buy-button-mv:hover {
    background-color: #d35400;
}
    </style>
</head>
<body>

<section id="section-alt2" style="position: relative;">
    <h1 class="productos-title-alt">Accessories</h1>
    <button class="arrow-alt left-arrow-alt">&#9664;</button>
    <button class="arrow-alt right-arrow-alt">&#9654;</button>
    <div class="productos-container-alt">
        <?php
        include '../config/config.php';

        try {
            $sql = "SELECT * FROM productos WHERE categoria_producto = 'Accesorios'";
            $stmt = $pdo->query($sql);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="card-alt">';
                echo '<img src="../uploads/productos/' . $row['foto_producto'] . '" alt="' . $row['nombre_producto'] . '">';
                echo '<h2>' . $row['nombre_producto'] . '</h2>';
                echo '<p>Price: $' . $row['precio_producto'] . '</p>';
                echo '<p>Available quantity: ' . $row['cantidad_producto'] . '</p>';
                // Formulario para el botón de comprar
                echo '<form action="product.php" method="GET">'; // El formulario ahora solo envía el ID del producto
                echo '<input type="hidden" name="id" value="' . $row['id_producto'] . '">'; // Asegúrate que el nombre del campo sea "id"
                echo '<button type="submit" class="buy-button-mv">Watch me</button>';
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

    const productosContainerAlt = document.querySelector('.productos-container-alt');
    const cardsAlt = productosContainerAlt.querySelectorAll('.card-alt');
    
    gsap.utils.toArray(cardsAlt).forEach((cardAlt, index) => {
        gsap.to(cardAlt, {
            duration: 1,
            opacity: 1,
            x: 0,
            ease: "elastic.out(1, 0.75)",
            delay: index * 0.1,
            scrollTrigger: {
                trigger: productosContainerAlt,
                start: "top bottom",
                toggleActions: "play none none reverse"
            }
        });
    });

    const leftArrowAlt = document.querySelector('.left-arrow-alt');
    const rightArrowAlt = document.querySelector('.right-arrow-alt');

    leftArrowAlt.addEventListener('click', () => {
        productosContainerAlt.scrollBy({
            left: -300,
            behavior: 'smooth'
        });
    });

    rightArrowAlt.addEventListener('click', () => {
        productosContainerAlt.scrollBy({
            left: 300,
            behavior: 'smooth'
        });
    });
</script>

</body>
</html>
