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

	
	
	
		if($dato11!='' && $dato22!='' && $dato33!='') {
			$compaDensi=($dato11/$dato22-$dato33)*1000;
			$compaArea= $a3*$b3;		
			$mpacompa= ($p3/ $compaArea)*$factor3;
			$compac ="INSERT INTO `comprecion`(`id_fecha`, `a`, `b`, `h`, `densidad`, `masa`, `area`, `p`, `factor`, `mpa`, `dato1`, `dato2`, `dato3`) VALUES('$id_fecha','$a3','$b3','$h3','$compaDensi' ,'$masa3','$compaArea' ,'$p3', '$factor3' ,'$mpacompa','$dato11','$dato22','$dato33')";				
		}
		else{
			$compaDensi= $masa3/(($a3*$b3*$h3)/1000);
			$compaArea= $a3*$b3;		
			$mpacompa= ($p3/ $compaArea)*$factor3;
			$compac ="INSERT INTO `comprecion`(`id_fecha`, `a`, `b`, `h`, `densidad`, `masa`, `area`, `p`, `factor`, `mpa`, `dato1`, `dato2`, `dato3`) VALUES('$id_fecha','$a3','$b3','$h3','$compaDensi' ,'$masa3','$compaArea' ,'$p3', '$factor3' ,'$mpacompa','0','0','0')";	
		}


	if(@mysql_query($compac, $conexion)) $cont=1;


	if($cont == 1) echo "success"; 
	}

else 
	echo "fecha";
?>