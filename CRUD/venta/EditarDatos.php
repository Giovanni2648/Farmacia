<?php

    include_once("../../Config/Conexion.php");
    $id = $_POST['Id'];
    $fecha = $_POST['fecha'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $telefono = $_POST['telefono'];
    $vendedor = $_POST['vendedor'];
    $farmaco = $_POST['farmaco'];
    $cliente = $_POST['cliente'];

    $sql = "UPDATE venta SET fecha='$fecha', precio='$precio', cantidad='$cantidad', telefono='$telefono', idvendedor='$vendedor', idfarmaco='$farmaco', idcliente='$cliente' WHERE idventa=$id";

    if ($resultado = $conexion->query($sql)) {
        header("location:../../Index.php");
    }
