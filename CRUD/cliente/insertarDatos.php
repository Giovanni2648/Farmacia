<?php
include ("../../Config/Conexion.php");

$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];

$sql = "INSERT INTO cliente(nombre, direccion) VALUES('$nombre','$direccion')";


$resultado = mysqli_query($conexion, $sql);

if ($resultado === TRUE) {
    header("location:../../Index.php");
} else {
    echo "Datos NO insertados";
}
