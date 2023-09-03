<?php

if (isset($_POST['agregar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $acceso = $_POST['acceso'];
    $direccion = $_POST['direccion'];
    $postal = $_POST['postal'];
    $municipio = $_POST['municipio'];
    $telefono = $_POST['telefono'];
    $nombre_tarjeta = $_POST['nombre_envio'];
    $tipo = $_POST['tipo'];
    $nbancario = $_POST['nbancario'];
    $fnac = $_POST['fnac'];
    $verdad = True;
    $inicio = True;
}

if ($inicio === True) {
    if ($verdad === True) {
        require 'conexion.php';
        mysqli_query($conexion, "INSERT INTO persona(nombre, apellido, correo, clave, fnac, acceso) 
        VALUES ('$nombre', '$apellido', '$correo', '$clave', '$fnac','$acceso')");
        mysqli_query($conexion, "INSERT INTO envio(direccion, postal, municipio, telefono, nombre_tarjeta, nbancario, tipo) 
        VALUES ('$direccion', '$postal', '$municipio', '$telefono', '$nombre_tarjeta', '$nbancario', '$tipo')");
        header('Location: adminpersonas.php');
    } else {
        header("Location:agregarpersona.php");
    }
}
?>