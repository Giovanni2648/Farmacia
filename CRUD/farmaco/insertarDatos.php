<?php
include ("../../Config/Conexion.php");

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$accion = $_POST['accion'];
$laboratorio = $_POST['laboratorio'];

$sql = "INSERT INTO farmaco(nombre, descripcion, idaccion, idlaboratorio) VALUES('$nombre','$descripcion','$accion', '$laboratorio')";


$resultado = mysqli_query($conexion, $sql);

if ($resultado === TRUE) {
    header("location:../../Index.php");
} else {
    echo "Datos NO insertados";
}
