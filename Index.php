<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Farmacia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php
        session_start();

        // Verifica si el usuario ha iniciado sesión
        if (!isset($_SESSION["telefono"])) {
            header("Location: login/login.html"); // Redirige a la página de inicio de sesión
            exit();
        }
    ?>
    <nav class="navbar navbar-dark bg-dark" aria-label="First navbar example">
        <a class="navbar-brand" href="#">Farmacia</a>
        <a class="nav-item bg-dark text-light" href="cerrar_sesion.php">Cerrar Sesión</a>
    </nav>

    <div class="accion">
        <div class="container">
            <div class="row align-items-center" style="background-color: black; color:white; border-radius: 5px;">
                <div class="col-4">
                    
                </div>
                <div class="col-4">
                    <h1 class="text-center">Accion</h1>
                      
                </div>

                <div class="col-4 text-right">
                    
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("Config/Conexion.php");

                    $sql = $conexion->query("SELECT * FROM accion");

                    while ($resultado = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <th scope="row"><?php echo $resultado['idaccion']?></th>
                            <th scope="row"><?php echo $resultado['nombre']?></th>
                            <th scope="row"><?php echo $resultado['descripcion']?></th>
                            <th>
                                <a href="Formularios/accion/EditarForm.php?Id=<?php echo $resultado['idaccion']?>" class="btn btn-warning">Editar</a>
                                <a href="CRUD/accion/EliminarDatos.php?Id=<?php echo $resultado['idaccion']?>" class="btn btn-danger">Eliminar</a>
                            </th>
                        </tr>

                    <?php
                    }
                    ?>


                </tbody>
            </table>
            <div class="container">
                <a href="Formularios/accion/AgregarForm.php" class="btn btn-success">Agregar accion</a>
            </div>
        </div>
    </div>

    <div class="laboratorio">
        <div class="container">
            <h1 class="text-center" style="background-color: black; color:white; border-radius: 5px;">Laboratorio</h1>
        </div>
        <br>
        <div class="container">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("Config/Conexion.php");

                    $sql = $conexion->query("SELECT * FROM laboratorio");

                    while ($resultado = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <th scope="row"><?php echo $resultado['idlaboratorio']?></th>
                            <th scope="row"><?php echo $resultado['nombre']?></th>
                            <th scope="row"><?php echo $resultado['direccion']?></th>
                            <th>
                                <a href="Formularios/laboratorio/EditarForm.php?Id=<?php echo $resultado['idlaboratorio']?>" class="btn btn-warning">Editar</a>
                                <a href="CRUD/laboratorio/EliminarDatos.php?Id=<?php echo $resultado['idlaboratorio']?>" class="btn btn-danger">Eliminar</a>
                            </th>
                        </tr>

                    <?php
                    }
                    ?>


                </tbody>
            </table>
            <div class="container">
                <a href="Formularios/laboratorio/AgregarForm.php" class="btn btn-success">Agregar laboratorio</a>
            </div>
        </div>
    </div>

    <div class="farmaco">   
        <div class="container">
            <div class="row align-items-center" style="background-color: black; color:white; border-radius: 5px;">    
                <div class="col-4">
                      
                </div>

                <div class="col-4">
                    <h1 class="text-center">Fármaco</h1>
                </div>
                
                <div class="col-4">
                        <a href="/CRUD/farmaco/imprimir.php" class="btn btn-warning"><img src="printer.svg" style="height: 20px;">Imprimir</a>  
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Accion</th>
                        <th scope="col">Laboratorio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("Config/Conexion.php");

                    $sql = $conexion->query("SELECT farmaco.idfarmaco, farmaco.nombre AS farmaco_nombre, farmaco.descripcion, 
                    accion.nombre AS accion_nombre, laboratorio.nombre AS laboratorio_nombre
                    FROM farmaco
                    LEFT JOIN accion ON farmaco.idaccion = accion.idaccion
                    LEFT JOIN laboratorio ON farmaco.idlaboratorio = laboratorio.idlaboratorio
             ");

                    while ($resultado = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <th scope="row"><?php echo $resultado['idfarmaco']?></th>
                            <th scope="row"><?php echo $resultado['farmaco_nombre']?></th>
                            <th scope="row"><?php echo $resultado['descripcion']?></th>
                            <th scope="row"><?php echo $resultado['accion_nombre']?></th>
                            <th scope="row"><?php echo $resultado['laboratorio_nombre']?></th>
                            <th>
                                <a href="Formularios/farmaco/EditarForm.php?Id=<?php echo $resultado['idfarmaco']?>" class="btn btn-warning">Editar</a>
                                <a href="CRUD/farmaco/EliminarDatos_accion.php?Id=<?php echo $resultado['idfarmaco']?>" class="btn btn-danger">Eliminar</a>
                            </th>
                        </tr>

                    <?php
                    }
                    ?>


                </tbody>
            </table>
            <div class="container">
                <a href="Formularios/farmaco/AgregarForm.php" class="btn btn-success">Agregar accion</a>
            </div>
        </div>
    </div>

    <div class="cliente">
        <div class="container">
            <h1 class="text-center" style="background-color: black; color:white; border-radius: 5px;">Cliente</h1>
        </div>
        <br>
        <div class="container">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Direccion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("Config/Conexion.php");

                    $sql = $conexion->query("SELECT * FROM cliente");

                    while ($resultado = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <th scope="row"><?php echo $resultado['idcliente']?></th>
                            <th scope="row"><?php echo $resultado['nombre']?></th>
                            <th scope="row"><?php echo $resultado['direccion']?></th>
                            <th>
                                <a href="Formularios/cliente/EditarForm.php?Id=<?php echo $resultado['idcliente']?>" class="btn btn-warning">Editar</a>
                                <a href="CRUD/cliente/EliminarDatos.php?Id=<?php echo $resultado['idcliente']?>" class="btn btn-danger">Eliminar</a>
                            </th>
                        </tr>

                    <?php
                    }
                    ?>


                </tbody>
            </table>
            <div class="container">
                <a href="Formularios/cliente/AgregarForm.php" class="btn btn-success">Agregar accion</a>
            </div>
        </div>
    </div>

    <div class="venta">
       <div class="container">
           <div class="row align-items-center" style="background-color: black; color:white; border-radius: 5px;">    
                <div class="col-4">
                      
                </div>

                <div class="col-4">
                    <h1 class="text-center">Venta</h1>
                </div>
                
                <div class="col-4">
                        <a href="/CRUD/venta/imprimir.php" class="btn btn-warning"><img src="printer.svg" style="height: 20px;">Imprimir</a>  
                </div>
            </div>
       </div>
        <br>
        <div class="container">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Vendedor</th>
                        <th scope="col">Farmaco</th>
                        <th scope="col">Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("Config/Conexion.php");

                    $sql = $conexion->query("SELECT venta.idventa, venta.fecha, venta.precio, venta.cantidad, venta.telefono,
                    vendedor.nombre AS nombre_vendedor, 
                    farmaco.nombre AS nombre_farmaco, 
                    cliente.nombre AS nombre_cliente
                    FROM venta
                    LEFT JOIN vendedor ON venta.idvendedor = vendedor.idvendedor
                    LEFT JOIN farmaco ON venta.idfarmaco = farmaco.idfarmaco
                    LEFT JOIN cliente ON venta.idcliente = cliente.idcliente;
                    ");

                    while ($resultado = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <th scope="row"><?php echo $resultado['idventa']?></th>
                            <th scope="row"><?php echo $resultado['fecha']?></th>
                            <th scope="row"><?php echo $resultado['precio']?></th>
                            <th scope="row"><?php echo $resultado['cantidad']?></th>
                            <th scope="row"><?php echo $resultado['telefono']?></th>
                            <th scope="row"><?php echo $resultado['nombre_vendedor']?></th>
                            <th scope="row"><?php echo $resultado['nombre_farmaco']?></th>
                            <th scope="row"><?php echo $resultado['nombre_cliente']?></th>
                            <th>
                                <a href="Formularios/venta/EditarForm.php?Id=<?php echo $resultado['idventa']?>" class="btn btn-warning">Editar</a>
                                <a href="CRUD/venta/EliminarDatos.php?Id=<?php echo $resultado['idventa']?>" class="btn btn-danger">Eliminar</a>
                            </th>
                        </tr>

                    <?php
                    }
                    ?>


                </tbody>
            </table>
            <div class="container">
                <a href="Formularios/venta/AgregarForm.php" class="btn btn-success">Agregar venta</a>
            </div>
        </div>
    </div>

    <div class="vendedor">
        <div class="container">
           <div class="row align-items-center" style="background-color: black; color:white; border-radius: 5px;">    
                <div class="col-4">
                      
                </div>

                <div class="col-4">
                    <h1 class="text-center">Vendedor</h1>
                </div>
                
                <div class="col-4">
                        <a href="/CRUD/vendedor/imprimir.php" class="btn btn-warning"><img src="printer.svg" style="height: 20px;">Imprimir</a>  
                </div>
            </div>
       </div>
        <br>
        <div class="container">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("Config/Conexion.php");

                    $sql = $conexion->query("SELECT * FROM vendedor");

                    while ($resultado = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <th scope="row"><?php echo $resultado['idvendedor']?></th>
                            <th scope="row"><?php echo $resultado['nombre']?></th>
                            <th scope="row"><?php echo $resultado['direccion']?></th>
                            <th scope="row"><?php echo $resultado['telefono']?></th>
                            <th>
                                <a href="Formularios/vendedor/EditarForm.php?Id=<?php echo $resultado['idvendedor']?>" class="btn btn-warning">Editar</a>
                                <a href="CRUD/vendedor/EliminarDatos.php?Id=<?php echo $resultado['idvendedor']?>" class="btn btn-danger">Eliminar</a>
                            </th>
                        </tr>

                    <?php
                    }
                    ?>


                </tbody>
            </table>
            <div class="container">
                <a href="Formularios/vendedor/AgregarForm.php" class="btn btn-success">Agregar Vendedor</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>