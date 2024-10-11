<?php
// config.php
$host = 'autorack.proxy.rlwy.net';
$db = 'railway'; // Asegúrate de que este es el nombre correcto de tu base de datos
$user = 'root'; // Cambia a tu usuario si es diferente
$pass = 'VLDnwyGOyGoxgPuPrPoRGwUTpfxBQjUT'; // Usa la contraseña proporcionada en tu URL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>