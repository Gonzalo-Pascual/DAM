<?php
require_once 'fpdf.php';
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetTitle('Riffs');
        // Logo
        $this->Image('img/logonegro.png', 25, 15, 33);
        // Arial bold 15
        $this->SetFont('Arial', '', 12);
        $this->Cell(175, 25, date('d/m/Y'), 0, 0, 'R');
        $this->Ln(30);
    }

    // Pie de página
    function Footer()
    {
        // Agregar favicon

        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        $this->SetX(15);
        // Arial italic 8
        $this->SetFont('Arial', '', 12);
        // Número de página
        $this->Cell(0, 10, $this->PageNo(), 0, 0, 'R');
    }
}

$conexion = mysqli_connect("localhost", "root", "", "riffs");
$sql = "SELECT i.id_instrumento, IFNULL(SUM(c.cantidad), 0) as cantidad_total
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
}

$pdf = new PDF();
$pdf->AliasNbPages();

// Primera página
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->SetFont('Arial', 'B', 14); // Fuente en negrita, tamaño 14
$pdf->Cell(15); // Desplazamiento
$pdf->Cell(0, 10, 'Ventas', 0, 1, 'L');
$pdf->SetLineWidth(0.7); // Grosor de la línea horizontal de separación de filas
$pdf->SetDrawColor(0, 118, 99); // Establecer el color de la línea a rojo (R: 255, G: 0, B: 0)
$lineY = $pdf->GetY(); // Posición Y actual
$lineX = $pdf->GetX(); // Posición X actual
$lineWidth = 160; // Anchura deseada para la línea horizontal
$pdf->Line($lineX + 30 / 2, $lineY, $lineX + 30 / 2 + $lineWidth, $lineY); // Línea horizontal centrada
$pdf->SetFont('Arial', '', 10);
$pdf->SetDrawColor(0, 0, 0);
$pdf->Ln(2);
$pdf->Cell(20); // Desplazamiento
$pdf->Cell(40, 10, 'Id', 0, 0, 'L', 0);
$pdf->Cell(95, 10, 'Nombre', 0, 0, 'L', 0);
$pdf->Cell(40, 10, 'Cantidad', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetLineWidth(0.2); // Grosor de la línea horizontal de separación de filas
$lineY = $pdf->GetY(); // Posición Y actual
$lineX = $pdf->GetX(); // Posición X actual
$pdf->SetLineWidth(0.1); // Grosor de la línea horizontal
$pdf->Line($lineX + 30 / 2, $lineY, $lineX + 30 / 2 + 160, $lineY);

foreach ($lista_ventas as $producto) {
    $id_instrumento = $producto['id_instrumento'];
    $cantidad_total = $producto['cantidad_total'];
    $sql2 = "SELECT * FROM instrumento where id_instrumento = $id_instrumento";
    $resultado = mysqli_query($conexion, $sql2);
    $registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

    $pdf->Cell(20); // Desplazamiento
    $pdf->Cell(40, 10, str_replace("\n", "_", $id_instrumento), 0, 0, 'L', 0);
    $pdf->Cell(95, 10, str_replace("\n", "_", utf8_decode($registro["marca"] . ' ' . $registro["modelo"])), 0, 0, 'L', 0);
    $pdf->Cell(40, 10, str_replace("\n", "_", $cantidad_total), 0, 0, 'L', 0);
    $pdf->Ln();
}

$pdf->SetLineWidth(0.2); // Grosor de la línea horizontal de separación de filas
$lineY = $pdf->GetY(); // Posición Y actual
$lineX = $pdf->GetX(); // Posición X actual
$pdf->SetLineWidth(0.1); // Grosor de la línea horizontal
$pdf->Line($lineX + 30 / 2, $lineY, $lineX + 30 / 2 + 160, $lineY);

// Segunda página
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->SetFont('Arial', 'B', 14); // Fuente en negrita, tamaño 14
$pdf->Cell(15); // Desplazamiento
$pdf->Cell(0, 10, 'Favoritos', 0, 1, 'L');
$pdf->SetLineWidth(0.7); // Grosor de la línea horizontal de separación de filas
$pdf->SetDrawColor(0, 118, 99); // Establecer el color de la línea a rojo (R: 255, G: 0, B: 0)
$lineY = $pdf->GetY(); // Posición Y actual
$lineX = $pdf->GetX(); // Posición X actual
$lineWidth = 160; // Anchura deseada para la línea horizontal
$pdf->Line($lineX + 30 / 2, $lineY, $lineX + 30 / 2 + $lineWidth, $lineY); // Línea horizontal centrada
$pdf->SetFont('Arial', '', 10);
$pdf->SetDrawColor(0, 0, 0);
$pdf->Ln(2);
$pdf->Cell(20); // Desplazamiento
$pdf->Cell(40, 10, 'Id', 0, 0, 'L', 0);
$pdf->Cell(95, 10, 'Nombre', 0, 0, 'L', 0);
$pdf->Cell(40, 10, 'Cantidad', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetLineWidth(0.2); // Grosor de la línea horizontal de separación de filas
$lineY = $pdf->GetY(); // Posición Y actual
$lineX = $pdf->GetX(); // Posición X actual
$pdf->SetLineWidth(0.1); // Grosor de la línea horizontal
$pdf->Line($lineX + 30 / 2, $lineY, $lineX + 30 / 2 + 160, $lineY);

$sql3 = "SELECT * FROM (
    SELECT f.id_instrumento, COUNT(f.id_instrumento) as cantidad FROM favorito f GROUP BY f.id_instrumento
    UNION
    SELECT i.id_instrumento, 0 as cantidad FROM instrumento i
    WHERE i.id_instrumento NOT IN (SELECT id_instrumento FROM favorito)
) as subconsulta
ORDER BY cantidad DESC";

$result = mysqli_query($conexion, $sql3);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id_instrumento = $row['id_instrumento'];
        $cantidad = $row['cantidad'];

        $sql2 = "SELECT * FROM instrumento WHERE id_instrumento = $id_instrumento";
        $resultado = mysqli_query($conexion, $sql2);
        $registro = mysqli_fetch_assoc($resultado);

        $pdf->Cell(20); // Desplazamiento
        $pdf->Cell(40, 10, str_replace("\n", "_", $id_instrumento), 0, 0, 'L', 0);
        $pdf->Cell(95, 10, str_replace("\n", "_", utf8_decode($registro["marca"] . ' ' . $registro["modelo"])), 0, 0, 'L', 0);
        $pdf->Cell(40, 10, str_replace("\n", "_", $cantidad), 0, 0, 'L', 0);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(20); // Desplazamiento
    $pdf->Cell(0, 10, 'No se encontraron resultados.', 0, 0, 'L', 0);
}

$pdf->SetLineWidth(0.2); // Grosor de la línea horizontal de separación de filas
$lineY = $pdf->GetY(); // Posición Y actual
$lineX = $pdf->GetX(); // Posición X actual
$pdf->SetLineWidth(0.1); // Grosor de la línea horizontal
$pdf->Line($lineX + 30 / 2, $lineY, $lineX + 30 / 2 + 160, $lineY);

// Tercera página
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->SetFont('Arial', 'B', 14); // Fuente en negrita, tamaño 14
$pdf->Cell(15); // Desplazamiento
$pdf->Cell(0, 10, 'Visualizaciones', 0, 1, 'L');
$pdf->SetLineWidth(0.7); // Grosor de la línea horizontal de separación de filas
$pdf->SetDrawColor(0, 118, 99); // Establecer el color de la línea a rojo (R: 255, G: 0, B: 0)
$lineY = $pdf->GetY(); // Posición Y actual
$lineX = $pdf->GetX(); // Posición X actual
$lineWidth = 160; // Anchura deseada para la línea horizontal
$pdf->Line($lineX + 30 / 2, $lineY, $lineX + 30 / 2 + $lineWidth, $lineY); // Línea horizontal centrada
$pdf->SetFont('Arial', '', 10);
$pdf->SetDrawColor(0, 0, 0);
$pdf->Ln(2);
$pdf->Cell(20); // Desplazamiento
$pdf->Cell(40, 10, 'Id', 0, 0, 'L', 0);
$pdf->Cell(95, 10, 'Nombre', 0, 0, 'L', 0);
$pdf->Cell(40, 10, 'Cantidad', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetLineWidth(0.2); // Grosor de la línea horizontal de separación de filas
$lineY = $pdf->GetY(); // Posición Y actual
$lineX = $pdf->GetX(); // Posición X actual
$pdf->SetLineWidth(0.1); // Grosor de la línea horizontal
$pdf->Line($lineX + 30 / 2, $lineY, $lineX + 30 / 2 + 160, $lineY);

$sql4 = "SELECT * FROM `instrumento` ORDER BY vistas DESC";
$resultado3 = mysqli_query($conexion, $sql4);

if (mysqli_num_rows($resultado3) > 0) {
    while ($row = mysqli_fetch_assoc($resultado3)) {
        $id_instrumento = $row['id_instrumento'];
        $cantidad = $row['vistas'];

        $sql2 = "SELECT * FROM instrumento WHERE id_instrumento = $id_instrumento";
        $resultado = mysqli_query($conexion, $sql2);
        $registro = mysqli_fetch_assoc($resultado);

        $pdf->Cell(20); // Desplazamiento
        $pdf->Cell(40, 10, str_replace("\n", "_", $id_instrumento), 0, 0, 'L', 0);
        $pdf->Cell(95, 10, str_replace("\n", "_", utf8_decode($registro["marca"] . ' ' . $registro["modelo"])), 0, 0, 'L', 0);
        $pdf->Cell(40, 10, str_replace("\n", "_", $cantidad), 0, 0, 'L', 0);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(20); // Desplazamiento
    $pdf->Cell(0, 10, 'No se encontraron resultados.', 0, 0, 'L', 0);
}

$pdf->SetLineWidth(0.2);
$lineY = $pdf->GetY();
$lineX = $pdf->GetX();
$pdf->SetLineWidth(0.1);
$pdf->Line($lineX + 30 / 2, $lineY, $lineX + 30 / 2 + 160, $lineY);
// Cuarta página
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->SetFont('Arial', 'B', 14); // Fuente en negrita, tamaño 14

$pdf->Cell(15); // Desplazamiento
$pdf->Cell(0, 10, 'Ventas / Ganancias por mes', 0, 1, 'L');
$pdf->SetLineWidth(0.7); // Grosor de la línea horizontal de separación de filas
$pdf->SetDrawColor(0, 118, 99); // Establecer el color de la línea a rojo (R: 255, G: 0, B: 0)
$lineY = $pdf->GetY(); // Posición Y actual
$lineX = $pdf->GetX(); // Posición X actual
$lineWidth = 160; // Anchura deseada para la línea horizontal
$pdf->Line($lineX + 30 / 2, $lineY, $lineX + 30 / 2 + $lineWidth, $lineY); // Línea horizontal centrada
$pdf->SetFont('Arial', '', 0);
$pdf->SetDrawColor(0, 0, 0);
$pdf->Ln(1);
$currency = iconv("UTF-8", "ISO-8859-1//TRANSLIT", "€");

$query = "SELECT i.id_instrumento, IFNULL(SUM(c.cantidad), 0) as cantidad_total, 
    DATE_FORMAT(c.fecha, '%Y-%m') as mes, SUM(c.cantidad) as total_ventas_mes, 
    ROUND(SUM(c.cantidad * i.precio),1) as precio_total_mes
    FROM instrumento i
    LEFT JOIN compra c ON i.id_instrumento = c.id_instrumento
    WHERE c.fecha >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
    GROUP BY i.id_instrumento, mes
    ORDER BY mes DESC, id_instrumento ASC";

$resultado = mysqli_query($conexion, $query);

$lista_ventas_mes = array();
$total_ventas_mes = array();
$total_ganancias_mes = array();

while ($row = mysqli_fetch_assoc($resultado)) {
    $id_instrumento = $row['id_instrumento'];
    $cantidad_total = $row['cantidad_total'];
    $mes = $row['mes'];
    $total_ventas_mes[$mes] = (isset($total_ventas_mes[$mes])) ? $total_ventas_mes[$mes] + $row['total_ventas_mes'] : $row['total_ventas_mes'];
    $precio_total = $row['precio_total_mes'];
    $total_ganancias_mes[$mes] = (isset($total_ganancias_mes[$mes])) ? $total_ganancias_mes[$mes] + $precio_total : $precio_total;
    $lista_ventas_mes[$mes][] = array(
        'id_instrumento' => $id_instrumento,
        'cantidad_total' => $cantidad_total,
        'precio_total' => $precio_total
    );
}

foreach ($lista_ventas_mes as $mes => $productos) {
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(15); // Desplazamiento
    $pdf->SetFillColor(229, 242, 241); // Establecer el color de fondo (RGB)
    $pdf->Cell(30, 10, date('F Y', strtotime($mes . '-01')), 0, 0, 'L', 1);
    $pdf->Cell(75, 10, '', 0, 0, 'L', 1); // Celda vacía con color de fondo
    $pdf->Cell(30, 10, $total_ventas_mes[$mes], 0, 0, 'L', 1);
    $pdf->Cell(25, 10, $total_ganancias_mes[$mes] . ' ' . $currency, 0, 1, 'L', 1);
    $pdf->SetLineWidth(0.2); // Grosor de la línea horizontal de separación de filas
    $lineY = $pdf->GetY(); // Posición Y actual
    $lineX = $pdf->GetX(); // Posición X actual
    $pdf->SetLineWidth(0.1); // Grosor de la línea horizontal
    $pdf->Line($lineX + 30 / 2, $lineY, $lineX + 30 / 2 + 160, $lineY);
    $pdf->SetFont('Arial', '', 10);
    foreach ($productos as $producto) {
        $id_instrumento = $producto['id_instrumento'];
        $cantidad_total = $producto['cantidad_total'];
        $precio_total = $producto['precio_total'];
        $sql2 = "SELECT * FROM instrumento WHERE id_instrumento = $id_instrumento ";
        $resultado = mysqli_query($conexion, $sql2);
        $registro = mysqli_fetch_assoc($resultado);
        $pdf->Cell(20); // Desplazamiento
        $pdf->Cell(30, 10, $id_instrumento, 0, 0, 'L', 0);
        $pdf->Cell(70, 10, $registro["marca"] . ' ' . $registro["modelo"], 0, 0, 'L', 0);
        $pdf->Cell(30, 10, $cantidad_total, 0, 0, 'L', 0);
        $pdf->Cell(40, 10, $precio_total . ' ' . $currency, 0, 0, 'L', 0);
        $pdf->Ln();
    }

    $pdf->Ln(4);
}
$pdf->Output();