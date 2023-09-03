<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap-icons.css">
    <link rel="stylesheet" href="estilos/colores.css">
    <link rel="stylesheet" href="estilos/registrarse.css">
    <title>Riffs</title>
    <link rel="shortcut icon" href="img/riffs.png" />
    <style>

    </style>
</head>

<body style="background-image: url('img/iniciosesion1.jpg');">
    <section class="container">
        <div class="left">
            <div class="tarjeta">
                <div class="logo">
                    <img class="animation a1" src="img/logonegro.png" alt="logo">
                </div>
                <div class="inicio">
                    <h2 class="animation a2">Bienvenido a Riffs</h2>
                    <h4 class="animation a2">Introduzca sus datos</h4>
                </div>
                <?php
                session_start();

                if (isset($_SESSION['mensaje'])) {
                    echo '<div class="alert alert-warning animation a2">' . $_SESSION['mensaje'] . '</div>';
                    unset($_SESSION['mensaje']); // Eliminar la variable de sesión para que no se muestre en futuras páginas
                }
                ?>
                <form action="registrar.php" class="form" method="post">
                    <div class="input-container animation a3">
                        <input type="text" id="input" name="nombre" minlength="3" maxlength="50" pattern="[A-Za-z\s]+"
                            required>
                        <label for="input" class="label">Nombre</label>
                        <div class="underline"></div>
                    </div>
                    <div class="input-container animation a4">
                        <input type="text" id="input" name="apellido" minlength="3" maxlength="30" pattern="[A-Za-z\s]+"
                            required>
                        <label for="input" class="label">Apellidos</label>
                        <div class="underline"></div>
                    </div>
                    <div class="input-container animation a5">
                        <input type="text" id="input" name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                            required>
                        <label for="input" class="label">Correo</label>
                        <div class="underline"></div>
                    </div>
                    <div class="input-container animation a6">
                        <input type="password" id="input" name="clave" minlength="3" maxlength="30" required>
                        <label for="input" class="label">Contraseña</label>
                        <div class="underline"></div>
                    </div>
                    <input type="submit" id="boton" class="form-field animation a7" value="Registrarse"
                        name="registrar">
                </form>

            </div>
        </div>
    </section>

</body>

</html>