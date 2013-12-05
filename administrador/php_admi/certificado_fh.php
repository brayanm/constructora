<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

require_once 'Classes/PHPExcel.php';
include "Classes/PHPExcel/IOFactory.php";
require_once 'PHPExcel/Cell/AdvancedValueBinder.php';
include "../../php/conexion.php";

foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
}
$corre = explode ('#', $corre);

$correlacion = $corre[0];
$muestra = $corre[1];
$s = "select max(id_certificado) as m from certificado where id_proyecto='$id_proyecto' and id_informe='$informe69' and correlacional='$correlacion' and muestra='$muestra'";
$r = mysql_query($s, $conexion);
$rw = mysql_fetch_array($r);

$sql = "select * from registro where correlacional='$correlacion' and muestra='$muestra'";
$r1=mysql_query($sql, $conexion);
$row = mysql_fetch_array($r1);

$sql2 = "select * from proyecto where id_proyecto='$id_proyecto'";
$r2=mysql_query($sql2, $conexion);
$row2 = mysql_fetch_array($r2);

$sql3 = "select fecha from registro_fecha where correlacional='$correlacion' and muestra='$muestra' and ensayo='1'";
$r3=mysql_query($sql3, $conexion);
$row3 = mysql_fetch_array($r3);
$fecha = date("Y-m-d", strtotime("$f1"));
$fecha1= date("Y-m-d", strtotime("$row3[fecha] + 7 day"));
$fecha2= date("Y-m-d", strtotime("$row3[fecha] + 28 day"));
$fecha3= date("Y-m-d", strtotime("$row3[fecha] + 90 day"));

$sql4 = "select * from vista2 where correlacional='$correlacion' and muestra='$muestra' and (ensayo='4' or ensayo='3')";
$r4 = mysql_query($sql4,$conexion);



$objPHPExcel = new PHPExcel();

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("certificado_fh.xlsx");

$objPHPExcel->setActiveSheetIndex(1);
PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );


//revision

$objPHPExcel->getActiveSheet()->SetCellValue('b33', 'Revision '.$revision);
//Escribimos en la hoja en la celda B1
$objPHPExcel->getActiveSheet()->SetCellValue('a1', $row2['codigo']);
$objPHPExcel->getActiveSheet()->SetCellValue('b1', $rw['m']);//nro certificado
$objPHPExcel->getActiveSheet()->SetCellValue('b2', $luz);
$objPHPExcel->getActiveSheet()->SetCellValue('b3', $ensayoc);

$objPHPExcel->getActiveSheet()->SetCellValue('a2', $fecha);

$objPHPExcel->getActiveSheet()->SetCellValue('a3', $row2['Nombre']);
$objPHPExcel->getActiveSheet()->SetCellValue('a4', $row2['sector']);
$objPHPExcel->getActiveSheet()->SetCellValue('a5', $row2['provincia']);
$objPHPExcel->getActiveSheet()->SetCellValue('a6', $row2['region']);
$objPHPExcel->getActiveSheet()->SetCellValue('a7', $row2['mandante']);
$objPHPExcel->getActiveSheet()->SetCellValue('a8', $row2['contratista']);
$objPHPExcel->getActiveSheet()->SetCellValue('a9', $row2['safi']);

//datos del hormigon
$objPHPExcel->getActiveSheet()->SetCellValue('a10', $muestra);
$objPHPExcel->getActiveSheet()->SetCellValue('a11', "Grado del Hormigon (MPa)             ".$row['grado_hormigon']);
$objPHPExcel->getActiveSheet()->SetCellValue('a12', $row3['fecha']);
$objPHPExcel->getActiveSheet()->SetCellValue('a13', "Dosificacion - Tipo: ".$row['diseno']);
$objPHPExcel->getActiveSheet()->SetCellValue('a14', $fecha1);
//$objPHPExcel->getActiveSheet()->getStyle('a14')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
$objPHPExcel->getActiveSheet()->SetCellValue('a15', $fecha2);
$objPHPExcel->getActiveSheet()->SetCellValue('a16', $fecha3);
$objPHPExcel->getActiveSheet()->SetCellValue('a17', $row['confianza']);
$objPHPExcel->getActiveSheet()->SetCellValue('a18', "Km. Puntual/Sector Km.: ".$row['elemento_estructura']);

//muestreo
$objPHPExcel->getActiveSheet()->SetCellValue('a19', $row['cono']);
$objPHPExcel->getActiveSheet()->SetCellValue('a20', $row['compactacion']);
$objPHPExcel->getActiveSheet()->SetCellValue('a21', $row['curado']);
$objPHPExcel->getActiveSheet()->SetCellValue('a22', $row['t_ambiente']);
$objPHPExcel->getActiveSheet()->SetCellValue('a23', $row['t_curado']);
//$objPHPExcel->getActiveSheet()->getStyle('a14')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
$objPHPExcel->getActiveSheet()->SetCellValue('a24', $row['hora_control']);
$objPHPExcel->getActiveSheet()->SetCellValue('a25', $row['proveedor']);
$objPHPExcel->getActiveSheet()->SetCellValue('a26', $row['n_guia']);
$objPHPExcel->getActiveSheet()->SetCellValue('a27', $aridos);

//ensayo
$row4 = mysql_fetch_array($r4);
$objPHPExcel->getActiveSheet()->SetCellValue("c1", $row4['hp']);
$objPHPExcel->getActiveSheet()->SetCellValue("d1", $row4['fp']);
$objPHPExcel->getActiveSheet()->SetCellValue("c2", $row4['hempa']);
$objPHPExcel->getActiveSheet()->SetCellValue("d2", $row4['flmpa']);
$objPHPExcel->getActiveSheet()->SetCellValue("c3", $row4['hempa']*10,1972);
$objPHPExcel->getActiveSheet()->SetCellValue("d3", $row4['flmpa']*10,1972);
$objPHPExcel->getActiveSheet()->SetCellValue("e1", $row4['hpeso']);
$objPHPExcel->getActiveSheet()->SetCellValue("f1", $row4['hd']);

$c1 = 28;
$c2 = 2;
while ($row4 = mysql_fetch_array($r4)) {
	$objPHPExcel->getActiveSheet()->SetCellValue("e".$c2, $row4['hpeso']);
	$objPHPExcel->getActiveSheet()->SetCellValue("f".$c2, $row4['hd']);
	$c2++;
	if($row4['ensayo']!=3){
		$objPHPExcel->getActiveSheet()->SetCellValue("a".$c1, $row4['hp']);
		$objPHPExcel->getActiveSheet()->SetCellValue("b".$c1, $row4['fp']);
		$objPHPExcel->getActiveSheet()->SetCellValue("c".$c1, $row4['hempa']);
		$objPHPExcel->getActiveSheet()->SetCellValue("d".$c1, $row4['flmpa']);
		$objPHPExcel->getActiveSheet()->SetCellValue("e".$c1, $row4['hempa']*10,1972);
		$objPHPExcel->getActiveSheet()->SetCellValue("f".$c1, $row4['flmpa']*10,1972);		
		$c1++;
	}
}
$objPHPExcel->getActiveSheet()->SetCellValue("j1", $comentario);

$objPHPExcel->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

header('Content-Disposition: attachment;filename="Certificado_FH.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save('php://output');


exit;

?>