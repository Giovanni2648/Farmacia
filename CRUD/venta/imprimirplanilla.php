<?php
	
	require ('../../fpdf/fpdf.php');
	require '../../Config/Conexion.php';
 	$id_venta=$_POST['ventas'];
	 
 	$consulta1 = "SELECT * FROM venta WHERE idventa = '$id_venta'";
    $resultado1 = $conexion->query($consulta1);

    $fila1=$resultado1->fetch_assoc();

   class PDF extends FPDF 
	{
		function Header()
		{
			global $id_venta;
			global $desc_venta;
			global $id_planilla;
			global $fecha_planilla;

			//$this->Image('IMG/logoEnte1.jpg',10,8,33);
			$this->Ln(5);
			$this-> SetFont('Arial','',10);
			$this->Cell(40);
			$this-> Cell (150,10,'PLANILLA DE VENTAS	',1,0,'C',0);
            $this-> Ln(20);
            $this->Cell(100, 10,utf8_decode('venta: '.$id_venta), 2, 0, 'L');
            //comienza encabezado de tabla
            $this-> Ln(20);
			$this-> Cell(30,10,"Fecha",1,0,'C',0);
            $this-> Cell(30,10,"Farmaco ",1,0,'C',0);
			$this-> Cell(40,10,"Precio",1,0,'C',0);
			$this-> Cell(30,10,"Cantidad",1,0,'C',0);
            $this-> Cell(30,10,"Telefono",1,0,'C',0);
            $this-> Ln(10);
		}
		function Footer()
		{
			$this-> SetY(-15);
			$this-> SetFont('Arial','I',8);
			$this-> Cell(0,10,utf8_decode('Página: ').$this->PageNo().'/{nb}',0,0,'C');
		}
	}
	
        
	$consulta = "SELECT venta.idventa, venta.fecha, venta.precio, venta.cantidad, venta.telefono, vendedor.nombre AS nombre_vendedor, farmaco.nombre AS nombre_farmaco, cliente.nombre AS nombre_cliente FROM venta LEFT JOIN vendedor ON venta.idvendedor = vendedor.idvendedor LEFT JOIN farmaco ON venta.idfarmaco = farmaco.idfarmaco LEFT JOIN cliente ON venta.idcliente = cliente.idcliente;";

	
	$resultado = $conexion -> query ($consulta);
	$pdf= new PDF('P','mm','A4');
	
	$pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',10);
    $con=0;
	while ($fila=$resultado-> fetch_assoc())
		{
			$pdf -> Cell(30,10,$fila['fecha'],1,0,'C',0);
			$pdf -> Cell(30,10,utf8_decode($fila['nombre_farmaco']),1,0,'C',0);
			$pdf -> Cell(40,10,utf8_decode($fila['precio']),1,0,'C',0);
			$pdf -> Cell(30,10,utf8_decode($fila['cantidad']),1,0,'C',0);
			$pdf -> Cell(30,10,utf8_decode($fila['telefono']),1,0,'C',0);
			$pdf-> Ln(20);
			$pdf-> Cell(30,10,"Vendedor",1,0,'C',0);
            $pdf-> Cell(30,10,"Cliente ",1,0,'C',0);
			$pdf-> Ln(10);
			$pdf -> Cell(30,10,utf8_decode($fila['nombre_vendedor']),1,0,'C',0);
			$pdf -> Cell(30,10,utf8_decode($fila['nombre_cliente']),1,0,'C',0);
		 }
	$pdf-> Ln(20);
	$pdf->Cell(195,12,utf8_decode('Farmacia - Jujuy'),1,0,'C',0);
	$pdf -> Output();
?>