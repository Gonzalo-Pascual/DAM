<?php
require_once('redireccionar.php');
require('conexion.php')
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riffs</title>
    <link rel="stylesheet" href="estilos/navbar.css">
    <link rel="stylesheet" href="estilos/colores.css">
    <link rel="stylesheet" href="estilos/sesionadmin.css">
    <link rel="stylesheet" href="estilos/estadistica.css">
    <link rel="stylesheet" href="bootstrap/bootstrap-icons.css">
    <link rel="stylesheet" href="lb/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/riffs.png" />
    <style>
        .hide-body {
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s linear 100ms, opacity 100ms;
        }
    </style>
</head>

<body>


    <span class="nav-bar">

        <div class="logo-nav">
            <label class="btnMenu" for="btnMenu">
                <input type="checkbox" id="btnMenu">
                <span></span>
                <span></span>
                <span></span>
            </label>

            <img src="img/riffs-blanco.png">
            <label>riffs</label>
        </div>
        <div class="opcion-nav">
            <a href="sesion.php"><i class="bi bi-person-fill"></i></a>
            <a href="favoritos.php"><i class="bi bi-heart"></i></a>
            <a href="carrito.php"><i class="bi bi-bag"></i></a>
        </div>
    </span>


    <nav class="main-nav">
        <ul class="menu list-unstyled" id="menu">
            <div class="logo">
                <img src="img/riffs-blanco.png" alt="logo">
                <label class="ocultar">riffs</label>
            </div>
            <div class="medio">
                <li class="menu-item"><a href="index.php" class="menu-link">Inicio</a></li>
                <li class="menu-item conteiner-submenu">
                    <a href="productos.php" class="menu-link submenu-btn">Productos</a>
                </li>
                <li class="menu-item"><a href="musica.php" class="menu-link">Música</a></li>
            </div>
            <div class="opcion">
                <a href="sesion.php"><i class="bi bi-person-fill"></i></a>
                <a href="favoritos.php"><i class="bi bi-heart"></i></a>
                <a href="carrito.php"><i class="bi bi-bag"></i></a>
            </div>
        </ul>
    </nav>


    <main>
        <ul class="margen">
            <li></li>
        </ul>
        <div class="eleccion">
            <div class="elecciontabla">
                <div class="izq">
                    <a href="estadisticas.php" class="link active">Estadisticas</a>
                    <a href="graficos.php" class="">Graficos</a>
                </div>
                <div class="der"><a href="pdfestadisticas.php" class="">PDF &nbsp;&nbsp;<i class="bi bi-download"></i></a></div>
            </div>
        </div>


        <div class="centrado">
            <?php
            $tabla3 = 3;
            $tabla4 = 4;
            $tabla5 = 5;
            $tabla6 = 6;
            $est1 = "SELECT  sum(cantidad) as cant FROM compra ";
            $resultadoest1 = mysqli_query($conexion, $est1);
            $rowest1 = mysqli_fetch_assoc($resultadoest1);

            $est2 = "SELECT round(SUM(cantidad * precio),2) AS ganancias_totales
            FROM compra INNER JOIN instrumento ON compra.id_instrumento = instrumento.id_instrumento";
            $resultadoest2 = mysqli_query($conexion, $est2);
            $rowest2 = mysqli_fetch_assoc($resultadoest2);

            $est3 = "SELECT  count(*) as cant FROM subscripciones ";
            $resultadoest3 = mysqli_query($conexion, $est3);
            $rowest3 = mysqli_fetch_assoc($resultadoest3);

            $est4 = "SELECT  sum(vistas) as cant FROM instrumento ";
            $resultadoest4 = mysqli_query($conexion, $est4);
            $rowest4 = mysqli_fetch_assoc($resultadoest4);

            echo '<table>
            <tr>
                <th class="titulo" colspan="3">Estadisticas</th>
            </tr>';
            echo '<tr class="borde">
                <td>Ventas totales</td>
                <td>' . $rowest1['cant'] . '</td>
            </tr>';
            echo '<tr class="borde">
                <td>Ganancias totales</td>
                <td>' . $rowest2["ganancias_totales"] . '€</td>
            </tr>';
            echo '<tr class="borde">
                <td>Número de subscriptores</td>
                <td>' . $rowest3["cant"] . '</td>
            </tr>';
            echo '<tr class="borde">
                <td>Vistas totales</td>
                <td>' . $rowest4["cant"] . '</td>
            </tr>';


            echo '</tbody>
            </table>';



            // LISTA COMPLETA VENDIDOS
            $sql = "SELECT i.id_instrumento, IFNULL(SUM(c.cantidad), 0) as cantidad_total
            FROM instrumento i
            LEFT JOIN compra c ON i.id_instrumento = c.id_instrumento
            GROUP BY i.id_instrumento
            ORDER BY cantidad_total DESC";
            $resultado = mysqli_query($conexion, $sql);

            // Lista completa de productos ordenados por cantidad
            $lista_ventas = array();

            while ($row = mysqli_fetch_assoc($resultado)) {
                $id_instrumento = $row['id_instrumento'];
                $cantidad_total = $row['cantidad_total'];
                $lista_ventas[] = array(
                    'id_instrumento' => $id_instrumento,
                    'cantidad_total' => $cantidad_total
                );
            }
            // LISTA COMPLETA VENDIDOS
            

            echo '<table>
                    <tr>
                        <th class="titulo" colspan="3" id="boton' . $tabla3 . '" onclick="Mostrar_ocultar(' . $tabla3 . ')">Ventas</th>
                    </tr>
                    
                    <tbody id="caja' . $tabla3 . '" style="display: none;">
                      <tr class="fila">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                      </tr>';
            foreach ($lista_ventas as $producto) {
                $id_instrumento = $producto['id_instrumento'];
                $cantidad_total = $producto['cantidad_total'];
                $sql2 = "SELECT * FROM instrumento where id_instrumento = $id_instrumento";
                $resultado = mysqli_query($conexion, $sql2);
                $registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

                echo '<tr class="borde">
                <td>' . $id_instrumento . '</td>
                <td> ' . $registro["marca"] . ' ' . $registro["modelo"] . '</td>
                <td>' . $cantidad_total . '</td>
              </tr>';
            }

            echo '</tbody>
          </table>';

            // MÁS FAVORITOS
            
            $sql3 = "SELECT * FROM (
                SELECT f.id_instrumento, COUNT(f.id_instrumento) as cantidad FROM favorito f GROUP BY f.id_instrumento
                UNION
                SELECT i.id_instrumento, 0 as cantidad FROM instrumento i
                WHERE i.id_instrumento NOT IN (SELECT id_instrumento FROM favorito)
            ) as subconsulta
            ORDER BY cantidad DESC";

            $result = mysqli_query($conexion, $sql3);

            // Verificar si se encontraron resultados
            if (mysqli_num_rows($result) > 0) {
                // Crear una tabla HTML para mostrar los resultados
                echo '<table>
              <tr>
                  <th class="titulo" colspan="3" id="boton' . $tabla4 . '" onclick="Mostrar_ocultar(' . $tabla4 . ')">Favoritos</th>
              </tr>
              <tbody id="caja' . $tabla4 . '" style="display: none;">
                  <tr class="fila">
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Cantidad</th>
                  </tr>';

                // Recorrer los resultados y mostrarlos en la tabla HTML
                while ($row = mysqli_fetch_assoc($result)) {
                    $id_instrumento = $row['id_instrumento'];
                    $cantidad = $row['cantidad'];

                    // Obtener los datos del instrumento desde la tabla "instrumento"
                    $sql2 = "SELECT * FROM instrumento WHERE id_instrumento = $id_instrumento";
                    $resultado = mysqli_query($conexion, $sql2);
                    $registro = mysqli_fetch_assoc($resultado);

                    echo '<tr class="borde">
                  <td>' . $id_instrumento . '</td>
                  <td>' . $registro["marca"] . ' ' . $registro["modelo"] . '</td>
                  <td>' . $cantidad . '</td>
              </tr>';
                }

                echo '</tbody>
          </table>';
            } else {
                echo "No se encontraron resultados.";
            }

            // MÁS VISTOS
            $sql4 = "SELECT * FROM `instrumento` ORDER BY vistas DESC";
            $resultado3 = mysqli_query($conexion, $sql4);

            echo '<table>
            <tr>
                <th class="titulo" colspan="3" id="boton' . $tabla5 . '" onclick="Mostrar_ocultar(' . $tabla5 . ')">Visualizaciones</th>
            </tr>
            <tbody id="caja' . $tabla5 . '" style="display: none;">
                <tr class="fila">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                </tr>';

            // Recorrer los resultados y mostrarlos en la tabla HTML
            while ($row = mysqli_fetch_assoc($resultado3)) {
                $id_instrumento = $row['id_instrumento'];
                $cantidad = $row['vistas'];

                // Obtener los datos del instrumento desde la tabla "instrumento"
                $sql2 = "SELECT * FROM instrumento WHERE id_instrumento = $id_instrumento";
                $resultado = mysqli_query($conexion, $sql2);
                $registro = mysqli_fetch_assoc($resultado);

                echo '<tr class="borde">
                <td>' . $id_instrumento . '</td>
                <td>' . $registro["marca"] . ' ' . $registro["modelo"] . '</td>
                <td>' . $cantidad . '</td>
            </tr>';
            }

            echo '</tbody>
        </table>';



            //VENTAS Y GANANCIAS POR MES
            $query = "SELECT i.id_instrumento, IFNULL(SUM(c.cantidad), 0) as cantidad_total, 
            DATE_FORMAT(c.fecha, '%Y-%m') as mes, SUM(c.cantidad) as total_ventas_mes, 
            ROUND(SUM(c.cantidad * i.precio),1) as precio_total_mes
            FROM instrumento i
            LEFT JOIN compra c ON i.id_instrumento = c.id_instrumento
            WHERE c.fecha >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
            GROUP BY i.id_instrumento, mes
            ORDER BY mes DESC, id_instrumento ASC";

            $resultado = mysqli_query($conexion, $query);

            // Lista de productos vendidos agrupados por mes
            $lista_ventas_mes = array();
            $total_ventas_mes = array();
            $total_ganancias_mes = array(); // Array para almacenar las ganancias por mes
            
            while ($row = mysqli_fetch_assoc($resultado)) {
                $id_instrumento = $row['id_instrumento'];
                $cantidad_total = $row['cantidad_total'];
                $mes = $row['mes'];
                $total_ventas_mes[$mes] = (isset($total_ventas_mes[$mes])) ? $total_ventas_mes[$mes] + $row['total_ventas_mes'] : $row['total_ventas_mes'];
                $precio_total = $row['precio_total_mes'];
                $total_ganancias_mes[$mes] = (isset($total_ganancias_mes[$mes])) ? $total_ganancias_mes[$mes] + $precio_total : $precio_total; // Calcula las ganancias por mes
                $lista_ventas_mes[$mes][] = array(
                    'id_instrumento' => $id_instrumento,
                    'cantidad_total' => $cantidad_total,
                    'precio_total' => $precio_total
                );
            }

            echo '<table>
  <tr>
      <th class="titulo" colspan="5" id="boton' . $tabla6 . '" onclick="Mostrar_ocultar(' . $tabla6 . ')">Ventas / Ganancias por mes</th>
  </tr>
  <tbody id="caja' . $tabla6 . '" style="display: none;">';

            foreach ($lista_ventas_mes as $mes => $productos) {
                echo '<tr class="mes">
          <td colspan="2" class="meses">' . date('F Y', strtotime($mes . '-01')) . '</td>
          <td colspan="2" class="meses">' . $total_ventas_mes[$mes] . '</td>
          <td colspan="2" class="meses">' . $total_ganancias_mes[$mes] . '€</td>
      </tr>';

                foreach ($productos as $producto) {
                    $id_instrumento = $producto['id_instrumento'];
                    $cantidad_total = $producto['cantidad_total'];
                    $precio_total = $producto['precio_total'];
                    $sql2 = "SELECT * FROM instrumento WHERE id_instrumento = $id_instrumento ";
                    $resultado = mysqli_query($conexion, $sql2);
                    $registro = mysqli_fetch_assoc($resultado);

                    echo '<tr class="borde">
              <td>' . $id_instrumento . '</td>
              <td>' . $registro["marca"] . ' ' . $registro["modelo"] . '</td>
              <td>' . $cantidad_total . '</td>
              <td>' . '</td>
              <td>' . $precio_total . '€</td>
          </tr>';
                }
            }

            echo '</tbody>
  </table>';
            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);
            ?>
        </div>

        <script type="text/javascript">
            function Mostrar_ocultar(tabla) {
                var caja = document.getElementById("caja" + tabla);
                var boton = document.getElementById("boton" + tabla);

                if (caja.style.display === "none") {
                    Mostrar(tabla);
                    /* boton.innerHTML = "Ocultar"; */
                } else {
                    Ocultar(tabla);
                    /* boton.innerHTML = "Mostrar"; */
                }
            }

            function Mostrar(tabla) {
                document.getElementById("caja" + tabla).style.display = "table-row-group";
            }

            function Ocultar(tabla) {
                document.getElementById("caja" + tabla).style.display = "none";
            }

        </script>
        <script src="lb/js/bootstrap.min.js"></script>
    </main>
    <script src="javascript/navbar.js"></script>
</body>

</html>