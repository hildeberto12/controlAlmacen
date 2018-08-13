<?php
	
	//require 'Classes/PHPExcel.php';
	require 'Classes/PHPExcel/IOFactory.php';
	
	$objPHPExcel = new PHPExcel();
	
	$objPHPExcel->getProperties()
	->setCreator('Hildeberto')
	->setTitle('Excel en PHP')
	->setDescription('Documento de prueba')
	->setKeywords('excel phpexcel php')
	->setCategory('Mercancias');

	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Hoja1');
	
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'PHPExcel');
	$objPHPExcel->getActiveSheet()->setCellValue('A2', 12345.6789);
	$objPHPExcel->getActiveSheet()->setCellValue('A3', TRUE);
	
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Mercancias.xlsx"');
	header('Cache-Control: max-age=0');
	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');


?>