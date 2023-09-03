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
                    <h2>Añadir producto</h2>
                </div>
                <form action="agregarinstrumentophp.php" class="form" method="post" enctype="multipart/form-data">
                    <div>
                    </div>
                    <div>
                    </div>
                    <table>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Marca</label>
                                    <input type="text" name="marca" class="input form-field" required>
                                </div>
                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Modelo</label>
                                    <input type="text" name="modelo" class="input form-field" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Descripción</label>
                                    <textarea class="form-field descripcion input" name="descripcion"></textarea>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Categoría</label>
                                    <select id="Categoria" class="form-field input" name="categoria">
                                        <option value="1">Guitarra española</option>
                                        <option value="2">Guitarra acustica</option>
                                        <option value="3">Guitarra electrica</option>
                                        <option value="4">Amplificadores</option>
                                        <option value="5">Cables</option>
                                        <option value="6">Afinadores</option>
                                        <option value="7">Soportes</option>
                                        <option value="8">Cuerdas</option>
                                        <option value="9">Puentes</option>
                                        <option value="10">Pastillas</option>
                                    </select>
                                </div>

                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Precio</label>
                                    <input type="text" name="precio" class="input form-field" required
                                        pattern="[0-9]+([.,][0-9]{1,2})?">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Caracteristica 1</label>
                                    <input type="text" name="caracteristica1" class="input form-field" required>
                                </div>
                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Caracteristica 2</label>
                                    <input type="text" name="caracteristica2" class="input form-field" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Caracteristica 3</label>
                                    <input type="text" name="caracteristica3" class="input form-field" required>
                                </div>
                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Caracteristica 4</label>
                                    <input type="text" name="caracteristica4" class="input form-field" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Caracteristica 5</label>
                                    <input type="text" name="caracteristica5" class="input form-field" required>
                                </div>
                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Caracteristica 6</label>
                                    <input type="text" name="caracteristica6" class="input form-field" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Foto 1</label>
                                    <input type="file" class="form-field-arch input" name="foto1" accept="image/*">
                                </div>

                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Foto 2</label>
                                    <input type="file" class="form-field-arch input" name="foto2" accept="image/*">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Foto 3</label>
                                    <input type="file" class="form-field-arch input" name="foto3" accept="image/*">
                                </div>
                            </td>
                            <td>
                                <div class="coolinput">
                                    <label for="input" class="text">Foto 4</label>
                                    <input type="file" class="form-field-arch input" name="foto4" accept="image/*">
                                </div>
                            </td>
                        </tr>

                    </table>
                    <input type="submit" class="form-field agregarinput" value="Agregar" name="agregar">
                </form>

            </div>
        </div>
    </section>

</body>

</html>