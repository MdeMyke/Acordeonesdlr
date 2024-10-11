<?php
// config.php
$host = 'postgres.railway.internal';
$db = 'railway';
$user = 'postgres'; // Usuario de la base de datos
$pass = 'beetfACACadMkYHiNoymWxxrpaJAVrrv'; // Contraseña de la base de datos
$port = 5432; // Puerto

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>