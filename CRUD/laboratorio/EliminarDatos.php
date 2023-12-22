<?php
    include ("../../Config/Conexion.php");

    $Id = $_GET['Id'];
    $sql = "DELETE FROM laboratorio WHERE idlaboratorio ='$Id'";

    $query = mysqli_query($conexion,$sql);
    if ($query === TRUE) {
        header("Location: ../../Index.php");
    }

?>