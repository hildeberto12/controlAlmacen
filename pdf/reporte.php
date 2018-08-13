<?php
  
  require "../conexion.php";
  include "../authuser.php";
  include "../funciones.php";
  include "vista.php";

  if(!$uv){
  header("Location: ../login.php");
  exit();
}elseif($fu['rol'] >= 3){
  header("Location: ../reporte.php");
  exit();
}

/*****************[abrir registro existente]*****************************/

$fp = [];
  
?>

<?php
	
	$query = "SELECT * FROM registros";
	$resultado = $conection->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L','A4',0);
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(10,6,'Id',1,0,'C',1);
	$pdf->Cell(18,6,'Cliente',1,0,'C',1);
	$pdf->Cell(23,6,'Mercancia',1,0,'C',1);
	$pdf->Cell(20,6,'Cantidad',1,0,'C',1);
	$pdf->Cell(15,6,'folio',1,0,'C',1);
	$pdf->Cell(33,6,'Tipo transporte',1,0,'C',1);
	$pdf->Cell(28,6,'Presentacion',1,0,'C',1);
	$pdf->Cell(42,6,'Numero contenedor',1,0,'C',1);
	$pdf->Cell(30,6,'Numero sello',1,0,'C',1);
	$pdf->Cell(30,6,'Fecha entrada',1,0,'C',1);
	$pdf->Cell(30,6,'Fecha salida',1,0,'C',1);
	$pdf->Ln();

	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(10,6,$row['id'],1,0,'C');
		$pdf->Cell(18,6,utf8_decode($row['cliente']),1,0,'C');
		$pdf->Cell(23,6,utf8_decode($row['mercancia']),1,0,'C');
		$pdf->Cell(20,6,$row['cantidad'],1,0,'C');
		$pdf->Cell(15,6,$row['numero_folio'],1,0,'C');
		$pdf->Cell(33,6,utf8_decode($row['tipo_transporte']),1,0,'C');
		$pdf->Cell(28,6,utf8_decode($row['presentacion_mercancia']),1,0,'C');
		$pdf->Cell(42,6,$row['numero_contenedor'],1,0,'C');
		$pdf->Cell(30,6,$row['numero_sello'],1,0,'C');
		$pdf->Cell(30,6,$row['fecha_entrada'],1,0,'C');
		$pdf->Cell(30,6,$row['fecha_salida'],1,0,'C');
		$pdf->Ln();
	}
	$pdf->Output();
?>

