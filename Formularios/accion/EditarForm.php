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
    <form class="container" action="../../CRUD/accion/EditarDatos.php" method="POST">
        <?php
            include ('../../Config/Conexion.php');

            $sql = "SELECT * FROM accion WHERE idaccion =".$_GET['Id'];
            $resultado = $conexion->query($sql);

            $row = $resultado->fetch_assoc();
        ?>

        <input type="Hidden" class="form-control" name="Id" value="<?php echo $row['idaccion']; ?>">

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="Nombre" value="<?php echo $row['nombre']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="Descripcion" value="<?php echo $row['descripcion']; ?>">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-danger">Agregar</button>
            <a href="../../Index.php" class="btn btn-dark">Regresar</a>
        </div>
    </form>

</body>