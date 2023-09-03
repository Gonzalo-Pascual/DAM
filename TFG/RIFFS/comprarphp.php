<?php
$resultado = null;
$inicio = False;
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
$direccion = $_POST['direccion'];
$postal = $_POST['postal'];
$municipio = $_POST['municipio'];
$telefono = $_POST['telefono'];
$nombre_tarjeta = $_POST['nombre_envio'];
$tipo = $_POST['tipo'];
$nbancario = $_POST['nbancario'];
$verdad = True;
$inicio = True;
$fecha = date("Y/m/d");


if ($inicio === True) {
    if ($verdad === True) {
        require "conexion.php";
        $sql = $mbd->prepare("INSERT INTO compra (id_persona, id_instrumento, cantidad, fecha, direccion, postal, municipio, telefono, nombre_envio, tipo, nbancario)
        SELECT id_persona, id_instrumento, cantidad, NOW(), ?, ?, ?, ?, ?, ?, ?
        FROM carrito
        WHERE id_persona = ?");
        $resultado = $sql->execute([$direccion, $postal, $municipio, $telefono, $nombre_tarjeta, $tipo, $nbancario, $id]);
        mysqli_query($conexion, "DELETE FROM carrito WHERE id_persona = $id;");

        $sql2 = $mbd->prepare("UPDATE envio SET direccion = ?, postal = ?, municipio = ?, telefono = ?, nombre_tarjeta = ?, tipo = ?, nbancario = ? WHERE id_persona = ?");
        $resultado2 = $sql2->execute([$direccion, $postal, $municipio, $telefono, $nombre_tarjeta, $tipo, $nbancario, $id]);
        if ($resultado === TRUE) {
            header('Location:final.php');
        } else {
            echo 'Error al editar el registro';
        }

    }
}
?>