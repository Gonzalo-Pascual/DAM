<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: loguearse.php');
    exit();
}

require "conexion.php";
mysqli_select_db($conexion, $basededatos);
mysqli_set_charset($conexion, "utf8");
$consulta = "SELECT * FROM persona WHERE id_persona=" . $_SESSION['id'];
$resultado = mysqli_query($conexion, $consulta);
$registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

if ($registro["acceso"] == 1 && basename($_SERVER['PHP_SELF']) == 'admininstrumentos.php') {
    if (!isset($_SESSION['nombre'])) {
        header('Location: sesionadmin.php');
        exit();
    }
} elseif ($registro["acceso"] == 1 && basename($_SERVER['PHP_SELF']) == 'adminpersonas.php') {
    if (!isset($_SESSION['nombre'])) {
        header('Location: sesionadmin.php');
        exit();
    }
} elseif ($registro["acceso"] == 1 && basename($_SERVER['PHP_SELF']) == 'estadisticas.php') {
    if (!isset($_SESSION['nombre'])) {
        header('Location: sesionadmin.php');
        exit();
    }
} elseif ($registro["acceso"] == 1 && basename($_SERVER['PHP_SELF']) == 'graficos.php') {
    if (!isset($_SESSION['nombre'])) {
        header('Location: sesionadmin.php');
        exit();
    }
} elseif ($registro["acceso"] == 1 && basename($_SERVER['PHP_SELF']) == 'agregarinstrumento.php') {
    if (!isset($_SESSION['nombre'])) {
        header('Location: sesionadmin.php');
        exit();
    }
} elseif ($registro["acceso"] == 1 && basename($_SERVER['PHP_SELF']) == 'agregarpersona.php') {
    if (!isset($_SESSION['nombre'])) {
        header('Location: sesionadmin.php');
        exit();
    }
} elseif ($registro["acceso"] == 1 && basename($_SERVER['PHP_SELF']) == 'editarinstrumento.php') {
    if (!isset($_SESSION['nombre'])) {
        header('Location: sesionadmin.php');
        exit();
    }
} elseif ($registro["acceso"] == 1 && basename($_SERVER['PHP_SELF']) == 'editarpersona.php') {
    if (!isset($_SESSION['nombre'])) {
        header('Location: sesionadmin.php');
        exit();
    }
} elseif ($registro["acceso"] == 1 && basename($_SERVER['PHP_SELF']) != 'sesionadmin.php') {
    header('Location: sesionadmin.php');
    exit();
} elseif ($registro["acceso"] != 1 && basename($_SERVER['PHP_SELF']) != 'sesion.php') {
    header('Location: sesion.php');
    exit();
}
?>