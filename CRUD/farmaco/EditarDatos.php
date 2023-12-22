<?php

    include_once("../../Config/Conexion.php");

    $id = $_POST['Id'];
    $Nombre = $_POST['Nombre'];
    $Descripcion = $_POST['Descripcion'];
    $laboratorio = $_POST['laboratorio'];
    $accion = $_POST['accion'];

    $sql = "UPDATE farmaco SET nombre='$Nombre', descripcion='$Descripcion', idaccion='$accion', idlaboratorio='$laboratorio' WHERE idfarmaco=$id";

    if ($resultado = $conexion->query($sql)) {
        header("location:../../Index.php");
    }
