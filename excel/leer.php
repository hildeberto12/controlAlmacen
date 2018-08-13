<?php
	
	require "Classes/PHPExcel/IOFactory.php";
	require "../conexion.php";
	
	$nombreArchivo = 'mercancias.xlsx';
	
	$objPHPExcel = PHPEXCEL_IOFactory::load($nombreArchivo);
	
	$objPHPExcel->setActiveSheetIndex(0);
	
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
	
	echo '<table border=1><tr><td>Id</td><td>Cliente</td><td>Cantidad</td><td>Mercancia</td><td>Folio</td><td>Tipo Transporte</td><td>Presentacion</td><td>Numero contenedor</td><td>Numero sello</td><td>Fecha entrada</td><td>Fecha salida</td></tr>';
	
	for($i = 2; $i <= $numRows; $i++){
		
		$id = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$cliente = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$cantidad = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		$mercancia = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		$numero_folio = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
		$tipo_transporte = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
		$presentacion_mercancia = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
		$numero_contenedor = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
		$numero_sello = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
		$fecha_entrada = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
		$fecha_salida = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
		
		echo '<tr>';
		echo '<td>'.$id.'</td>';
		echo '<td>'.$cliente.'</td>';
		echo '<td>'.$cantidad.'</td>';
		echo '<td>'.$mercancia.'</td>';
		echo '<td>'.$numero_folio.'</td>';
		echo '<td>'.$tipo_transporte.'</td>';
		echo '<td>'.$presentacion_mercancia.'</td>';
		echo '<td>'.$numero_contenedor.'</td>';
		echo '<td>'.$numero_sello.'</td>';
		echo '<td>'.$fecha_entrada.'</td>';
		echo '<td>'.$fecha_salida.'</td>';
		echo '</tr>';
		
		$sql = "INSERT INTO registros (id, cliente, mercancia, numero_folio, tipo_transporte, presentacion_mercancia, numero_contenedor,numero_sello, fecha_entrada, fecha_salida) VALUE('$id','$cliente','$cantidad','$mercancia','$numero_folio','$tipo_transporte','$presentacion_mercancia','$numero_contenedor','$numero_sello','$fecha_entrada','$fecha_salida' )";
		$result = $conection->query($sql);
		
	}
	
	echo '</table>';
	
?>