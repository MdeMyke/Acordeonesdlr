<?php
// config.php (inclúyelo aquí si no está incluido ya)
$host = 'localhost';
$db = 'veterinariabd';
$user = 'root'; // Cambia a tu usuario
$pass = ''; // Cambia a tu contraseña

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Consulta para obtener los productos
    $stmt = $pdo->query("SELECT * FROM productos");
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Devuelve los productos en formato JSON
    echo json_encode($productos);
    
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
