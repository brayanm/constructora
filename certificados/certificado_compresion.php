<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

require_once 'classes/PHPExcel.php';
include "classes/PHPExcel/IOFactory.php";

$objPHPExcel = new PHPExcel();

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("certificado1.xlsx");

$objPHPExcel->setActiveSheetIndex(0);

//Escribimos en la hoja en la celda B1
$objPHPExcel->getActiveSheet()->SetCellValue('j1', 'brayan culiao gay' );




header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

header('Content-Disposition: attachment;filename="penepenepene.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save('php://output');


exit;

?>