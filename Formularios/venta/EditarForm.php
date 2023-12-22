<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center" style="background-color: black; color:white; border-radius: 5px;">Editar Accion</h1>
    <br>
    <form class="container" action="../../CRUD/venta/EditarDatos.php" method="POST">
        <?php
            include ('../../Config/Conexion.php');

            $sql = "SELECT * FROM venta WHERE idventa =".$_GET['Id'];
            $resultado = $conexion->query($sql);

            $row = $resultado->fetch_assoc();
        ?>

        <input type="Hidden" class="form-control" name="Id" value="<?php echo $row['idventa']; ?>">

        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="datetime" class="form-control" name="fecha" value="<?php echo $row['fecha']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" value="<?php echo $row['precio']; ?>">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Cantidad</label>
            <input type="text" class="form-control" name="cantidad" value="<?php echo $row['cantidad']; ?>">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono']; ?>">
        </div>
        <label for="">Vendedor</label>
        <select class="form-select mb-3" name="vendedor">
            <option selected disabled>--Seleccionar vendedor--</option>
            <?php
                include ("../../Config/Conexion.php");

                $sql1 = $conexion->query("SELECT * FROM vendedor WHERE idvendedor=".$row['idvendedor']);
                $resultado1 = $sql1->fetch_assoc();
                echo "<option selected value='".$resultado1['idvendedor']."'>".$resultado1['nombre']."</option>";
                
                $sql2 = $conexion->query("SELECT * FROM vendedor");
                while ($resultado2 = $sql2->fetch_assoc()) {
                    echo "<option value='".$resultado2['idvendedor']."'>".$resultado2['nombre']."</option>";
                }
            ?>
        </select>
        <label for="">Farmaco</label>
        <select class="form-select mb-3" name="farmaco">
            <option selected disabled>--Seleccionar accion--</option>
            <?php
                include ("../../Config/Conexion.php");

                $sql1 = $conexion->query("SELECT * FROM farmaco WHERE idfarmaco=".$row['idfarmaco']);
                $resultado1 = $sql1->fetch_assoc();
                echo "<option selected value='".$resultado1['idfarmaco']."'>".$resultado1['nombre']."</option>";
                
                $sql2 = $conexion->query("SELECT * FROM farmaco");
                while ($resultado2 = $sql2->fetch_assoc()) {
                    echo "<option value='".$resultado2['idfarmaco']."'>".$resultado2['nombre']."</option>";
                }
            ?>
        </select>
        <label for="">cliente</label>
        <select class="form-select mb-3" name="cliente">
            <option selected disabled>--Seleccionar accion--</option>
            <?php
                include ("../../Config/Conexion.php");

                $sql1 = $conexion->query("SELECT * FROM cliente WHERE idcliente=".$row['idcliente']);
                $resultado1 = $sql1->fetch_assoc();
                echo "<option selected value='".$resultado1['idcliente']."'>".$resultado1['nombre']."</option>";
                
                $sql2 = $conexion->query("SELECT * FROM cliente");
                while ($resultado2 = $sql2->fetch_assoc()) {
                    echo "<option value='".$resultado2['idcliente']."'>".$resultado2['nombre']."</option>";
                }
            ?>
        </select>
        
        <div class="text-center">
            <button type="submit" class="btn btn-danger">Agregar</button>
            <a href="../../Index.php" class="btn btn-dark">Regresar</a>
        </div>
    </form>

</body>