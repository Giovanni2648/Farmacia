<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1>Impresion de Planillas</h1>
      
<form action="imprimirplanilla.php" method="POST">
    <?php
        include("../../Config/Conexion.php");
        $sql="SELECT * from venta";
        $resultado=mysqli_query($conexion,$sql);
    ?>
    
        <select name="ventas" class="form-control">
         
          <?php 
          
          while($row = mysqli_fetch_assoc($resultado))
          {
            echo '<option value="'.$row['idventa'].'">'.$row['fecha'].'</option>';

          } 
            ?>
        </select>
        <br>

        <button type="submit" class="btn btn-primary">Imprimir</button>
        <a href="../../Index.html" class="btn btn-dark">Volver</a>
        
        </form> 
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
</body>
</html>