<?php
include ("../../Config/Conexion.php");

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

$sql = "INSERT INTO accion(nombre, descripcion) VALUES('$nombre','$descripcion')";


$resultado = mysqli_query($conexion, $sql);

if ($resultado === TRUE) {
    header("location:../../Index.php");
} else {
    echo "Datos NO insertados";
}
