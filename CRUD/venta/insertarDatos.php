<?php
include ("../../Config/Conexion.php");

$fecha = $_POST['fecha'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$telefono = $_POST['telefono'];
$vendedor = $_POST['vendedor'];
$farmaco = $_POST['farmaco'];
$cliente = $_POST['cliente'];

$sql = "INSERT INTO venta(fecha, precio, cantidad, telefono, idvendedor, idfarmaco, idcliente) VALUES('$fecha','$precio', '$cantidad', '$telefono','$vendedor', '$farmaco', '$cliente')";


$resultado = mysqli_query($conexion, $sql);

if ($resultado === TRUE) {
    header("location:../../Index.php");
} else {
    echo "Datos NO insertados";
}
