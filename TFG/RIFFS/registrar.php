<?php
$inicio = False;
if (isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
}

$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$basededatos = "riffs";
$conexion = mysqli_connect($servidor, $usuario, $contraseña) or die("No se ha podido encontrar la base de datos");
$db = mysqli_select_db($conexion, $basededatos) or die("No se ha podido encontrar la base de datos");

$query = "SELECT correo FROM persona WHERE correo = '$correo'";
$resultado = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultado) > 0) {
    // Si hay resultados, redirigir a cuenta.php y establecer la variable de sesión
    session_start();
    $_SESSION['mensaje'] = "Esta cuenta ya existe";
    header('Location: cuenta.php');
} else {
    // Si no hay resultados, se puede insertar el registro

    mysqli_query($conexion, "INSERT INTO persona(nombre, apellido, correo, clave, acceso) 
                VALUES ('$nombre', '$apellido', '$correo', '$clave', 0)");
    mysqli_query($conexion, "INSERT INTO envio(direccion) VALUES ('')");
    header('Location: loguearse.php');

}

?>