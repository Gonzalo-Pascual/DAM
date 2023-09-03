<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="bootstrap/bootstrap-icons.css">
    <link rel="stylesheet" href="estilos/colores.css">
    <link rel="stylesheet" href="estilos/loguearse.css">
    <title>Riffs</title>
    <link rel="shortcut icon" href="img/riffs.png" />
</head>

<body>
    <div class="container">
        <div class="left">
            <div class="logo">
                <img src="img/logonegro.png" class="animation a1" alt="logo">
            </div>
            <div class="header">
                <h2 class="animation a2">Bienvenido a Riffs</h2>
                <h4 class="animation a2">Introduzca su correo y contraseña</h4>
            </div>
            <?php
            session_start();

            if (isset($_SESSION['mensaje'])) {
                echo '<div class="alert alert-warning animation a2">' . $_SESSION['mensaje'] . '</div>';
                unset($_SESSION['mensaje']); // Eliminar la variable de sesión para que no se muestre en futuras páginas
            }
            ?>
            <div class="form">
                <form action="loginphp.php" class="form" method="post">
                    <div class="input-container animation a4">
                        <input type="text" id="input" name="nombre" minlength="3" required>
                        <label for="input" class="label">Correo</label>
                        <div class="underline"></div>
                    </div>

                    <div class="input-container animation a4">
                        <input type="password" id="input" required="" name="clave" minlength="3" required>
                        <label for="input" class="label">Contraseña</label>
                        <div class="underline"></div>
                    </div>
                    <p class="animation a5"><a href="cuenta.php">Registrarse ahora</a></p>

                    <input type="submit" class="form-field animation a6" value="Iniciar sesión" name="login" required>

                    <?php


                    ?>
                </form>
            </div>
        </div>
        <div class="right" style="background-image: url('img/iniciosesion1.jpg');"></div>
    </div>

</body>

</html>