<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/stylenav.css">
    <title>Principal Page</title>
    <style>
        /* Estilos para la primera barra de navegación (logo, inicio, login, register) */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        
        /* Estilos para las secciones */
        section {
            padding: 15px 45px;
            text-align: center;
            color: black;
            margin-bottom: 30px; /* Separación entre secciones */
            overflow: hidden; /* Evitar que el texto se salga de la sección */
        }

        /* Sección cuadrada con imagen de fondo */
        #section1 {
            height: 150vh;
            background-image: url('../assets/img/indeximg22.png');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        /* Estilo para el título con animación y sombra */
        #section1 h1 {
            font-size: 4rem;
            color: white;
            position: absolute;
            top: 58%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            animation: fadeInUp 2s ease-in-out forwards;
            text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.7); /* Sombra al texto */
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

        /* Para pantallas pequeñas, ajustar la altura proporcionalmente */
        @media (max-width: 768px) {
            #section1 {
                height: 80vh;
            }

            #section1 h1 {
                font-size: 2.6rem;
                top:70%;
            }
        }

        /* Secciones rectangulares con color personalizado */
        #section2 {
            min-height: 50vh;
            background-color: #fde6bc;
        }

        #section2 h1 {
    font-size: 2.5rem; /* Tamaño más grande para el título */
    margin-bottom: 20px; /* Separación con el texto */
    color: #B85C38; /* Color atractivo para resaltar el título */
    text-transform: uppercase; /* Hacer el título en mayúsculas */
    letter-spacing: 2px; /* Espacio entre letras */
    position: relative;
    z-index: 2;
    opacity: 0;
    animation: fadeInSlide 1.5s forwards ease-in-out; /* Animación de deslizamiento al aparecer */
}

        #section3 {
            min-height: 30vh;
            background-image: url('../assets/img/fondobu2.png');
            background-size: cover;
            background-position: center;
        }

        #section3 h1 {
    font-size: 2.5rem; /* Tamaño más grande para el título */
    margin-bottom: 20px; /* Separación con el texto */
    color: #B85C38; /* Color atractivo para resaltar el título */
    text-transform: uppercase; /* Hacer el título en mayúsculas */
    letter-spacing: 2px; /* Espacio entre letras */
    position: relative;
    z-index: 2;
    opacity: 0;
    animation: fadeInSlide 1.5s forwards ease-in-out; /* Animación de deslizamiento al aparecer */
    background-color: wheat;
    border-radius: 20px;
}

        #section4 {
            min-height: 50vh;
            background-color: #fce7bc;
        }

        #section5 {
            min-height: 50vh;
            background-image: url('../assets/img/fondorebu.png');
            background-size: cover;
            background-position: center;
        }

        /* Mejorar el estilo de la sección 4 */
#section4 {
    min-height: 60vh;
    background: linear-gradient(135deg, #fce7bc, #fde6bc); /* Fondo con gradiente suave */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 50px 20px; /* Espaciado mayor para darle respiro al contenido */
    color: #333; /* Color de texto más oscuro para mejor contraste */
    text-align: center;
    font-family: 'Roboto', sans-serif; /* Fuente moderna y legible */
    position: relative;
    overflow: hidden;
}

#section4 h1 {
    font-size: 2.5rem; /* Tamaño más grande para el título */
    margin-bottom: 20px; /* Separación con el texto */
    color: #B85C38; /* Color atractivo para resaltar el título */
    text-transform: uppercase; /* Hacer el título en mayúsculas */
    letter-spacing: 2px; /* Espacio entre letras */
    position: relative;
    z-index: 2;
    opacity: 0;
    animation: fadeInSlide 1.5s forwards ease-in-out; /* Animación de deslizamiento al aparecer */
}

#section4 p {
    font-size: 1.2rem; /* Tamaño de fuente más legible */
    line-height: 1.8; /* Altura de línea para mejorar la legibilidad */
    max-width: 800px; /* Limitar el ancho del texto para que sea más fácil de leer */
    margin: 0 auto; /* Centrar el texto */
    background: rgba(255, 255, 255, 0.7); /* Fondo blanco translúcido para destacar el texto */
    padding: 20px; /* Espaciado interno */
    border-radius: 10px; /* Bordes redondeados */
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1); /* Sombra suave alrededor del contenedor */
    position: relative;
    z-index: 2;
    opacity: 0;
    animation: fadeInSlide 2s forwards ease-in-out 0.5s; /* Aparece con retraso después del título */
}

/* Agregar un elemento decorativo */
#section4::before {
    content: '';
    position: absolute;
    top: -20px;
    left: -20px;
    width: 300px;
    height: 300px;
    background: rgba(255, 255, 255, 0.2); /* Fondo decorativo translúcido */
    border-radius: 50%;
    z-index: 1;
}

#section4::after {
    content: '';
    position: absolute;
    bottom: -30px;
    right: -30px;
    width: 250px;
    height: 250px;
    background: rgba(255, 255, 255, 0.2); /* Fondo decorativo translúcido */
    border-radius: 50%;
    z-index: 1;
}

/* Estilos para la nueva sección de Misión y Visión */
#section6 {
    min-height: 60vh;
    background: linear-gradient(135deg, #fde6bc, #fce7bc); /* Fondo con gradiente invertido */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 50px 20px;
    color: #333;
    text-align: center;
    font-family: 'Roboto', sans-serif;
    position: relative;
    overflow: hidden;
}

#section6 h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #B85C38;
    text-transform: uppercase;
    letter-spacing: 2px;
    position: relative;
    z-index: 2;
    opacity: 0;
    animation: fadeInSlide 1.5s forwards ease-in-out;
}

#section6 p {
    font-size: 1.2rem;
    line-height: 1.8;
    max-width: 800px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.7);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    position: relative;
    z-index: 2;
    opacity: 0;
    animation: fadeInSlide 2s forwards ease-in-out 0.5s;
}

/* Elementos decorativos */
#section6::before, #section6::after {
    content: '';
    position: absolute;
    border-radius: 50%;
    z-index: 1;
}

#section6::before {
    top: -20px;
    left: -20px;
    width: 300px;
    height: 300px;
    background: rgba(255, 255, 255, 0.2);
}

#section6::after {
    bottom: -30px;
    right: -30px;
    width: 250px;
    height: 250px;
    background: rgba(255, 255, 255, 0.2);
}

/* Responsivo */
@media (max-width: 768px) {
    #section6 {
        padding: 30px 15px;
    }

    #section6 h1 {
        font-size: 2rem;
    }

    #section6 p {
        font-size: 1rem;
    }
}

/* Animación suave para la aparición de los elementos */
@keyframes fadeInSlide {
    0% {
        opacity: 0;
        transform: translateY(20px); /* Comienza un poco desplazado hacia abajo */
    }
    100% {
        opacity: 1;
        transform: translateY(0); /* Termina en su posición original */
    }
}

/* Estilos responsivos para dispositivos móviles */
@media (max-width: 768px) {
    #section4 {
        padding: 30px 15px; /* Reducir el relleno para pantallas pequeñas */
    }

    #section4 h1 {
        font-size: 2rem; /* Reducir el tamaño del título */
    }

    #section4 p {
        font-size: 1rem; /* Reducir el tamaño del texto */
    }
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
    </style>
</head>
<body>
<?php include '../includes/navbar.php'; ?>
<div>
<?php include '../pages/botonfixed.php'; ?>
</div>


    <section id="section1">      
        <h1>Accessories For Accordions De La Rossa</h1>
    </section>
<section id="section2">
    <?php include '../pages/cards.php'; ?>
    </section>
    <section id="section3">
    <?php include '../pages/twocards.php'; ?>
    </section>

    <section id="section4">
        <h1>Who are we?</h1>
        <p> At Accesorios Para Acordeones De La Rosa, we specialize in providing a wide range of high-quality accessories for accordions, both nationally and internationally. Our commitment is to deliver products that enhance musicians' experiences and improve their sound quality. With years of experience in the industry, our passionate team works tirelessly to provide the best for our customers.</p>
    </section>


    <section id="section5">
    <?php include '../pages/contactanos.php'; ?>
    </section>

    <section id="section6">
    <h1>Our Mission and Vision</h1>
    <p>
        <strong>Mission:</strong> Our mission is to be the leading supplier of accordion accessories, offering innovative and quality products that meet our customers' needs. We aim to contribute to the growth and development of music, supporting musicians with products that enhance their talent.
    </p>
    <p>
        <strong>Vision:</strong> Our vision is to expand our global presence, becoming the preferred brand of accordion accessories worldwide. We aspire to be recognized for our quality, innovation, and exceptional customer service, helping musicians reach their fullest potential.
    </p>
</section>


    <footer >
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

</script>

</body>
</html>

    