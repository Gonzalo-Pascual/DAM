<?php
session_start();
$contrasena = '';
$usuario = 'root';
$nombreBD = 'riffs';
try {
    $bd = new PDO('mysql:host=localhost;dbname=' . $nombreBD, $usuario, $contrasena);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

if (isset($_SESSION['nombre'])) {

    
} else {
    header('Location: loguearse.php');
}

?>