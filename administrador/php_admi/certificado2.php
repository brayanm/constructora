<?php
include "../../php/conexion.php";
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

require_once 'Classes/PHPExcel.php';
include "Classes/PHPExcel/IOFactory.php";
require_once 'Classes/PHPExcel/Cell/AdvancedValueBinder.php';

foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
}
$corre = explode ('#', $corre); //metodo split java de php
$correlacional = $corre[0];
$muestra =$corre[1];
$fecha = date("Y-m-d", strtotime("$f1"));

$sqlproyect="SELECT * FROM proyecto where id_proyecto = $id_proyecto";
$sqlregistro="SELECT * FROM registro where correlacional = $correlacional and muestra=$muestra";
$sqlregistrofecha ="SELECT * from registro_fecha where correlacional = $correlacional and muestra=$muestra";

$s = "select max(id_certificado) as m from certificado where id_proyecto='$id_proyecto' and id_informe='$informe69' and correlacional='$correlacional' and muestra='$muestra'";
$r = mysql_query($s, $conexion);
$rw = mysql_fetch_array($r);


$objPHPExcel = new PHPExcel();
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("certificado_compresion.xlsx");

$objPHPExcel->setActiveSheetIndex(1);
PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );

$query = mysql_query($sqlproyect,$conexion);
$respuesta = mysql_fetch_array($query);
//revision

$objPHPExcel->getActiveSheet()->SetCellValue('k3',"Revision   ".$revision);

//datos proyecto

$objPHPExcel->getActiveSheet()->SetCellValue('e2', $respuesta['Nombre'] );
$objPHPExcel->getActiveSheet()->SetCellValue('e4', $rw['m']);


$objPHPExcel->getActiveSheet()->SetCellValue('k2', $respuesta['codigo'] );
$objPHPExcel->getActiveSheet()->SetCellValue('j4', $fecha);

$objPHPExcel->getActiveSheet()->SetCellValue('e7', $respuesta['Nombre'] );

$objPHPExcel->getActiveSheet()->SetCellValue('e8', $respuesta['sector']);
$objPHPExcel->getActiveSheet()->SetCellValue('e9', $respuesta['provincia'] );
$objPHPExcel->getActiveSheet()->SetCellValue('e10', $respuesta['region'] );
$objPHPExcel->getActiveSheet()->SetCellValue('e11', $respuesta['mandante'] );
$objPHPExcel->getActiveSheet()->SetCellValue('e12', $respuesta['contratista'] );
$objPHPExcel->getActiveSheet()->SetCellValue('e13', $respuesta['safi'] ); 

$query = mysql_query($sqlregistro,$conexion);
$respuesta = mysql_fetch_array($query);

$query = mysql_query($sqlregistrofecha,$conexion);
while($respuestamuestreo = mysql_fetch_array($query)){
	if($respuestamuestreo['ensayo']==1){
		$objPHPExcel->getActiveSheet()->SetCellValue('b19',$respuestamuestreo['fecha']);
	}if($respuestamuestreo['ensayo']==2){
		$objPHPExcel->getActiveSheet()->SetCellValue('b20',$respuestamuestreo['fecha']);
	}if($respuestamuestreo['ensayo']==3){
		$objPHPExcel->getActiveSheet()->SetCellValue('h20',$respuestamuestreo['fecha']);
	}

}
$objPHPExcel->getActiveSheet()->SetCellValue('e15', $respuesta['grado_hormigon'] );

//Datos Hormigon
$objPHPExcel->getActiveSheet()->SetCellValue('b18', $muestra );


$objPHPExcel->getActiveSheet()->SetCellValue('b21', $respuesta['confianza'] );

$objPHPExcel->getActiveSheet()->SetCellValue('h18',  $respuesta['grado_hormigon'] );

$objPHPExcel->getActiveSheet()->SetCellValue('h19', $respuesta['diseno'] );


$objPHPExcel->getActiveSheet()->SetCellValue('b22',  $respuesta['elemento_estructura'] );

//muestreo


$objPHPExcel->getActiveSheet()->SetCellValue('b29',  $respuesta['cono'] );
$objPHPExcel->getActiveSheet()->SetCellValue('d29',  $respuesta['compactacion'] );
$objPHPExcel->getActiveSheet()->SetCellValue('f29',  $respuesta['curado'] );
$objPHPExcel->getActiveSheet()->SetCellValue('h29',  $respuesta['t_ambiente'] );
$objPHPExcel->getActiveSheet()->SetCellValue('j29',  $respuesta['t_curado'] );
$objPHPExcel->getActiveSheet()->SetCellValue('l29',  $respuesta['hora_control'] );

$objPHPExcel->getActiveSheet()->SetCellValue('b32',  $respuesta['proveedor']);
$objPHPExcel->getActiveSheet()->SetCellValue('e32',  'guia despacho');
$objPHPExcel->getActiveSheet()->SetCellValue('g32',  $aridos);

//ensayo

$query2 = mysql_query($sqlregistrofecha,$conexion);
$indice =39;

while($respuesta = mysql_fetch_array($query2)){

	$id_fecha = $respuesta['id_fecha'];
	$comprecion = "SELECT * from comprecion where id_fecha= '$id_fecha' ";

	$query = mysql_query($comprecion,$conexion);
	$respuesta2 = mysql_fetch_array($query);

	$objPHPExcel->getActiveSheet()->SetCellValue('g'.$indice, $respuesta2['masa']);
	$objPHPExcel->getActiveSheet()->SetCellValue('h'.$indice, $respuesta2['densidad'] );
	$objPHPExcel->getActiveSheet()->SetCellValue('i'.$indice, $respuesta2['area'] );
	$objPHPExcel->getActiveSheet()->SetCellValue('j'.$indice, $respuesta2['p'] );
	$objPHPExcel->getActiveSheet()->SetCellValue('l'.$indice, ($respuesta2['mpa'] * 10.7169) );
	$objPHPExcel->getActiveSheet()->SetCellValue('m'.$indice, $respuesta2['mpa']);
	$indice++;


} 



//comentarios

$objPHPExcel->getActiveSheet()->SetCellValue('b48', $comentario);


$objPHPExcel->setActiveSheetIndex(0);


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

header('Content-Disposition: attachment;filename="Certificado_C.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save('php://output');




?>