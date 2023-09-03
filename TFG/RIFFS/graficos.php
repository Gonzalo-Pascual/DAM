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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <style type="text/css">
        ${demo.css}
    </style>

    <!-- GRAFICO VENDIDOS -->
    <script type="text/javascript">
        $(function () {
            // Definir colores personalizados
            var customColors = ['var(--verde_primario)', 'var(--verde_claro)', 'rgb(0, 83, 72)', 'var(--amarillo_contraste)'];

            $('#container1').highcharts({
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: {
                    text: 'Ventas totales',
                    style: {
                        fontSize: '24px'
                    }
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}',
                            style: {
                                textOutline: 'none',
                                fontSize: '15px'
                            }
                        },
                        colors: customColors // Asignar colores personalizados
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Ventas por Vendedores',
                    data: [
                    // Recorrido a la consulta
                    <?php
                    $sql = "SELECT i.id_instrumento, IFNULL(SUM(c.cantidad), 0) as cantidad_total, i.marca, i.modelo
                    FROM instrumento i
                    LEFT JOIN compra c ON i.id_instrumento = c.id_instrumento
                    GROUP BY i.id_instrumento
                    ORDER BY cantidad_total DESC";
                    $resultado = mysqli_query($conexion, $sql);
                    $lista_ventas = array();
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $id_instrumento = $row['id_instrumento'];
                        $cantidad_total = $row['cantidad_total'];
                        $lista_ventas[] = array(
                            'id_instrumento' => $id_instrumento,
                            'cantidad_total' => $cantidad_total
                        );
                        echo "['" . $row["id_instrumento"] . ' - ' . $row["modelo"] . "'," . $row["cantidad_total"] . " ],";
                    }
                    ?>
                ]
            }]
        });
    });
    </script>
    <!-- GRAFICO FAVORITOS -->
    <script type="text/javascript">
        <?php
        $sql3 = "SELECT * FROM (
            SELECT f.id_instrumento, COUNT(f.id_instrumento) as cantidad FROM favorito f GROUP BY f.id_instrumento
            UNION
            SELECT i.id_instrumento, 0 as cantidad FROM instrumento i
            WHERE i.id_instrumento NOT IN (SELECT id_instrumento FROM favorito)
        ) as subconsulta
        ORDER BY id_instrumento ASC";

        $resultado3 = mysqli_query($conexion, $sql3);
        ?>
        $(function () {
            $('#container2').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Favoritos',
                    style: {
                        fontSize: '24px'
                    }
                },
                xAxis: {
                    categories: [
                        <?php
                        while ($row = mysqli_fetch_assoc($resultado3)) {
                            $sql2 = "SELECT * FROM instrumento WHERE id_instrumento = $id_instrumento";
                            $resultado = mysqli_query($conexion, $sql2);
                            $registro = mysqli_fetch_assoc($resultado);
                            $id_instrumento = $row['id_instrumento'];
                            $modelo = $registro['modelo'];
                            $cantidad = $row['cantidad'];
                            ?>
                                                                                    '<?php echo $id_instrumento . ' - ' . $modelo; ?>',
                            <?php
                        }
                        ?>
                    ],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Vistas'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' Favoritos'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        },
                        color: 'var(--verde_primario)' // Cambia el color de las barras a rojo
                    }
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Favoritos', // Cambia el texto "Series 1" a "Favoritos"
                    data: [
                        <?php
                        mysqli_data_seek($resultado3, 0); // Reiniciar el puntero del resultado a la posición inicial
                        while ($row = mysqli_fetch_assoc($resultado3)) {
                            $cantidad = $row['cantidad'];
                            echo $cantidad; ?>,
                            <?php
                        }
                        ?>
                    ]
                }]
            });
        });
    </script>

    <!-- GRAFICO VISUALIZACIONES -->
    <script type="text/javascript">
        <?php
        $sql4 = "SELECT * FROM `instrumento` ORDER BY id_instrumento ASC";
        $resultado4 = mysqli_query($conexion, $sql4);
        ?>
        $(function () {
            $('#container3').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Visualizaciones',
                    style: {
                        fontSize: '24px'
                    }
                },
                xAxis: {
                    categories: [
                        <?php
                        while ($row = mysqli_fetch_assoc($resultado4)) {
                            $id_instrumento = $row['id_instrumento'];
                            $modelo = $row['modelo'];
                            $cantidad = $row['vistas'];
                            ?>'<?php echo $id_instrumento . ' - ' . $modelo; ?>',
                            <?php
                        }
                        ?>
                    ],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Vistas'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' visualizaciones'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        },
                        color: 'var(--verde_claro)' // Cambia el color de las barras a rojo
                    }
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Visualizaciones', // Cambia el texto "Series 1" a "Visualizaciones"
                    data: [
                        <?php
                        mysqli_data_seek($resultado4, 0); // Reiniciar el puntero del resultado a la posición inicial
                        while ($row = mysqli_fetch_assoc($resultado4)) {
                            $cantidad = $row['vistas'];
                            echo $cantidad; ?>, <?php
                        }
                        ?>
                    ]
                }]
            });
        });
    </script>

    <!-- VENTAS POR MES -->
    <?php
    // Obtener la fecha actual
    $currentDate = date('Y-m-d');
    $lastSixMonths = date('Y-m-d', strtotime('-6 months', strtotime($currentDate)));
    $lastSixMonthsArray = array();
    for ($i = 5; $i >= 0; $i--) {
        $month = date('M', strtotime("-$i months", strtotime($currentDate)));
        $lastSixMonthsArray[] = $month;
    }
    $query = "SELECT i.id_instrumento, IFNULL(SUM(c.cantidad), 0) as cantidad_total, DATE_FORMAT(c.fecha, '%Y-%m') as mes, SUM(c.cantidad) as total_ventas_mes, ROUND(SUM(c.cantidad * i.precio), 2) as ganancias_ventas_mes
    FROM instrumento i
    LEFT JOIN compra c ON i.id_instrumento = c.id_instrumento
    WHERE c.fecha >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
    GROUP BY i.id_instrumento, mes
    ORDER BY mes ASC";

    $resultado = mysqli_query($conexion, $query);

    // Lista de productos vendidos agrupados por mes
    $lista_ventas_mes = array();
    $total_ventas_mes = array();
    $ganancias_ventas_mes = array();

    while ($row = mysqli_fetch_assoc($resultado)) {
        $id_instrumento = $row['id_instrumento'];
        $cantidad_total = $row['cantidad_total'];
        $mes = $row['mes'];
        $total_ventas_mes[$mes] = (isset($total_ventas_mes[$mes])) ? $total_ventas_mes[$mes] + $row['total_ventas_mes'] : $row['total_ventas_mes'];
        $ganancias_ventas_mes[$mes] = (isset($ganancias_ventas_mes[$mes])) ? $ganancias_ventas_mes[$mes] + $row['ganancias_ventas_mes'] : $row['ganancias_ventas_mes'];
        $lista_ventas_mes[$mes][] = array(
            'id_instrumento' => $id_instrumento,
            'cantidad_total' => $cantidad_total
        );
    }

    // Generar el array de datos para la serie "Ganancias"
    $ventas_data = implode(', ', $total_ventas_mes);
    $ganancia_data = implode(', ', $ganancias_ventas_mes);

    ?>

<script type="text/javascript">
    $(function () {
        $('#container4').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Ventas/Ganancias por mes',
                style: {
                    fontSize: '24px'
                }
            },
            xAxis: [{
                categories: <?php echo json_encode($lastSixMonthsArray); ?>,
                crosshair: true
            }],
            yAxis: [{ // Primary yAxis
                labels: {
                    style: {
                        color: '#000000' // Amarillo
                    }
                },
                title: {
                    text: 'Ganancias',
                    style: {
                        color: '#000000' // Amarillo
                    }
                }
            }, { // Secondary yAxis
                title: {
                    text: 'Ventas',
                    style: {
                        color: '#000000' // Verde
                    }
                },
                labels: {
                    style: {
                        color: '#000000' // Verde
                    }
                },
                opposite: true
            }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                x: 120,
                verticalAlign: 'top',
                y: 100,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                name: 'Ventas',
                type: 'column',
                yAxis: 1,
                data: [<?php echo $ventas_data; ?>],
                color: 'var(--verde_claro)' // Amarillo

            }, {
                name: 'Ganancias',
                type: 'spline',
                data: [<?php echo $ganancia_data; ?>],
                tooltip: {
                    valueSuffix: '€'
                },
                color: 'rgb(0, 83, 72)' // Amarillo
            }]
        });
    });
</script>



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
                    <a href="estadisticas.php" class="">Estadisticas</a>
                    <a href="graficos.php" class="link active">Graficos</a>
                </div>
                <div class="der"><a href="pdfestadisticas.php" class="">PDF &nbsp;&nbsp;<i class="bi bi-download"></i></a></div>
            </div>
        </div>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <section>
            <div id="container1"
                style="min-width: 310px; max-width: 95%; height: 600px; margin: 0 auto; margin-top: 20px;"></div>
        </section>
        <section>
            <div id="container2"
                style="min-width: 310px; max-width: 95%; min-height: 600px; margin: 0 auto;margin-top: 20px;"></div>
        </section>
        <section>
            <div id="container3"
                style="min-width: 310px; max-width: 95%; min-height: 600px; margin: 0 auto; margin-top: 20px;"></div>
        </section>
        <div id="container4"
            style="min-width: 310px; max-width: 95%; min-height: 600px; margin: 0 auto; margin-top: 20px; margin-bottom: 80px;">
        </div>
        </section>


        <script src="lb/js/bootstrap.min.js"></script>
    </main>
    <script src="javascript/navbar.js"></script>
</body>

</html>