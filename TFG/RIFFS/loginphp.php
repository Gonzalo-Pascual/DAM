<?php
session_start();
$contrasena = '';
$usuario = 'root';
$nombreBD = 'riffs';
try {
    $bd = new PDO(
        'mysql:host=localhost;dbname=' . $nombreBD,
        $usuario,
        $contrasena
    );
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
$nombre = $_POST['nombre'];
$clave = $_POST['clave'];
$sentencia = $bd->prepare('SELECT * FROM persona WHERE correo = ? and clave = ?;');
$sentencia->execute([$nombre, $clave]);
$datos = $sentencia->fetch(PDO::FETCH_OBJ);
if ($datos === false) {
    $_SESSION['mensaje'] = "El usuario o la contraseña son incorrectos";
    header('Location:loguearse.php');
} else if ($sentencia->rowCount() == 1) {
    if ($datos->acceso == 1) {
        $_SESSION['id'] = $datos->id_persona;
        $_SESSION['nombre'] = $datos->nombre;
        header('Location:sesionadmin.php');
    } else {
        $_SESSION['id'] = $datos->id_persona;
        $_SESSION['nombre'] = $datos->nombre;
        header('Location:sesion.php');
    }
}
?>