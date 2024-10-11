<?php
include '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LLL</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato:700);
        html, body {
            background: #fafafa;
            font-family: 'Lato', sans-serif;
            height: 100%;
            width: 100%;
            margin: 0;
        }

        body {
            line-height: 200%;
            background: #fafafa;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 32px;
            color: #333;
        }

        h2 {
            font-size: 21px;
            color: #333;
        }

        .openBtn {
            background-color: #fca311;
            border: none;
            border-radius: 5px;
            padding: 12px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            font-size: 1.2rem;
            margin-bottom: 10px;
            text-decoration: none;
            color: #fff;
        }

        .openBtn:hover {
            background-color: #e5a300;
        }

        a.openBtn {
            color: inherit;
            text-decoration: none;
        }

        .obscure {
            width: 100%;
            height: 100%;
            display: none;
            position: absolute;
            top: 0px;
            left: 0px;
            background: rgba(9, 9, 9, 0.67);
            z-index: 1;
        }

        .popup {
            width: 30%;
            padding: 10px 75px;
            transform: translate(-50%, -50%) scale(0.5);
            position: absolute;
            top: 50%;
            left: 50%;
            box-shadow: 0px 2px 16px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
            background: #fff;
            text-align: center;
            z-index: 3;
        }

        .popup .closeBtn {
            display: inline-block;
            margin-top: 10px; /* Espacio entre el botón Guardar y Cerrar */
            font-weight: bold;
            text-decoration: none;
            color: #333;
            line-height: 10px;
        }

        .animationOpen, .animationClose {
            display: block;
            transition: all ease .2s;
        }

        .animationOpen {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
        }

        .animationClose {
            opacity: 0;
            transform: translate(-50%, -50%) scale(.5);
        }

        form {
            margin-top: 20px;
        }

        input {
            margin-bottom: 10px;
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        @media screen and (max-width: 600px) {
            h1 {
                margin-bottom: 10px;
                font-size: 22px;
            }

            h2 {
                font-size: 15px;
                line-height: 15px;
                margin-bottom: 30px;
            }

            .popup {
                width: 80%;
                padding: 10px 5%;
            }
        }
    </style>
</head>
<body>
    <div class="obscure">
        <div class="popup animationClose">
            <h1>Shipping Details</h1>
            <h2>Don't worry, you'll only have to fill this out once.</h2>
            <form method="POST" action="guardar_envio.php">
            <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>"> 
                <input type="text" name="nombres" placeholder="Names" required>
                <input type="text" name="apellidos" placeholder="Surnames" required>
                <input type="tel" name="telefono" placeholder="Phone" required>
                <input type="text" name="id" placeholder="ID" required>
                <input type="text" name="pais" placeholder="Country of residence" required>
                <input type="text" name="ciudad" placeholder="City of residence" required>
                <input type="text" name="direccion" placeholder="Residence address" required>
                <input type="text" name="codigo_postal" placeholder="Zip code" required>
                <input type="submit" value="Save">
                <a class="closeBtn" href="#">Close</a> <!-- Botón cerrar ahora está aquí -->
            </form>
        </div>
    </div>
    <a class="openBtn" href="#">Buy now</a>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.openBtn').click(function (e) {
                setTimeout(function () {
                    $('.popup').removeClass('animationClose').addClass('animationOpen');
                }, 100);
                $('.obscure').fadeIn(50);
                e.preventDefault();
            });

            $('.closeBtn').click(function (e) {
                e.preventDefault();
                setTimeout(function () {
                    $('.obscure').fadeOut(350);
                }, 50);
                $('.popup').removeClass('animationOpen').addClass('animationClose');
            });
        });
    </script>
</body>
</html>
