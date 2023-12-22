<?php
include ("../../Config/Conexion.php");

$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$sql = "INSERT INTO vendedor(nombre, direccion, telefono) VALUES('$nombre','$direccion', '$telefono')";


$resultado = mysqli_query($conexion, $sql);

if ($resultado === TRUE) {
    header("location:../../Index.php");
} else {
    echo "Datos NO insertados";
}
