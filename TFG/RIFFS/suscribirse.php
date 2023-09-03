<?php

if (isset($_POST['enviar'])) {
    $correo = $_POST['correo'];
}
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$basededatos = "riffs";
$conexion = mysqli_connect($servidor, $usuario, $contraseña) or die("No se ha podido encontrar la base de datos");
$db = mysqli_select_db($conexion, $basededatos) or die("No se ha podido encontrar la base de datos");
$query = "SELECT correo FROM subscripciones WHERE correo = '$correo'";
$resultado = mysqli_query($conexion, $query);

require 'conexion.php';

if (mysqli_num_rows($resultado) == 0) {
    mysqli_query($conexion, "INSERT INTO subscripciones(correo) VALUES ('$correo')");
    header("Location: " . $_SERVER['HTTP_REFERER']);
}else{
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
?>