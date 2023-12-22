<?php

    include_once("../../Config/Conexion.php");

    $id = $_POST['Id'];
    $Nombre = $_POST['Nombre'];
    $direccion = $_POST['Direccion'];

    $sql = "UPDATE cliente SET nombre='$Nombre', direccion='$direccion' WHERE idcliente=$id";

    if ($resultado = $conexion->query($sql)) {
        header("location: ../../Index.php");
    }
