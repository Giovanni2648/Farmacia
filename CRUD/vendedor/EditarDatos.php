<?php

    include_once("../../Config/Conexion.php");

    $id = $_POST['Id'];
    $Nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE vendedor SET nombre='$Nombre', direccion='$direccion', telefono='$telefono' WHERE idvendedor=$id";

    if ($resultado = $conexion->query($sql)) {
        header("location:../../Index.php");
    }
