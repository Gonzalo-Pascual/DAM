<?php
$usuario = "root";
$contraseña= "";
$servidor = "localhost";
$basededatos = "riffs";
$conexion = mysqli_connect($servidor, $usuario, $contraseña) or die("No se ha podido encontrar la base de datos");
$db = mysqli_select_db($conexion, $basededatos) or die("No se ha podido encontrar la base de datos");
?>