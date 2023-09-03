

</html>
<?php
require('sesionphp.php');
require 'conexion.php';
mysqli_select_db($conexion, $basededatos);
mysqli_set_charset($conexion, "utf8");
$persona = $_SESSION['id'];
$instrumento = $_GET['id'];
$consulta = "SELECT * FROM carrito ";
$resultado = mysqli_query($conexion, $consulta);
$registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
mysqli_query($conexion, "DELETE FROM carrito WHERE id_persona = $persona AND id_instrumento = $instrumento ");
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>