<?php
// setup.php
require 'config/config.php';

try {
    // Iniciar la transacción
    $pdo->beginTransaction();

    // Crear tabla detalles_envio
    $sql_detalles_envio = "
    CREATE TABLE IF NOT EXISTS detalles_envio (
        id_envio INT(11) NOT NULL AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL,
        nombres VARCHAR(100) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        telefono VARCHAR(20) NOT NULL,
        id VARCHAR(20) NOT NULL,
        pais VARCHAR(50) NOT NULL,
        ciudad VARCHAR(50) NOT NULL,
        direccion VARCHAR(150) NOT NULL,
        codigo_postal VARCHAR(10) NOT NULL,
        fecha_envio TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
        PRIMARY KEY (id_envio),
        KEY username (username)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";

    $pdo->exec($sql_detalles_envio);

    // Crear tabla productos
    $sql_productos = "
    CREATE TABLE IF NOT EXISTS productos (
        id_producto INT(11) NOT NULL AUTO_INCREMENT,
        nombre_producto VARCHAR(100) NOT NULL,
        descripcion_producto TEXT NOT NULL,
        precio_producto DECIMAL(10,2) NOT NULL,
        cantidad_producto INT(11) NOT NULL,
        foto_producto VARCHAR(255) NOT NULL,
        fecha_agregado TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
        categoria_producto VARCHAR(255) NOT NULL,
        es_oferta TINYINT(1) DEFAULT 0,
        precio_oferta DECIMAL(10,2) DEFAULT NULL,
        PRIMARY KEY (id_producto)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";

    $pdo->exec($sql_productos);

    // Crear tabla usuarios
    $sql_usuarios = "
    CREATE TABLE IF NOT EXISTS usuarios (
        id INT(11) NOT NULL AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        telefono VARCHAR(20) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
        rol ENUM('cliente','admin') DEFAULT 'cliente',
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";

    $pdo->exec($sql_usuarios);

    // Confirmar la transacción
    $pdo->commit();
    echo "Tablas creadas correctamente.";
} catch (Exception $e) {
    // Si hay un error, revertir la transacción
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
