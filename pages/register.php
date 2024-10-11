<?php
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $telefono = $_POST['telefono'];

    // Verificar si las contraseñas coinciden
    if ($password !== $confirm_password) {
        echo "Error: Las contraseñas no coinciden.";
        exit;
    }

    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // El rol será siempre 'cliente' por defecto
    $rol = 'cliente';

    // Insertar los datos del nuevo usuario en la base de datos
    $stmt = $pdo->prepare('INSERT INTO usuarios (username, email, password, telefono, rol) 
                           VALUES (?, ?, ?, ?, ?)');
    
    try {
        $stmt->execute([$username, $email, $hashed_password, $telefono, $rol]);
        echo "Registro exitoso. ¡Ahora puedes iniciar sesión!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
