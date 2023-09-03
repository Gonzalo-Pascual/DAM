<?php
require('sesionphp.php');
require 'conexion.php';

$validar = true;

mysqli_select_db($conexion, $basededatos);
mysqli_set_charset($conexion, "utf8");

$consulta = "SELECT * FROM favorito WHERE id_persona = '{$_SESSION['id']}' AND id_instrumento = '{$_GET['id']}'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    $validar = false;
}

if ($validar) {
    $consulta = "SELECT id_persona FROM persona WHERE id_persona = '{$_SESSION['id']}' ";
    $resultado = mysqli_query($conexion, $consulta);
    $registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    $persona = $registro["id_persona"];
    $id_instrumento = $_GET['id'];
    mysqli_query($conexion, "INSERT INTO favorito(id_instrumento, id_persona) 
    VALUES ($id_instrumento, '$persona')");
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>