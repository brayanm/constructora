<?php

foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 

} 
include "conexion.php";
$sql1="SELECT  `fecha` FROM `registro_fecha` WHERE `id_fecha`='$id_fecha' ";
$result=mysql_query($sql1, $conexion);
$row = mysql_fetch_array($result);

$fecha_actual=date("Y-m-d");


if($fecha_actual > $row['fecha']){

	$sql="UPDATE `registro_fecha` SET `llena`='1' WHERE `id_fecha`= '$id_fecha'";
	@mysql_query($sql, $conexion);

	
	$mpaflexo = ($p * $l) / ($h *$h *$b);	
	$flexotrac = "INSERT INTO `flexo_traccion`(`id_fecha`, `tiempo`, `b`, `h`, `l`, `p`, `a`, `mpa`) VALUES ('$id_fecha', '$tiempo', '$b' ,'$h','$l','$p','$a', '$mpaflexo') ";



	$mpahendi = ($p2 * 2)/($ll*$d *3.14159265);	
	$hendimi ="INSERT INTO `hendimiento`(`id_fecha`, `peso`, `peso_sumergido`, `peso_saturado`, `densidad`, `tiempo`, `d`, `l`, `p`, `mpa`) VALUES ('$id_fecha', '$peso', '$pesoSumergido' , '$pesoSaturado', '$densidad2', '$tiempo2','$d','$ll','$p2','$mpahendi')";


	if(@mysql_query($flexotrac, $conexion) && @mysql_query($hendimi, $conexion) ) $cont=1;


	if($cont == 1) echo "success"; 
	}

else 
	echo "fecha";
?>