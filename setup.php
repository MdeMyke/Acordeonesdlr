<?php
require 'config/config.php'; // Asegúrate de que la ruta sea correcta

try {
    // Eliminar tablas si existen
    $pdo->exec("DROP TABLE IF EXISTS detalles_envio");
    $pdo->exec("DROP TABLE IF EXISTS productos");
    $pdo->exec("DROP TABLE IF EXISTS usuarios");

    echo "Tablas eliminadas con éxito.";
} catch (PDOException $e) {
    echo "Error al eliminar tablas: " . $e->getMessage();
}
?>
