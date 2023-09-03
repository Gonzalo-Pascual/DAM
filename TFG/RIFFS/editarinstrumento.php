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
    $sql = $bd->prepare("SELECT * FROM instrumento where id_instrumento = ?;");
    $sql2 = $bd->prepare("SELECT * FROM caracteristica where id_caracteristica = ?;");
    $sql->execute([$id]);
    $sql2->execute([$id]);
    $instrumento = $sql->fetch(PDO::FETCH_OBJ);
    $instrumento2 = $sql2->fetch(PDO::FETCH_OBJ);
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
                    <h2>Editar producto</h2>
                </div>
                <form action="editarinstrumentophp.php" class="form" method="post" enctype="multipart/form-data">
                    <div>
                    </div>
                    <div>
                    </div>
                    <table>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Marca</label>
                                    <input type="text" class="form-field input" name="marca" required
                                        value="<?php echo $instrumento->marca ?>">
                                </div>

                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Modelo</label>
                                    <input type="text" class="form-field input" name="modelo" required
                                        value="<?php echo $instrumento->modelo ?>">
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Descripción</label>
                                    <textarea class="form-field descripcion input" name="descripcion"
                                        required><?php echo $instrumento->descripcion ?></textarea>
                                </div>


                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Categoría</label>
                                    <select id="Categoria" class="form-field input" name="categoria">
                                        <option value="1" <?php if ($instrumento->categoria == "1")
                                            echo "selected"; ?>>
                                            Guitarra española</option>
                                        <option value="2" <?php if ($instrumento->categoria == "2")
                                            echo "selected"; ?>>
                                            Guitarra acustica</option>
                                        <option value="3" <?php if ($instrumento->categoria == "3")
                                            echo "selected"; ?>>
                                            Guitarra electrica</option>
                                        <option value="4" <?php if ($instrumento->categoria == "4")
                                            echo "selected"; ?>>
                                            Amplificadores</option>
                                        <option value="5" <?php if ($instrumento->categoria == "5")
                                            echo "selected"; ?>>Cables
                                        </option>
                                        <option value="6" <?php if ($instrumento->categoria == "6")
                                            echo "selected"; ?>>
                                            Fundas</option>
                                        <option value="7" <?php if ($instrumento->categoria == "7")
                                            echo "selected"; ?>>
                                            Accesorios</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Precio</label>
                                    <input type="text" class="form-field input" name="precio" required
                                        pattern="[0-9]+([.,][0-9]{1,2})?" value="<?php echo $instrumento->precio ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Caracteristica 1</label>
                                    <input type="text" class="form-field input" name="caracteristica1" required
                                        value="<?php echo $instrumento2->caracteristica1 ?>">
                                </div>

                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Caracteristica 2</label>
                                    <input type="text" class="form-field input" name="caracteristica2" required
                                        value="<?php echo $instrumento2->caracteristica2 ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Caracteristica 3</label>
                                    <input type="text" class="form-field input" name="caracteristica3" required
                                        value="<?php echo $instrumento2->caracteristica3 ?>">
                                </div>
                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Caracteristica 4</label>
                                    <input type="text" class="form-field input" name="caracteristica4" required
                                        value="<?php echo $instrumento2->caracteristica4 ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Caracteristica 5</label>
                                    <input type="text" class="form-field input" name="caracteristica5" required
                                        value="<?php echo $instrumento2->caracteristica5 ?>">
                                </div>
                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Caracteristica 6</label>
                                    <input type="text" class="form-field input" name="caracteristica6" required
                                        value="<?php echo $instrumento2->caracteristica6 ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Foto 1</label>
                                    <input type="file" class="form-field-arch input" name="foto1" accept="image/*"
                                        value="<?php echo $instrumento->foto1 ?>">
                                </div>

                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Foto 2</label>
                                    <input type="file" class="form-field-arch input" name="foto2" accept="image/*"
                                        value="<?php echo $instrumento->foto2 ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Foto 3</label>
                                    <input type="file" class="form-field-arch input" name="foto3" accept="image/*"
                                        value="<?php echo $instrumento->foto3 ?>">
                                </div>
                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Foto 4</label>
                                    <input type="file" class="form-field-arch input" name="foto4" accept="image/*"
                                        value="<?php echo $instrumento->foto4 ?>">
                                </div>
                            </td>
                        </tr>

                    </table>
                    <div class="editelim">
                        <tr>
                            <input type="hidden" name="oculto">
                            <input type="hidden" name="id" value="<?php echo $instrumento->id_instrumento; ?>">
                            <td colspan="2"><input type="submit" class="form-field" value="Editar"
                                    onclick="return confirmarEdicion(event)" name="editar"></td>
                            <td colspan="1"><input type="submit" class="form-field" value="Eliminar"
                                    onclick="return confirmarEliminacion(event)" name="eliminar">

                        </tr>
                        <script>
                            function confirmarEliminacion(event) {
                                if (!confirm("¿Estás seguro de que quieres eliminar este producto?")) {
                                    event.preventDefault();
                                    return false;
                                }
                                return true;
                            }
                            function confirmarEdicion(event) {
                                if (!confirm("¿Estás seguro de que quieres editar este producto?")) {
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