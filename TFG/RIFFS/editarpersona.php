<?php
require_once('redireccionar.php');
if (!isset($_GET['id'])) {
    header('Location: index.php');
}
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
    $id = $_GET['id'];
    $sql = $bd->prepare("SELECT * FROM persona where id_persona = ?;");
    $sql2 = $bd->prepare("SELECT * FROM envio where id_persona = ?;");
    $sql->execute([$id]);
    $sql2->execute([$id]);
    $persona = $sql->fetch(PDO::FETCH_OBJ);
    $persona2 = $sql2->fetch(PDO::FETCH_OBJ);
} else {
    echo 'error de sessión';
}
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
                    <h2>Editar persona</h2>
                </div>
                <form action="editarpersonaphp.php" class="form" method="post" enctype="multipart/form-data">
                    <div>
                    </div>
                    <div>
                    </div>
                    <table>
                        <tr>
                            <td>
                                <p>Datos de usuario</p>
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
                                    <input type="email" class="form-field" name="correo" required
                                        value="<?php echo $persona->correo ?>">
                                </div>
                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Acceso</label>
                                    <select id="Categoria" class="form-field" name="acceso">
                                        <option value="0" <?php if ($persona->acceso == "0")
                                            echo "selected"; ?>>Usuario
                                        </option>
                                        <option value="1" <?php if ($persona->acceso == "1")
                                            echo "selected"; ?>>Administrador
                                        </option>
                                    </select>
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
                                    <input type="text" class="form-field input" name="bancario" pattern="[0-9]{13,18}"
                                        value="<?php echo $persona2->nbancario ?>">
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
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                        </tr>


                    </table>
                    <div class="editelim">
                        <tr>
                            <input type="hidden" name="oculto">
                            <input type="hidden" name="id" value="<?php echo $persona->id_persona; ?>">
                            <td colspan="2"><input type="submit" class="form-field" value="Editar"
                                    onclick="return confirmarEdicion(event)" name="editar"></td>
                            <td colspan="1"><input type="submit" class="form-field" value="Eliminar"
                                    onclick="return confirmarEliminacion(event)" name="eliminar">
                        </tr>
                        <script>
                            function confirmarEliminacion(event) {
                                if (!confirm("¿Estás seguro de que quieres eliminar esta cuenta?")) {
                                    event.preventDefault();
                                    return false;
                                }
                                return true;
                            }
                            function confirmarEdicion(event) {
                                if (!confirm("¿Estás seguro de que quieres editar esta cuenta?")) {
                                    event.preventDefault();
                                    return false;
                                }
                                return true;
                            }
                        </script>
                    </div>
                </form>

            </div>
        </div>
    </section>

</body>

</html>