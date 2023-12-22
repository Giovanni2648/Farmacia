<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="bg-black p-2 text-white text-center">Agregar Farmaco</h1>
    <br>
    <div class="container">
        <form action="../../CRUD/venta/insertarDatos.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha">
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Cantidad</label>
            <input type="text" class="form-control" name="cantidad">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input type="text" class="form-control" name="telefono">
        </div>

        <select class="form-select mb-3" name="vendedor">
            <option selected disabled>--Seleccionar vendedor--</option>
            <?php
                include ("../../Config/Conexion.php");

                $sql = $conexion->query("SELECT * FROM vendedor");
                while ($resultado = $sql->fetch_assoc()) {
                    echo "<option value='".$resultado['idvendedor']."'>".$resultado['nombre']."</option>";
                }
            ?>
        </select>

        <select class="form-select mb-3" name="farmaco">
            <option selected disabled>--Seleccionar farmaco--</option>
            <?php
                include ("../../Config/Conexion.php");

                $sql = $conexion->query("SELECT * FROM farmaco");
                while ($resultado = $sql->fetch_assoc()) {
                    echo "<option value='".$resultado['idfarmaco']."'>".$resultado['nombre']."</option>";
                }
            ?>
        </select>

        <select class="form-select mb-3" name="cliente">
            <option selected disabled>--Seleccionar cliente--</option>
            <?php
                include ("../../Config/Conexion.php");

                $sql = $conexion->query("SELECT * FROM cliente");
                while ($resultado = $sql->fetch_assoc()) {
                    echo "<option value='".$resultado['idcliente']."'>".$resultado['nombre']."</option>";
                }
            ?>
        </select>
        <div class="text-center">
            <button type="submit" class="btn btn-danger">Enviar</button>
            <a href="../../Index.php" class="btn btn-dark">Regresar</a>
        </div>
        
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
