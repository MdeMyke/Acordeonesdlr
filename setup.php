<?php
require 'config/config.php'; // Asegúrate de que la ruta sea correcta

try {
    // Crear tablas
    $pdo->exec("CREATE TABLE IF NOT EXISTS detalles_envio (
        id INT AUTO_INCREMENT PRIMARY KEY,
        direccion VARCHAR(255) NOT NULL,
        ciudad VARCHAR(100) NOT NULL,
        codigo_postal VARCHAR(10) NOT NULL
    )");

    $pdo->exec("CREATE TABLE IF NOT EXISTS productos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        precio DECIMAL(10, 2) NOT NULL,
        stock INT NOT NULL
    )");

    $pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        contrasena VARCHAR(255) NOT NULL
    )");

    echo "Tablas creadas con éxito.<br>";

    // Inserciones en la tabla detalles_envio
    $pdo->exec("INSERT INTO detalles_envio (direccion, ciudad, codigo_postal) VALUES
        ('123 Calle Falsa', 'Ciudad Ejemplo', '12345'),
        ('456 Avenida Siempre Viva', 'Ciudad Ejemplo', '67890')");

    // Inserciones en la tabla productos
    $pdo->exec("INSERT INTO productos (nombre, precio, stock) VALUES
        ('Producto A', 19.99, 100),
        ('Producto B', 29.99, 200)");

    // Inserciones en la tabla usuarios
    $pdo->exec("INSERT INTO usuarios (nombre, email, contrasena) VALUES
        ('Usuario Uno', 'usuario1@example.com', 'password1'),
        ('Usuario Dos', 'usuario2@example.com', 'password2')");

    echo "Datos insertados con éxito.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
