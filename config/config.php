<?php
// config.php
$host = 'localhost';
$db = 'veterinariabd';
$user = 'root'; // Cambia a tu usuario
$pass = ''; // Cambia a tu contraseña

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>


