<?php
// Incluir la conexión a la base de datos
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion_producto = $_POST['descripcion_producto'];
    $precio_producto = $_POST['precio_producto'];
    $cantidad_producto = $_POST['cantidad_producto'];
    $categoria = $_POST['categoria']; // Obtener la categoría seleccionada

    // Manejar la subida de la imagen
    $foto_producto = $_FILES['foto_producto']['name'];
    $temp_name = $_FILES['foto_producto']['tmp_name'];
    $folder = "../uploads/productos/" . $foto_producto;

    // Verificar si se ha marcado como oferta
    $es_oferta = isset($_POST['oferta']) ? 1 : 0; // 1 si es oferta, 0 si no
    $precio_oferta = $es_oferta ? $_POST['precio_oferta'] : null; // Obtener el precio de oferta si es una oferta

    if (move_uploaded_file($temp_name, $folder)) {
        try {
            // Insertar los datos en la base de datos
            $sql = "INSERT INTO productos (nombre_producto, descripcion_producto, precio_producto, cantidad_producto, foto_producto, categoria_producto, es_oferta, precio_oferta) 
                    VALUES (:nombre_producto, :descripcion_producto, :precio_producto, :cantidad_producto, :foto_producto, :categoria, :es_oferta, :precio_oferta)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nombre_producto', $nombre_producto);
            $stmt->bindParam(':descripcion_producto', $descripcion_producto);
            $stmt->bindParam(':precio_producto', $precio_producto);
            $stmt->bindParam(':cantidad_producto', $cantidad_producto);
            $stmt->bindParam(':foto_producto', $foto_producto);
            $stmt->bindParam(':categoria', $categoria); // Asociar la categoría al statement
            $stmt->bindParam(':es_oferta', $es_oferta); // Asociar si es oferta
            $stmt->bindParam(':precio_oferta', $precio_oferta); // Asociar el precio de oferta
            $stmt->execute();

            echo "<script>alert('Producto agregado con éxito.'); window.location.href = 'admin_dashboard.php';</script>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error al subir la imagen.";
    }
}
?>
