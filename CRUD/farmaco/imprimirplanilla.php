<?php
	
	require ('../../fpdf/fpdf.php');
	require '../../Config/Conexion.php';
 	$id_farmaco=$_POST['farmacos'];
	 
 	$consulta1 = "SELECT * FROM farmaco WHERE idfarmaco = '$id_farmaco'";
    $resultado1 = $conexion->query($consulta1);

    $fila1=$resultado1->fetch_assoc();
    $nom_farmaco=$fila1['nombre'];
	$desc_farmaco=$fila1['descricpion'];
   class PDF extends FPDF 
	{
		function Header()
		{
			global $nom_farmaco;
			global $desc_farmaco;
			global $id_planilla;
			global $fecha_planilla;

			//$this->Image('IMG/logoEnte1.jpg',10,8,33);
			$this->Ln(5);
			$this-> SetFont('Arial','',10);
			$this->Cell(40);
			$this-> Cell (150,10,'PLANILLA DE FARMACOS',1,0,'C',0);
            $this-> Ln(20);
            $this->Cell(100, 10,utf8_decode('Farmaco: '.$nom_farmaco), 2, 0, 'L');
            //comienza encabezado de tabla
            $this-> Ln(20);
			$this-> Cell(30,10,"Nombre",1,0,'C',0);
			$this-> Cell(40,10,"Descripcion",1,0,'C',0);
			$this-> Cell(30,10,"Accion",1,0,'C',0);
            $this-> Cell(30,10,"Laboratorio",1,0,'C',0);
            $this-> Ln(10);
		}
		function Footer()
		{
			$this-> SetY(-15);
			$this-> SetFont('Arial','I',8);
			$this-> Cell(0,10,utf8_decode('Página: ').$this->PageNo().'/{nb}',0,0,'C');
		}
	}
	
        
	$consulta = "SELECT farmaco.idfarmaco, farmaco.nombre AS farmaco_nombre, farmaco.descripcion, accion.nombre AS accion_nombre, laboratorio.nombre AS laboratorio_nombre FROM farmaco LEFT JOIN accion ON farmaco.idaccion = accion.idaccion LEFT JOIN laboratorio ON farmaco.idlaboratorio = laboratorio.idlaboratorio WHERE idfarmaco = $id_farmaco";

	
	$resultado = $conexion -> query ($consulta);
	$pdf= new PDF('P','mm','A4');
	
	$pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',10);
	while ($fila=$resultado-> fetch_assoc())
		{
			$pdf -> Cell(30,10,$fila['farmaco_nombre'],1,0,'C',0);
			$pdf -> Cell(40,10,utf8_decode($fila['descripcion']),1,0,'C',0);
			$pdf -> Cell(30,10,utf8_decode($fila['accion_nombre']),1,0,'C',0);
			$pdf -> Cell(30,10,utf8_decode($fila['laboratorio_nombre']),1,0,'C',0);
		 }
	$pdf-> Ln(20);
	$pdf->Cell(195,12,utf8_decode('Farmacia - Jujuy'),1,0,'C',0);
	$pdf -> Output();
?>