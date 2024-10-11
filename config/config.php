<?php
// config.php
$host = 'autorack.proxy.rlwy.net';
$db = 'railway';
$user = 'root'; // Usuario de la base de datos
$pass = 'AVHnEBlzYBbXJLJUEflVlDNQSUeVIHSY'; // Contraseña de la base de datos
$port = 24239; // Puerto

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
