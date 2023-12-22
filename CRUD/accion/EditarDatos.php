<?php

    include_once("../../Config/Conexion.php");

    $id = $_POST['Id'];
    $Nombre = $_POST['Nombre'];
    $Descripcion = $_POST['Descripcion'];

    $sql = "UPDATE accion SET nombre='$Nombre', descripcion='$Descripcion' WHERE idaccion=$id";

    if ($resultado = $conexion->query($sql)) {
        header("location:../../Index.php");
    }
