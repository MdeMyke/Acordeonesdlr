<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Botón Circular Fijo</title>
    <style>
        .fixed-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25D366;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            padding: 0; /* Quitar el padding interno del botón */
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            transition: background-color 0.3s ease;
        }

        /* Ajusta el tamaño de la imagen para que ocupe todo el botón */
        .fixed-button img {
            width: 100%;
            height: 100%;
            border-radius: 50%; /* Asegura que la imagen sea redonda también */
            object-fit: cover; /* Asegura que la imagen se ajuste bien */
        }

        .fixed-button:hover {
            background-color: #128C7E;
        }
    </style>
</head>
<body>
    <button class="fixed-button" onclick="window.open('https://wa.me/14088166630?text=¡Hola!%20Tengo%20una%20pregunta%20de%20Accesrios%20para%20acordeones%20de%20la%20', '_blank')">
        <img src="../assets/img/WhatsAppButton.png" alt="WhatsApp">
    </button>
</body>
</html>
