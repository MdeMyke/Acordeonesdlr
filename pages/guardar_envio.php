<?php
// Incluye el archivo de configuración para la conexión a la base de datos
include('../config/config.php');

// Verificar si los datos del formulario han sido enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $id = $_POST['id'];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $codigo_postal = $_POST['codigo_postal'];
    $product_id = $_POST['product_id'];

    // Iniciar la sesión para obtener el nombre de usuario
    session_start();
    $username = $_SESSION['username']; // Asegúrate de que la sesión contiene el nombre de usuario

    try {
        // Preparar la consulta SQL para insertar los datos
        $sql = "INSERT INTO detalles_envio (username, nombres, apellidos, telefono, id, pais, ciudad, direccion, codigo_postal) 
                VALUES (:username, :nombres, :apellidos, :telefono, :id, :pais, :ciudad, :direccion, :codigo_postal)";
        $stmt = $pdo->prepare($sql);

        // Ejecutar la consulta con los datos del formulario
        $stmt->execute([
            ':username' => $username,
            ':nombres' => $nombres,
            ':apellidos' => $apellidos,
            ':telefono' => $telefono,
            ':id' => $id,
            ':pais' => $pais,
            ':ciudad' => $ciudad,
            ':direccion' => $direccion,
            ':codigo_postal' => $codigo_postal
        ]);

        // Redirigir automáticamente a la página del producto
        header("Location: ../pages/product.php?id=" . $product_id); 
        exit(); // Importante para detener la ejecución del script
    } catch (PDOException $e) {
        echo "Error al guardar los datos: " . $e->getMessage();
    }
}
?>
