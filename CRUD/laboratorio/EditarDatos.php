<?php

    include_once("../../Config/Conexion.php");

    $id = $_POST['Id'];
    $Nombre = $_POST['Nombre'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE laboratorio SET nombre='$Nombre', direccion='$direccion' WHERE idlaboratorio=$id";

    if ($resultado = $conexion->query($sql)) {
        header("location:../../Index.php");
    }
