<?php
require_once('redireccionar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/colores.css">
    <link rel="stylesheet" href="estilos/agregar.css">
    <title>Riffs</title>
    <link rel="shortcut icon" href="img/riffs.png" />
    <style>
        body {
            font-family: 'Rubik', sans-serif;
            background-image: url("img/iniciosesion1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;


        }
    </style>

</head>

<body>
    <section class="container">
        <div class="left">
            <div class="tarjeta">
                <div class="inicio">
                    <h2>Añadir persona</h2>
                </div>
                <form action="agregarpersonaphp.php" class="form" method="post" enctype="multipart/form-data">
                    <div>
                    </div>
                    <div>
                    </div>
                    <table>
                        <tr>
                            <td>
                                <p>Datos del usuario</p>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Nombre</label>
                                    <input type="text" name="nombre" class="input form-field" required
                                        pattern="[a-zA-Z\s]+">
                                </div>
                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Apellidos</label>
                                    <input type="text" class="input form-field" name="apellido" required
                                        pattern="[a-zA-Z\s]+">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Correo</label>
                                    <input type="email" class="input form-field" name="correo" required>
                                </div>
                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Contraseña</label>
                                    <input type="password" class="input form-field" name="clave" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Acceso</label>
                                    <select id="Categoria" class="form-field input" name="acceso">
                                        <option value="0">Usuario</option>
                                        <option value="1">Administrador</option>
                                    </select>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Datos del envio</p>
                                <div class="coolinput">
                                    <label for="input" class="text">Dirección</label>
                                    <input type="text" class="input form-field" name="direccion">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">Municipio</label>
                                    <input type="text" class="input form-field" name="municipio" pattern="[a-zA-Z\s]+">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">Postal</label>
                                    <input type="text" class="input form-field" name="postal" pattern="[0-9]{5}">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">Telefono</label>
                                    <input type="text" class="input form-field" name="telefono" pattern="[0-9]{7,14}">

                                </div>
                            </td>
                            <td>
                                <p>Datos de pago</p>
                                <div class="coolinput">
                                    <label for="input" class="text">Nombre(Tarjeta)</label>
                                    <input type="text" class="input form-field" name="nombre_envio"
                                        pattern="[a-zA-Z\s]+">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">Número bancario</label>
                                    <input type="text" class="input form-field" name="nbancario" pattern="[0-9]{13,18}">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">Tipo de tarjeta</label>
                                    <select id="Categoria" class="input form-field" name="tipo">
                                        <option value="Visa">Visa</option>
                                        <option value="MasterCard">MasterCard</option>
                                    </select>
                                </div>
                                <input type="text" class="oculto">

                            </td>
                        </tr>



                    </table>
                    <input type="submit" class="form-field" value="Agregar" name="agregar">
                </form>

            </div>
        </div>
    </section>

</body>

</html>