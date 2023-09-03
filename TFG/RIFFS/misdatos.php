<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header('Location: loguearse.php');
} elseif (isset($_SESSION['nombre'])) {
    $contrasena = '';
    $usuario = 'root';
    $nombreBD = 'riffs';
    try {
        $bd = new PDO('mysql:host=localhost;
            dbname=' . $nombreBD,
            $usuario,
            $contrasena
        );
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    $id = $_SESSION['id'];
    $sql = $bd->prepare("SELECT * FROM persona where id_persona = ?;");
    $sql2 = $bd->prepare("SELECT * FROM envio where id_persona = ?;");
    $sql->execute([$id]);
    $sql2->execute([$id]);
    $persona = $sql->fetch(PDO::FETCH_OBJ);
    $persona2 = $sql2->fetch(PDO::FETCH_OBJ);
} else {
    echo 'error de sessión';
}


$total = 0;
$cantidad = 0;
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
                    <h2>Mis datos</h2>
                </div>
                <form action="misdatosphp.php" class="form" method="post" enctype="multipart/form-data">
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
                                        pattern="[a-zA-Z\s]+" value="<?php echo $persona->nombre ?>">
                                </div>
                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Apellidos</label>
                                    <input type="text" class="form-field input" name="apellido" required
                                        pattern="[a-zA-Z\s]+" value="<?php echo $persona->apellido ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Correo</label>
                                    <input type="email" class="form-field" placeholder="Correo" name="correo" required
                                        value="<?php echo $persona->correo ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Datos de envio</p>
                                <div class="coolinput">
                                    <label for="input" class="text">Dirección</label>
                                    <input type="text" class="form-field input" name="direccion"
                                        value="<?php echo $persona2->direccion ?>">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">Municipio</label>
                                    <input type="text" class="form-field input" name="municipio" pattern="[a-zA-Z\s]+"
                                        value="<?php echo $persona2->municipio ?>">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">Postal</label>
                                    <input type="text" class="form-field input" name="postal" pattern="[0-9]{5}"
                                        value="<?php echo $persona2->postal ?>">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">Telefono</label>
                                    <input type="text" class="form-field input" name="telefono" pattern="[0-9]{7,14}"
                                        value="<?php echo $persona2->telefono ?>">
                                </div>
                            </td>
                            <td>
                                <p>Datos de pago</p>
                                <div class="coolinput">
                                    <label for="input" class="text">Nombre(Tarjeta)</label>
                                    <input type="text" class="form-field input" name="nombre_envio"
                                        pattern="[a-zA-Z\s]+" value="<?php echo $persona2->nombre_tarjeta ?>">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">Número bancario</label>
                                    <input type="text" class="form-field input" name="nbancario"
                                        pattern="[0-9]{13,18}" value="<?php echo $persona2->nbancario ?>">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">Tipo de tarjeta</label>
                                    <select id="Categoria" class="form-field input" name="tipo">
                                        <option value="Visa" <?php if ($persona2->tipo == "Visa")
                                            echo "selected"; ?>>Visa
                                        </option>
                                        <option value="Mastercard" <?php if ($persona2->tipo == "Mastercard")
                                            echo "selected"; ?>>Mastercard
                                        </option>
                                    </select>
                                </div>

                                <input type="text" class="oculto" placeholder="" name="">

                            </td>
                        </tr>
                    </table>

                    <input type="hidden" name="oculto">
                    <input type="hidden" name="id" value="<?php echo $persona->id_persona; ?>">
                    <td colspan="2"><input type="submit" class="form-field" value="Editar datos"
                            onclick="return confirmarEdicion(event)" name="editar"></td>
                </form>
                <form action="misdatosphp.php" class="form" method="post" enctype="multipart/form-data">
                    <div>
                    </div>
                    <div>
                    </div>
                    <table class="espacioarriba">
                        <tr>
                            <td>
                                <p>Cambio de contraseña</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if (isset($_SESSION['mensaje1'])) {
                                    echo '<div class="alert">' . $_SESSION['mensaje1'] . '</div>';
                                    unset($_SESSION['mensaje1']);
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Contraseña</label>
                                    <input type="password" class="form-field input" name="antigua" required>
                                </div>
                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Nueva contraseña</label>
                                    <input type="password" class="form-field input" name="nueva" required>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <input type="hidden" name="oculto">
                    <input type="hidden" name="id" value="<?php echo $persona->id_persona; ?>">
                    <td colspan="2"><input type="submit" class="form-field" onclick="return confirmarContraseña(event)"
                            value="Cambiar" name="clave"></td>
                </form>

            </div>
        </div>
    </section>
    <script>
        function confirmarEdicion(event) {
            if (!confirm("¿Estás seguro de que quieres editar esta cuenta?")) {
                event.preventDefault();
                return false;
            }
            return true;
        }

        function confirmarContraseña(event) {
            if (!confirm("¿Estás seguro de que quieres cambiar la contraseña?")) {
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>
</body>

</html>