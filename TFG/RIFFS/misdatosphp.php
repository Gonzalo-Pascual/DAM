<?php
$resultado = null;
$inicio = False;
session_start();
if (!isset($_POST['oculto'])) {
    header('Location: index.php');

}
$basededatos = 'mysql:dbname=riffs;host=127.0.0.1';
$usuario = 'root';
$clave = '';

try {
    $mbd = new PDO($basededatos, $usuario, $clave);
    $mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error al ejecutar', $e->getMessage();
}

$id = $_POST['id'];

if (isset($_POST['editar'])) {  
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $fnac = $_POST['fnac'];
    $direccion = $_POST['direccion'];
    $postal = $_POST['postal'];
    $municipio = $_POST['municipio'];
    $telefono = $_POST['telefono'];
    $nombre_tarjeta = $_POST['nombre_envio'];
    $tipo = $_POST['tipo'];
    $nbancario = $_POST['nbancario'];

    $sql = $mbd->prepare("UPDATE envio SET direccion = ?, postal = ?, municipio = ?, telefono = ?, nombre_tarjeta = ?, tipo = ?, nbancario = ? WHERE id_persona = ?");
    $sql2 = $mbd->prepare("UPDATE persona SET nombre = ?, apellido = ?, correo = ?, fnac = ? WHERE id_persona = ?");
    $resultado = $sql->execute([$direccion, $postal, $municipio, $telefono, $nombre_tarjeta, $tipo, $nbancario, $id]);
    $resultado2 = $sql2->execute([$nombre, $apellido, $correo, $fnac, $id]);
    if ($resultado === TRUE and $resultado2 === TRUE) {
        header('Location:sesion.php');
    } else {
        echo 'Error al editar el registro';
    }
}
if (isset($_POST['clave'])) {
    require "conexion.php";
    mysqli_select_db($conexion, $basededatos);
    mysqli_set_charset($conexion, "utf8");
    $consulta = "SELECT * FROM persona WHERE id_persona = $id";
    $resultado = mysqli_query($conexion, $consulta);}
    $registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    $antigua = $_POST['antigua'];
    $nueva = $_POST['nueva'];
    if($registro["clave"] == $antigua){
        $sql = $mbd->prepare("UPDATE persona SET clave = ? WHERE id_persona = ?");
        $resultado = $sql->execute([$nueva, $id]);
        header('Location:sesion.php');
    }else{
        $_SESSION['mensaje1'] = "La contraseña es incorrecta";
        header('Location:misdatos.php');
        
    }


?>