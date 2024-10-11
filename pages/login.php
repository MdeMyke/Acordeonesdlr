<?php
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buscar el usuario por nombre de usuario
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Verificar si la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['rol'] = $user['rol'];

        // Redirigir según el rol del usuario
        if ($user['rol'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: ../pages/index.php");
        }
        exit();
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>
