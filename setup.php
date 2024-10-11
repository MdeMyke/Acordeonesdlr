<?php
// setup.php

$host = 'autorack.proxy.rlwy.net';
$db = 'railway';
$user = 'root';
$pass = 'AVHnEBlzYBbXJLJUEflVlDNQSUeVIHSY';
$port = 24239;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear las tablas
    $sql = "
    CREATE TABLE IF NOT EXISTS `detalles_envio` (
        `id_envio` INT(11) NOT NULL AUTO_INCREMENT,
        `username` VARCHAR(50) NOT NULL,
        `nombres` VARCHAR(100) NOT NULL,
        `apellidos` VARCHAR(100) NOT NULL,
        `telefono` VARCHAR(20) NOT NULL,
        `id` VARCHAR(20) NOT NULL,
        `pais` VARCHAR(50) NOT NULL,
        `ciudad` VARCHAR(50) NOT NULL,
        `direccion` VARCHAR(150) NOT NULL,
        `codigo_postal` VARCHAR(10) NOT NULL,
        `fecha_envio` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
        PRIMARY KEY (`id_envio`),
        KEY `username` (`username`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

    CREATE TABLE IF NOT EXISTS `productos` (
        `id_producto` INT(11) NOT NULL AUTO_INCREMENT,
        `nombre_producto` VARCHAR(100) NOT NULL,
        `descripcion_producto` TEXT NOT NULL,
        `precio_producto` DECIMAL(10,2) NOT NULL,
        `cantidad_producto` INT(11) NOT NULL,
        `foto_producto` VARCHAR(255) NOT NULL,
        `fecha_agregado` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
        `categoria_producto` VARCHAR(255) NOT NULL,
        `es_oferta` TINYINT(1) DEFAULT 0,
        `precio_oferta` DECIMAL(10,2) DEFAULT NULL,
        PRIMARY KEY (`id_producto`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

    CREATE TABLE IF NOT EXISTS `usuarios` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `username` VARCHAR(50) NOT NULL UNIQUE,
        `email` VARCHAR(100) NOT NULL UNIQUE,
        `password` VARCHAR(255) NOT NULL,
        `telefono` VARCHAR(20) NOT NULL,
        `tipo_documento` ENUM('Cedula', 'Tarjeta identidad', 'Pasaporte') NOT NULL,
        `documento` VARCHAR(50) NOT NULL,
        `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
        `rol` ENUM('cliente', 'admin') DEFAULT 'cliente',
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";

    // Insertar datos
    $sql .= "
    INSERT INTO `detalles_envio` (`username`, `nombres`, `apellidos`, `telefono`, `id`, `pais`, `ciudad`, `direccion`, `codigo_postal`, `fecha_envio`) VALUES
    ('mike4', 'Maicol', 'Piña', '3144083153', '123456789', 'Colombia', 'Soacha', 'Calle 26#36-40', '248308', '2024-10-09 20:05:06'),
    ('ivan', 'Maicol', 'Piña', '3144083153', '1000627628', 'Colombia', 'Soacha', 'Calle 26#36-40', '248308', '2024-10-09 21:24:53'),
    ('sofi', 'Maicol', 'Piña', '3144083153', '1000627628', 'Colombia', 'Soacha', 'Calle 26#36-40', '248308', '2024-10-10 01:44:21'),
    ('sofia', 'Maicol', 'Piña', '3144083153', '23456789', 'Colombia', 'Soacha', 'Calle 26#36-40', '248308', '2024-10-11 06:52:54');

    INSERT INTO `productos` (`nombre_producto`, `descripcion_producto`, `precio_producto`, `cantidad_producto`, `foto_producto`, `fecha_agregado`, `categoria_producto`, `es_oferta`, `precio_oferta`) VALUES
    ('acordeon', 'dj', 678.00, 6, 'logo.jpg', '2024-10-04 14:32:33', 'botones', 0, NULL),
    ('acordeon putotoata', 'vbnm', 667.00, 76, 'logo1.png', '2024-10-04 14:33:57', 'fuelles', 0, NULL),
    ('dadads', 'dada', 878.00, 87, 'indeximg (4).jpeg', '2024-10-04 14:34:23', 'fuelles', 0, NULL),
    ('maletas', 'ghjkl', 678.00, 9678, 'indeximg14.jpg', '2024-10-04 14:34:49', 'accesorios', 0, NULL),
    ('dassE', 'dassss', 878.00, 87, 'logo.jpg', '2024-10-04 14:35:14', 'fuelles', 0, NULL),
    ('hola', 'dads', 8877.00, 86, 'index11.jpg', '2024-10-04 14:35:44', 'accesorios', 0, NULL),
    ('sale sale', 'dadas', 2232.00, 45, 'WhatsAppButton.png', '2024-10-10 20:55:36', 'accesorios', 1, 456.00);

    INSERT INTO `usuarios` (`username`, `email`, `password`, `telefono`, `tipo_documento`, `documento`, `created_at`, `rol`) VALUES
    ('mikee', 'maicolpina8@gmail.com', '$2y$10$LoQskIACRuawUofJw.R7zuJvUcFpYrDFOOpcyV0gqiI533.SjJyq2', '3144083153', 'Cedula', '1000627628', '2024-10-01 20:08:47', 'cliente'),
    ('admin', 'admin@gmail.com', '123', '123456789', 'Cedula', '000000000', '2024-10-01 20:15:45', 'admin'),
    ('mike', 'maicol@gmail.com', '$2y$10$l33Dn/GYRorqYMgpjnCuXeri80v5tgVGrfyDYCQmT5E2UZVu8YeS6', '1234567890', 'Cedula', '2345678', '2024-10-01 20:22:06', 'cliente'),
    ('sofi', 'mike1@gmail.com', '$2y$10$avKqsxylFvINjnux/eyJHOtfRZM7CTU0a4d2Vts6podY6y9pslkIG', '1234567890', 'Cedula', '123456789', '2024-10-01 20:24:00', 'cliente'),
    ('adm', 'adm@gmail.com', '$2y$10$fue9.IrFHIr2VXMxxC0ph.VqJE0i33bQphFAvixqDEPV3w5zeJJAe', '1234567890', 'Cedula', '3456789', '2024-10-01 20:30:13', 'admin'),
    ('sofia', 'sofia123@gmail.com', '$2y$10$hGf2lk3gLKNwAeSRClBYruN4n0loUh0q4XwQV9m1nxSO33wAJsp4C', '1234567890', 'Cedula', '12345678', '2024-10-05 21:00:00', 'admin'),
    ('mike4', 'juanplopezh1@gmail.com', '$2y$10$xZB0M2udpMaF.SDOaOkGSOqvxYyyf4pwnSje8.RPg5SeHpZIMhFLS', '1234567890', 'Cedula', '', '2024-10-08 15:28:21', 'cliente'),
    ('ivan', 'uvan@gmail.com', '$2y$10$V.t2JSIAdoza7FZN8sutUuQ0y1nkkeuICpkIjcPzddYpjeaM85R6O', '1234567890', 'Cedula', '', '2024-10-08 21:39:59', 'cliente');
    ";

    // Ejecutar las consultas
    $pdo->exec($sql);
    echo "Base de datos y tablas creadas exitosamente.";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
