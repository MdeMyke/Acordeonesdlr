<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // Redirigir al index tras cerrar sesión
exit();
?>
