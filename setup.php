<?php
// config.php
$host = 'postgres.railway.internal';
$db = 'railway';
$user = 'postgres';
$pass = 'beetfACACadMkYHiNoymWxxrpaJAVrrv';
$port = '5432';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear tabla detalles_envio
    $sql_detalles_envio = "
    CREATE TABLE IF NOT EXISTS detalles_envio (
        id_envio SERIAL PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        nombres VARCHAR(100) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        telefono VARCHAR(20) NOT NULL,
        id VARCHAR(20) NOT NULL,
        pais VARCHAR(50) NOT NULL,
        ciudad VARCHAR(50) NOT NULL,
        direccion VARCHAR(150) NOT NULL,
        codigo_postal VARCHAR(10) NOT NULL,
        fecha_envio TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    );
    ";
    $pdo->exec($sql_detalles_envio);

    // Insertar datos en detalles_envio
    $insert_detalles_envio = "
    INSERT INTO detalles_envio (username, nombres, apellidos, telefono, id, pais, ciudad, direccion, codigo_postal)
    VALUES 
    ('mike4', 'Maicol', 'Piña', '3144083153', '123456789', 'Colombia', 'Soacha', 'Calle 26#36-40', '248308'),
    ('ivan', 'Maicol', 'Piña', '3144083153', '1000627628', 'Colombia', 'Soacha', 'Calle 26#36-40', '248308'),
    ('sofi', 'Maicol', 'Piña', '3144083153', '1000627628', 'Colombia', 'Soacha', 'Calle 26#36-40', '248308'),
    ('sofia', 'Maicol', 'Piña', '3144083153', '23456789', 'Colombia', 'Soacha', 'Calle 26#36-40', '248308')
    ON CONFLICT (id_envio) DO NOTHING;
    ";
    $pdo->exec($insert_detalles_envio);

    // Crear tabla productos
    $sql_productos = "
    CREATE TABLE IF NOT EXISTS productos (
        id_producto SERIAL PRIMARY KEY,
        nombre_producto VARCHAR(100) NOT NULL,
        descripcion_producto TEXT NOT NULL,
        precio_producto DECIMAL(10,2) NOT NULL,
        cantidad_producto INT NOT NULL,
        foto_producto VARCHAR(255) NOT NULL,
        fecha_agregado TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        categoria_producto VARCHAR(255) NOT NULL,
        es_oferta BOOLEAN DEFAULT FALSE,
        precio_oferta DECIMAL(10,2) DEFAULT NULL
    );
    ";
    $pdo->exec($sql_productos);

    // Insertar datos en productos
    $insert_productos = "
    INSERT INTO productos (nombre_producto, descripcion_producto, precio_producto, cantidad_producto, foto_producto, categoria_producto)
    VALUES 
    ('acordeon', 'dj', 678.00, 6, 'logo.jpg', 'botones'),
    ('acordeon putotoata', 'vbnm', 667.00, 76, 'logo1.png', 'fuelles'),
    ('dadads', 'dada', 878.00, 87, 'indeximg (4).jpeg', 'fuelles'),
    ('maletas', 'ghjkl', 678.00, 9678, 'indeximg14.jpg', 'accesorios'),
    ('dassE', 'dassss', 878.00, 87, 'logo.jpg', 'fuelles'),
    ('hola', 'dads', 8877.00, 86, 'index11.jpg', 'accesorios'),
    ('Sofia Herosa', 'ella es la mas linda', 99999999.99, 1, 'images.jpg', 'musica'),
    ('sale sale', 'dadas', 2232.00, 45, 'WhatsAppButton.png', 'accesorios')
    ON CONFLICT (id_producto) DO NOTHING;
    ";
    $pdo->exec($insert_productos);

    // Crear tabla usuarios
    $sql_usuarios = "
    CREATE TABLE IF NOT EXISTS usuarios (
        id SERIAL PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        full_name VARCHAR(100) NOT NULL,
        telefono VARCHAR(20) NOT NULL,
        tipo_documento VARCHAR(50) NOT NULL CHECK (tipo_documento IN ('Cedula','Tarjeta identidad','Pasaporte')),
        documento VARCHAR(50) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        rol VARCHAR(20) DEFAULT 'cliente'
    );
    ";
    $pdo->exec($sql_usuarios);

    // Insertar datos en usuarios
    $insert_usuarios = "
    INSERT INTO usuarios (username, email, password, full_name, telefono, tipo_documento, documento)
    VALUES 
    ('mikee', 'maicolpina8@gmail.com', '$2y$10$LoQskIACRuawUofJw.R7zuJvUcFpYrDFOOpcyV0gqiI533.SjJyq2', 'Maicol Piña', '3144083153', 'Cedula', '1000627628'),
    ('admin', 'admin@gmail.com', '123', 'Administrador', '123456789', 'Cedula', '000000000'),
    ('mike', 'maicol@gmail.com', '$2y$10$l33Dn/GYRorqYMgpjnCuXeri80v5tgVGrfyDYCQmT5E2UZVu8YeS6', 'Sofia Alejandra', '1234567890', 'Cedula', '2345678'),
    ('sofi', 'mike1@gmail.com', '$2y$10$avKqsxylFvINjnux/eyJHOtfRZM7CTU0a4d2Vts6podY6y9pslkIG', 'so', '1234567890', 'Cedula', '123456789'),
    ('adm', 'adm@gmail.com', '$2y$10$fue9.IrFHIr2VXMxxC0ph.VqJE0i33bQphFAvixqDEPV3w5zeJJAe', 'administrador', '1234567890', 'Cedula', '3456789'),
    ('sofia', 'sofia123@gmail.com', '$2y$10$hGf2lk3gLKNwAeSRClBYruN4n0loUh0q4XwQV9m1nxSO33wAJsp4C', 'Sofia Alejandra', '1234567890', 'Cedula', '12345678'),
    ('mike4', 'juanplopezh1@gmail.com', '$2y$10$xZB0M2udpMaF.SDOaOkGSOqvxYyyf4pwnSje8.RPg5SeHpZIMhFLS', '', '1234567890', 'Cedula', ''),
    ('ivan', 'uvan@gmail.com', '$2y$10$V.t2JSIAdoza7FZN8sutUuQ0y1nkkeuICpkIjcPzddYpjeaM85R6O', '', '1234567890', 'Cedula', '');
    ";
    $pdo->exec($insert_usuarios);

    echo "Tablas y datos creados exitosamente.";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
