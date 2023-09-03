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
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$acceso = $_POST['acceso'];
$fnac = $_POST['fnac'];
$direccion = $_POST['direccion'];
$postal = $_POST['postal'];
$municipio = $_POST['municipio'];
$telefono = $_POST['telefono'];
$nombre_tarjeta = $_POST['nombre_envio'];
$tipo = $_POST['tipo'];
$nbancario = $_POST['bancario'];
$verdad = True;
$inicio = True;



if (isset($_POST['editar'])) {
if ($inicio === True) {
    if ($verdad === True) {
        $sql = $mbd->prepare("UPDATE envio SET direccion = ?, postal = ?, municipio = ?, telefono = ?, nombre_tarjeta = ?, tipo = ?, nbancario = ? WHERE id_persona = ?");
        $sql2 = $mbd->prepare("UPDATE persona SET nombre = ?, apellido = ?, correo = ?, acceso = ?, fnac = ? WHERE id_persona = ?");
        $resultado = $sql->execute([$direccion, $postal, $municipio, $telefono, $nombre_tarjeta, $tipo, $nbancario, $id]);
        $resultado2 = $sql2->execute([$nombre, $apellido, $correo, $acceso, $fnac, $id]);
        if ($resultado === TRUE and $resultado2 === TRUE) {
            header('Location:adminpersonas.php');
        } else {
            echo 'Error al editar el registro';
        }
    }
}
}
if (isset($_POST['eliminar'])) {
    echo $id;
    if ($inicio === True) {
        if ($verdad === True) {
            $sql = $mbd->prepare("DELETE FROM carrito WHERE id_persona = ?");
            $sql2 = $mbd->prepare("DELETE FROM compra WHERE id_persona = ?");
            $sql3 = $mbd->prepare("DELETE FROM envio WHERE id_persona = ?");
            $sql4 = $mbd->prepare("DELETE FROM persona WHERE id_persona = ?");
            $resultado1 = $sql->execute([$id]);
            $resultado2 = $sql2->execute([$id]);
            $resultado3 = $sql3->execute([$id]);
            $resultado4 = $sql4->execute([$id]);
            header('Location:adminpersonas.php');
        }
    }
}

?>