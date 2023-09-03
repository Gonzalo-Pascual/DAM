<?php
require('sesionphp.php');
require 'conexion.php';
mysqli_select_db($conexion, $basededatos);
mysqli_set_charset($conexion, "utf8");
$persona = $_SESSION['id'];
$instrumento = $_GET['id'];
$consulta = "SELECT * FROM carrito WHERE id_persona = $persona AND id_instrumento = $instrumento ";
$resultado = mysqli_query($conexion, $consulta);
$registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
echo $registro ['cantidad'];
if($registro['cantidad'] > 1){
    mysqli_query($conexion, "UPDATE carrito SET cantidad = cantidad-1 WHERE id_persona = $persona AND id_instrumento = $instrumento "); 
}
$scrollPos = $_GET["scrollPos"];
setcookie("scrollPos", $scrollPos, time() + (86400 * 30), "/");
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>