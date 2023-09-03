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
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$caracteristica1 = $_POST['caracteristica1'];
$caracteristica2 = $_POST['caracteristica2'];
$caracteristica3 = $_POST['caracteristica3'];
$caracteristica4 = $_POST['caracteristica4'];
$caracteristica5 = $_POST['caracteristica5'];
$caracteristica6 = $_POST['caracteristica6'];
$foto1 = $_FILES['foto1']['name'];
$foto2 = $_FILES['foto2']['name'];
$foto3 = $_FILES['foto3']['name'];
$foto4 = $_FILES['foto4']['name'];
$verdad = True;
$inicio = True;


if (isset($_POST['editar'])) {


    if ($inicio === True) {
        if ($verdad === True) {
            $ruta1 = "fotos/" . $foto1;
            $ruta2 = "fotos/" . $foto2;
            $ruta3 = "fotos/" . $foto3;
            $ruta4 = "fotos/" . $foto4;
            $sql = $mbd->prepare("UPDATE caracteristica SET caracteristica1 = ?, caracteristica2 = ?, caracteristica3 = ?, caracteristica4 = ?, caracteristica5 = ?, caracteristica6 = ? WHERE id_caracteristica = ?");
            $sql2 = $mbd->prepare("UPDATE instrumento SET marca = ?, modelo = ?, descripcion = ?, categoria = ?, precio = ?  WHERE id_instrumento = ?");
            $resultado = $sql->execute([$caracteristica1, $caracteristica2, $caracteristica3, $caracteristica4, $caracteristica5, $caracteristica6, $id]);
            $resultado2 = $sql2->execute([$marca, $modelo, $descripcion, $categoria, $precio, $id]);
            if (!empty($foto1)) {
                $sql3 = $mbd->prepare("UPDATE instrumento SET foto1 = ? WHERE id_instrumento = ?");
                $resultado3 = $sql3->execute([$ruta1, $id]);
            }
            if (!empty($foto2)) {
                $sql4 = $mbd->prepare("UPDATE instrumento SET foto2 = ? WHERE id_instrumento = ?");
                $resultado4 = $sql4->execute([$ruta2, $id]);
            }
            if (!empty($foto3)) {
                $sql5 = $mbd->prepare("UPDATE instrumento SET foto3 = ? WHERE id_instrumento = ?");
                $resultado5 = $sql5->execute([$ruta3, $id]);
            }
            if (!empty($foto4)) {
                $sql6 = $mbd->prepare("UPDATE instrumento SET foto4 = ? WHERE id_instrumento = ?");
                $resultado6 = $sql6->execute([$ruta4, $id]);
            }






            if ($resultado === TRUE and $resultado2 === TRUE) {
                header('Location:admininstrumentos.php');
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
            $sql = $mbd->prepare("DELETE FROM carrito WHERE id_instrumento = ?");
            $sql2 = $mbd->prepare("DELETE FROM compra WHERE id_instrumento = ?");
            $sql3 = $mbd->prepare("DELETE FROM caracteristica WHERE id_caracteristica = ?");
            $sql4 = $mbd->prepare("DELETE FROM instrumento WHERE id_instrumento = ?");
            $resultado1 = $sql->execute([$id]);
            $resultado2 = $sql2->execute([$id]);
            $resultado3 = $sql3->execute([$id]);
            $resultado4 = $sql4->execute([$id]);
            header('Location:admininstrumentos.php');
        }
    }

}
?>