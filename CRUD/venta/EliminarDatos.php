<?php
    include ("../../Config/Conexion.php");

    $Id = $_GET['Id'];
    $sql = "DELETE FROM venta WHERE idventa ='$Id'";

    $query = mysqli_query($conexion,$sql);
    if ($query === TRUE) {
        header("Location: ../../Index.php");
    }

?>