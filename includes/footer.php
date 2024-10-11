<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <style>
        .mi-footer {
            background-color: #333;
            color: white;
            padding: 40px 20px;
            position: relative; /* Para posicionar el botón dentro del footer */
        }
        
        .mi-footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            max-width: 1200px;
            margin: 0 auto;
            flex-direction: row-reverse;
        }

        .mi-footer-section {
            flex: 1;
            min-width: 250px;
            margin-bottom: 20px;
            margin-left: 20px;
        }

        /* Estilos para las cards */
        .mi-card {
            background-color: #444; /* Color de fondo de la card */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra para efecto de elevación */
            border: 1px solid #555;
        }

        .mi-card h3 {
            margin-bottom: 15px;
        }

        .mi-card ul {
            list-style: none;
            padding: 0;
        }

        .mi-card ul li a {
            color: white;
            text-decoration: none;
        }

        .mi-card ul li a:hover {
            text-decoration: underline;
        }

        /* Estilos para el contenedor de derechos de autor */
        .mi-footer-copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #555;
        }

        /* Botones circulares */
        .mi-social-buttons {
            display: flex;
            justify-content: start;
            margin-top: 20px;
        }

        .mi-social-button {
            width: 50px;
            height: 50px;
            background-color: #555;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 10px;
            overflow: hidden; /* Oculta cualquier contenido que sobresalga */
            transition: background-color 0.3s ease;
        }

        .mi-social-button:hover {
            background-color: #777; /* Cambia el color al pasar el mouse */
        }

        .mi-social-button img {
            width: 100%; /* La imagen ocupa el 100% del botón */
            height: 100%; /* La imagen ocupa el 100% del botón */
            object-fit: cover; /* Mantiene la proporción de la imagen */
        }

        /* Estilos para el botón de subir */
        .scroll-to-top {
            width: 60px;
            height: 60px;
            background-color: #555;
            color: white;
            border-radius: 50%;
            position: absolute;
            top: -30px; /* Coloca el botón en la mitad superior del footer */
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        .scroll-to-top:hover {
            background-color: #777;
        }

        @media (max-width: 768px) {
            .mi-footer-content {
                flex-direction: column; /* Coloca las secciones en columna en pantallas pequeñas */
            }
        }
    </style>
</head>
<body>
<!-- Contenido de la página -->

<footer class="mi-footer">
    <!-- Botón de subir al inicio -->
    <div class="scroll-to-top" onclick="scrollToTop()">↑</div>

    <div class="mi-footer-content">
        <!-- Acerca de -->
        <div class="mi-footer-section">
            <div class="mi-card">
                <h3>About</h3>
                <ul>
                    <li><a href="#acerca">Objective with the client</a></li>
                    <li><a href="#mision">Nuestra misión y visión</a></li>
                    <li><a href="#privacidad">Who We Are</a></li>
                    <li><a href="#terminos">Privacy Policy</a></li>
                </ul>
            </div>
        </div>

        <!-- Servicios -->
        <div class="mi-footer-section">
            <div class="mi-card">
                <h3>Services</h3>
                <ul>
                    <li><a href="#productos">Products</a></li>
                    <li><a href="#equipo">Join our team</a></li>
                    <li><a href="#asociate">Partner with us</a></li>
                </ul>
            </div>
        </div>

        <!-- Información de contacto -->
        <div class="mi-footer-section">
            <h3>Contact us</h3>
            <p>Mail: acordeonesdlr@gmail.com</p>
            <p>Phone: +1 (408)816-6630</p>

            <!-- Botones circulares -->
            <div class="mi-social-buttons">
                <div class="mi-social-button">
                    <a href="https://www.facebook.com/profile.php?id=61566787599825" target="_blank">
                        <img src="assets/img/face.png" alt="Facebook">
                    </a>
                </div>
                <div class="mi-social-button">
                    <a href="https://www.instagram.com/accordionsdlr/" target="_blank">
                        <img src="assets/img/insta.png" alt="Instagram">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Derechos de autor -->
    <div class="mi-footer-copyright">
        <p>&copy; 2024 De La Rossa Accordion Accessories. All rights reserved.</p>
        <p>Made with 😏 by Michael Piña</p>
    </div>
</footer>

<script>
    // Función para desplazar al inicio de la página
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>
</body>
</html>
