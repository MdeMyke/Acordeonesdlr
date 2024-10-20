<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav</title>
    <style>
        .navbar-top {
            display: flex;
            justify-content: space-between;
            background-color: transparent;
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            padding: 1rem;
            align-items: center;
            z-index: 9999;
        }
        .navbar-top img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
        }
        .navbar-right {
            display: flex;
            align-items: center;
        }
        .navbar-right a {
            color: black;
            text-decoration: none;
            padding: 8px 12px;
            text-align: center;
            margin-left: 10px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }
        .navbar-right a:hover {
            color: #fce7bc;
        }
        .login-button, .register-button, .home-button {
            background-color: #fce7bc;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .login-button:hover, .register-button:hover, .home-button:hover {
            background-color: #e5d6a7;
        }

        /* Mejor estilo para el saludo de bienvenida */
        .welcome-message {
            background-color: #fce7bc;
            padding: 8px 15px;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1.1rem;
            color: #333;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            margin-right: 10px;
        }

        /* Estilos para la barra de navegación inferior */
        .navbar-bottom {
            display: flex;
            overflow-x: auto;
            white-space: nowrap;
            background-color: transparent;
            position: absolute;
            width: 100%;
            top: 4rem;
            left: 0;
            padding: 1rem;
            align-items: center;
            z-index: 9999;
        }
        .navbar-bottom a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            text-align: center;
            margin-left: 10px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
            font-size: 26px;
        }
        .navbar-bottom a:hover {
            color: #fce7bc;
        }

        .solid-background {
            background-color: #edc158;
            transition: background-color 0.3s ease;
        }

        body {
            padding-top: 6rem;
        }

    </style>
</head>
<body>
<nav class="navbar-top">
    <div class="navbar-left">
        <img src="../assets/img/logo.jpg" alt="Logo">
    </div>
    <div class="navbar-right">
        <?php if (isset($_SESSION['username'])): ?>
            <span class="welcome-message">Hello again, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
            <a href="../includes/logout.php" class="home-button">Logout</a>
        <?php else: ?>
            <a href="../includes/loginandregister.php#login" class="login-button">Login</a>
            <a href="../includes/loginandregister.php#register" class="register-button">Register</a>
        <?php endif; ?>
    </div>
</nav>

<div class="navbar-bottom">
    <?php
    // Obtener el nombre del archivo actual
    $current_page = basename($_SERVER['PHP_SELF']);

    // Mostrar diferentes botones dependiendo de la página actual
    if ($current_page == "index.php") {
        echo '<a href="#section4">Who are we?</a>';
        echo '<a href="../pages/productos.php">Products</a>';
        echo '<a href="#section3">Offers</a>';
        echo '<a href="#section5">Contact us</a>';
    } elseif ($current_page == "productos.php") {
        echo '<a href="../pages/index.php">Home</a>';
        echo '<a href="#section7">Offers</a>';
        echo '<a href="#section11">Filter</a>';
        echo '<a href="#section12">Contact us</a>';
    } elseif ($current_page == "product.php") {
        echo '<a href="../pages/productos.php">&lt; Return</a>';
        echo '<a href="../pages/index.php">Home</a>';
    }
    ?>
</div>

<script>
    window.addEventListener('scroll', function() {
        var navbarTop = document.querySelector('.navbar-top');
        var navbarBottom = document.querySelector('.navbar-bottom');
        
        if (window.scrollY > 600) {
            navbarTop.classList.add('solid-background');
            navbarBottom.classList.add('solid-background');
        } else {
            navbarTop.classList.remove('solid-background');
            navbarBottom.classList.remove('solid-background');
        }
    });
</script>
</body>
</html>
