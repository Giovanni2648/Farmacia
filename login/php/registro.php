<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos
require 'conexion.php';

// Validamos que el formulario y que el boton registro haya sido presionado
if(isset($_POST['registro'])) {

// Obtener los valores enviados por el formulario
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$usuario = $_POST['telefono'];
$contrasena = $_POST['contrasena'];

// Insertamos los datos en la base de datos
$sql = "INSERT INTO vendedor (nombre, direccion, telefono, contrasena) VALUES ( '$nombre', '$direccion','$usuario', '$contrasena')";
$resultado = mysqli_query($conexion,$sql);
	if($resultado) {
		header("Location: ../login.html");
	} else {
		echo "¡No se puede insertar la informacion!"."<br>";
		echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	}
}
?>
