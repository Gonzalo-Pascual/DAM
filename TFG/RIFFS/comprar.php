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
                    <h2>Comprar</h2>
                </div>
                <form action="comprarphp.php" class="form" method="post" enctype="multipart/form-data">
                    <div>
                    </div>
                    <div>
                    </div>
                    <table>

                        <tr>
                            <td>
                                <p>Datos de envio</p>
                                <div class="coolinput">
                                    <label for="input" class="text">Dirección</label>
                                    <input type="text" class="form-field input" name="direccion" required
                                        value="<?php echo $persona2->direccion ?>">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">Municipio</label>
                                    <input type="text" class="form-field input" name="municipio" required
                                        pattern="[a-zA-Z\s]+" value="<?php echo $persona2->municipio ?>">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">Postal</label>
                                    <input type="text" class="form-field input" name="postal" required
                                        pattern="[0-9]{5}" value="<?php echo $persona2->postal ?>">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">Telefono</label>
                                    <input type="text" class="form-field input" name="telefono" required
                                        pattern="[0-9]{7,14}" value="<?php echo $persona2->telefono ?>">
                                </div>
                                <input type="text" class="oculto" placeholder="" name="">
                            </td>
                            <td>
                                <p>Datos de pago</p>
                                <div class="coolinput">
                                    <label for="input" class="text">Nombre(Tarjeta)</label>
                                    <input type="text" class="form-field input" name="nombre_envio" required
                                        pattern="[a-zA-Z\s]+" value="<?php echo $persona2->nombre_tarjeta ?>">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">Número bancario</label>
                                    <input type="text" class="form-field input" name="nbancario" required
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
                                <div class="coolinput">
                                    <label for="input" class="text">Fecha caducidad</label>
                                    <input type="date" class="form-field input" name="fcaducidad" required
                                        min="<?php echo date('Y-m-d'); ?>">
                                </div>
                                <div class="coolinput">
                                    <label for="input" class="text">CVV</label>
                                    <input type="text" class="form-field input" name="cvv" required pattern="[0-9]{3}">
                                </div>



                            </td>
                        </tr>
                        <tr>
                            <?php
                            require "conexion.php";
                            mysqli_select_db($conexion, $basededatos);
                            mysqli_set_charset($conexion, "utf8");
                            $consulta = "SELECT * FROM carrito INNER JOIN instrumento ON carrito.id_instrumento = instrumento.id_instrumento INNER JOIN persona ON carrito.id_persona = persona.id_persona WHERE persona.id_persona = '{$_SESSION['id']}'";
                            $resultado = mysqli_query($conexion, $consulta);

                            while ($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
                                $total = $registro["precio"] * $registro["cantidad"] + $total;
                                $cantidad = $registro["cantidad"] + $cantidad;
                            }
                            ?>
                            <td>
                                <p class="titulototal">
                                    <?php echo $cantidad ?> Articulos
                                </p>
                            </td>
                            <td>
                                <p class="titulototal">Total:
                                    <?php echo $total ?>€
                                </p>
                            </td>
                        </tr>
                    </table>

                    <input type="hidden" name="oculto">
                    <input type="hidden" name="id" value="<?php echo $persona->id_persona; ?>">
                    <td colspan="2"><input type="submit" class="form-field" value="Comprar" name="editar"></td>
                </form>

            </div>
        </div>
    </section>

</body>

</html>