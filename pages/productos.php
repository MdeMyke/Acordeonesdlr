
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <style>
:root {
    background: #fde6bc;
    font-family: system-ui;
    line-height: 1.45;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

section {
    padding: 5px 50px; /* 10px para arriba y abajo, 50px para izquierda y derecha */
    text-align: center;
    color: black;
    font-size: 1rem;
    margin-bottom: 0px;
    overflow: hidden;
}

#section7{
    margin-top: 10px;
    margin-bottom: 20px;

    /* Separación entre secciones */
}

#section8 {
    min-height: 40vh;
    background-color: #edc158; /* Cambiado el color de fondo */
}

#section10 {
    min-height: 40vh;
    background-color: #edc158; /* Cambiado el color de fondo */
}


/* Estilo general de la sección 1 */
#section1 {
    height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #fde6bc;
    padding: 20px;
    /* Añadir imagen de fondo */
    background-image: url('../assets/img/fondop (1).jpg'); /* Cambia por la ruta de tu imagen */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    /* Añadir borde inferior gris */
}

/* Contenedor que agrupa ambos contenidos */
.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    max-width: 1200px;
}

/* Contenido a la izquierda (Texto) */
.left-content {
    flex: 1;
    color: black;
}

.left-content h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.left-content p {
    font-size: 1.5rem;
    color: white;
    line-height: 1.8;
    margin-top: 1rem;
    margin-bottom: 1.5rem;
    margin-right: 1rem;
    text-align: justify;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    padding: 10px;
    background-color: #edc158;
    border-radius: 8px;
    animation: fadeIn 1s ease-in;
}

/* Animación suave de entrada */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Contenido a la derecha (Carrusel) */
.right-content {
    flex: 1;
    position: relative;
}


/* Estilo del carrusel */
.carousel {
    display: flex;
    overflow: hidden;
    width: 100%;
    max-width: 1000px;
    margin-top: 80px;

}

.carousel img {
    width: 100%;
    aspect-ratio: 16 / 9; /* Establece la relación de aspecto 16:9 */
    object-fit: cover; /* Asegura que la imagen cubra el contenedor sin distorsionarse */
    transition: transform 0.5s ease-in-out;
}


button.prev, button.next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
}

button.prev {
    left: 0;
}

button.next {
    right: 0;
}

/* Título con animación y sombra */
#section1 h1 {
    font-size: 3.5rem;
    color: white;
    position: relative;
    text-align: left;
    text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
    padding: 20px;
    margin-top: 130px;
    z-index: 1;
}

/* Animación de desvanecimiento hacia arriba */
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translate(-50%, 10%);
    }
    100% {
        opacity: 1;
        transform: translate(-50%, -50%);
    }
}



/* Estilos responsivos */
@media (max-width: 768px) {
    /* Ajustes de altura de la sección 1 */
    #section1 {
        flex-direction: column;
        padding: 20px;
        height: auto;
    }

    .container {
        flex-direction: column;
        text-align: center;
    }

    .left-content, .right-content {
        flex: unset;
        width: 100%;
        margin-bottom: 20px;
    }

    #section1 h1 {
        font-size: 2.5rem;
    }

    .left-content p {
        font-size: 1.2rem;
        padding: 8px;
    }

    .carousel {
        max-width: 6    00px;
    }

    /* Ajustes para mejorar el espacio entre las secciones en pantallas pequeñas */
    section {
        font-size: 1.5rem;
        padding: 20px;
    }

    #section2 h1 {
        font-size: 2.5rem;
    }
}

@media (min-width: 768px) and (max-width: 1024px) {
    #section1 {
        height: 90vh;
    }

    .left-content h1 {
        font-size: 2.8rem;
    }

    .left-content p {
        font-size: 1.4rem;
    }

    .carousel {
        max-width: 700px;
    }
}

        #section12 {
            min-height: 50vh;
            background-image: url('../assets/img/fondobu3.png');
            background-size: cover;
            background-position: center;
        }

        /* Estilos responsivos */
        @media (max-width: 768px) {
            .navbar-bottom a {
                padding: 6px 10px; /* Reducir aún más el tamaño de los botones */
            }
            section {
                font-size: 1.5rem;
                padding: 20px;
            }
            #section2 h1 {
                font-size: 2.5rem;
            }
        }

        sectiona {
            block-size: auto;
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            margin: 2rem auto 5rem;
            padding: 0 1rem;
            max-inline-size: 1200px; /* Limitar el ancho de la sección */
        }
        
        form {
            align-items: baseline;
            background: #fafafa;
            border: 1px solid #e0e0e0;
            border-radius: 0.25rem;
            color: #333;
            display: flex;
            gap: 1rem;
            margin-block-end: 1rem;
            justify-content: center;
            padding: 1rem;
            flex-wrap: wrap;
            max-inline-size: 600px; /* Limitar el tamaño del formulario */
        }

        form p {
            line-height: 1;
            margin: 0;
        }

        label,
        input {
            color: inherit;
            font-size: 1rem;
            line-height: 1;
            margin: 0;
            padding: 0;
        }

        input {
            block-size: 1rem;
            inline-size: 1rem;
            position: relative;
            inset-block-start: 0.125rem;
        }

        /* Responsive article cards */
        article {
            display: none;
            margin: 0;
            padding: 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 0.5rem;
            background-color: #fff;
            transition: all 0.3s ease;
            max-inline-size: 400px; /* Limitar el ancho de las tarjetas */
        }

        article img {
            aspect-ratio: 1/1; /* Forzar imágenes cuadradas */
            border-radius: 0.25rem;
            display: block;
            inline-size: 100%;
            object-fit: cover;
        }

        article h2 {
            color: #333;
            font-size: clamp(0.75rem, 9cqw, 1rem);
            font-weight: 300;
            letter-spacing: 0.1em;
            line-height: 1.1;
            margin: clamp(0.125rem, 2cqw, 0.375rem) 0;
        }

        article .price {
            font-size: 1rem;
            font-weight: bold;
            color: #555;
            margin-bottom: 0.75rem;
        }

        article .categories {
            border-radius: 0.25rem;
            display: inline-block;
            font-size: clamp(0.4rem, 5.5cqw, 0.625rem);
            letter-spacing: 0.15em;
            line-height: 1;
            margin: 0;
            padding: clamp(0.125rem, 2cqw, 0.25rem);
            font-variant: small-caps;
        }

        article .categories::after {
            content: attr(data-category);
        }

        /* Buttons responsive */
        article .actions {
            display: flex;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .view-button {
    background-color: #d35400; /* Cambiar al color principal */
    color: white;
    border: none;
    padding: 0.75rem 3rem; /* Aumentar el tamaño del botón */
    border-radius: 0.25rem;
    cursor: pointer;
    font-size: clamp(1rem, 4vw, 1.25rem); /* Aumentar el tamaño de la fuente */
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: background-color 0.3s;
}

.view-button:hover {
    background-color: #fde6bc;
}



        sectiona:has([name="botones"]:checked) article:has([data-category="botones"]) {
            display: block;
        }

        sectiona:has([name="accesorios"]:checked) article:has([data-category="accesorios"]) {
            display: block;
        }

        sectiona:has([name="fuelles"]:checked) article:has([data-category="fuelles"]) {
            display: block;
        }

        /* Responsividad avanzada */
        @media (max-width: 768px) {
            sectiona {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }

            form {
                flex-direction: column;
                gap: 0.5rem;
            }

            .buy-button {
                font-size: 0.85rem;
                padding: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            sectiona {
                grid-template-columns: 1fr;
            }

            .buy-button {
                font-size: 0.8rem;
                padding: 0.5rem;
            }
        }


        
    </style>
</head>
<body>
<nav>
<?php include '../includes/navbar.php'; ?>
</nav>


<?php include '../pages/botonfixed.php'; ?>

<section id="section1">
    <div class="container">
        <div class="left-content">
            <h1>All Our Products</h1>
            <p>Find the best accessories for accordions with the best quality on the market.</p>
        </div>
        <div class="right-content">
            <div class="carousel">
                <img src="../assets/img/fotosc (1).jpeg" alt="Imagen 1">
                <img src="../assets/img/fotosc (2).jpeg" alt="Imagen 2">
                <img src="../assets/img/fotosc (3).jpeg" alt="Imagen 3">
                <img src="../assets/img/fotosc (4).jpeg" alt="Imagen 4">
                <img src="../assets/img/fotosc (5).jpeg" alt="Imagen 5">
                <img src="../assets/img/fotosc (6).jpeg" alt="Imagen 6">
                <img src="../assets/img/fotosc (7).jpeg" alt="Imagen 7">
                <img src="../assets/img/fotosc (8).jpeg" alt="Imagen 8">
                <img src="../assets/img/fotosc (9).jpeg" alt="Imagen 9">
                <img src="../assets/img/fotosc (10).jpeg" alt="Imagen 10">
                <img src="../assets/img/fotosc (11).jpeg" alt="Imagen 11">
            </div>
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>
    </div>
</section>

<section id="section7">
<?php include '../pages/sale.php'; ?>

</section>

<section id="section8">
<?php include '../pages/cardsof.php'; ?>
</section>

<section id="section9">
<?php include '../pages/cards3.php'; ?>
</section>

<section id="section10">
<?php include '../pages/cardsmv.php'; ?>
</section>

<sectiona id="section11">
    <form>
        <p>Filter by category:</p>
        <label>
            <input type="checkbox" name="botones" checked>
            Buttons
        </label>
        <label>
            <input type="checkbox" name="accesorios" checked>
            Accessories
        </label>
        <label>
            <input type="checkbox" name="fuelles" checked>
            Fuelles
        </label>
    </form>

    <?php
    include '../config/config.php';

    try {
        // Consulta a la base de datos
        $sql = "SELECT * FROM productos";
        $stmt = $pdo->query($sql);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Generar las cards dinámicamente con la información de la base de datos
            echo '<article>';
            echo '<img src="../uploads/productos/' . $row['foto_producto'] . '" alt="' . htmlspecialchars($row['nombre_producto']) . '">';
            echo '<h2>' . htmlspecialchars($row['nombre_producto']) . '</h2>';
            echo '<p class="price">$' . number_format($row['precio_producto'], 2) . '</p>';
            echo '<p class="categories" data-category="' . htmlspecialchars($row['categoria_producto']) . '"></p>';
            echo '<div class="actions">';
            // Formulario para el botón de comprar
            echo '<form action="product.php" method="GET" style="display:inline;">'; // El formulario ahora solo envía el ID del producto
            echo '<input type="hidden" name="id" value="' . $row['id_producto'] . '">'; // Asegúrate que el nombre del campo sea "id"
            echo '<button type="submit" class="view-button">Watch me</button>'; // Botón de compra
            echo '</form>';
            echo '</div>';
            echo '</article>';
            
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</sectiona>

<section id="section12">
<?php include '../pages/contactanos.php'; ?>

</section>

<footer>
<?php include '../includes/footer.php'; ?>  
</footer>



    <script>
    const navbarLinks = document.querySelectorAll('.navbar-bottom a');

navbarLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        const targetId = this.getAttribute('href');

        // Verificar si el enlace comienza con '#'
        if (targetId.startsWith('#')) {
            e.preventDefault(); // Prevenir el comportamiento por defecto del enlace
            const targetSection = document.querySelector(targetId);
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth' }); // Desplazarse suavemente a la sección
            }
        }
        // Si no comienza con '#', no hacer nada especial y permitir la navegación normal
    });
});
    let slideIndex = 0;

function showSlides() {
    const slides = document.querySelectorAll('.carousel img');
    slides.forEach((slide, index) => {
        slide.style.transform = `translateX(${-slideIndex * 100}%)`;
    });
}

function moveSlide(n) {
    const slides = document.querySelectorAll('.carousel img');
    slideIndex = (slideIndex + n + slides.length) % slides.length;
    showSlides();
}

document.addEventListener('DOMContentLoaded', showSlides);

</script>

</body>
</html>




