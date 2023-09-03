<?php

if (isset($_POST['agregar'])) {
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
    
    $inicio = True;
    $verdad = True;

}
$ruta1 = "fotos/" . $foto1;
$ruta2 = "fotos/" . $foto2;
$ruta3 = "fotos/" . $foto3;
$ruta4 = "fotos/" . $foto4;


if ($inicio === True) {
    if ($verdad === True) {
        require 'conexion.php';
        mysqli_query($conexion, "INSERT INTO instrumento(marca, modelo, descripcion, categoria, precio, foto1, foto2, foto3, foto4) 
VALUES ('$marca', '$modelo', '$descripcion', '$categoria', '$precio', '$ruta1', '$ruta2', '$ruta3', '$ruta4')");
        mysqli_query($conexion, "INSERT INTO caracteristica(caracteristica1, caracteristica2, caracteristica3, caracteristica4, caracteristica5, caracteristica6) 
VALUES ('$caracteristica1', '$caracteristica2', '$caracteristica3', '$caracteristica4', '$caracteristica5', '$caracteristica6')");
        header('Location: admininstrumentos.php');
    } else {
        header("Location:admininstrumentos.php");
    } 
}
?>