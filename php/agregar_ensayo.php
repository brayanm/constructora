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

	if (!isset($p)){
		$flexotrac = "INSERT INTO `flexo_traccion`(`id_fecha`, `tiempo`, `b`, `h`, `l`, `p`, `a`, `mpa`) VALUES ('$id_fecha', '-1', '-1' ,'-1','-1','-1','-1','-1') ";
	}
	else{
		$mpaflexo = ($p * $l) / ($h *$h *$b);	
		$flexotrac = "INSERT INTO `flexo_traccion`(`id_fecha`, `tiempo`, `b`, `h`, `l`, `p`, `a`, `mpa`) VALUES ('$id_fecha', '$tiempo', '$b' ,'$h','$l','$p','$a', '$mpaflexo') ";
	}

	if (!isset($p2)){
		$hendimi ="INSERT INTO `hendimiento`(`id_fecha`, `peso`, `peso_sumergido`, `peso_saturado`, `densidad`, `tiempo`, `d`, `l`, `p`, `mpa`) VALUES ('$id_fecha','-1','-1' , '-1', '-1', '-1','-1','-1','-1','-1')";
	}
		else{
		$mpahendi = ($p2 * 2)/($ll*$d *3.14159265);	
		$hendimi ="INSERT INTO `hendimiento`(`id_fecha`, `peso`, `peso_sumergido`, `peso_saturado`, `densidad`, `tiempo`, `d`, `l`, `p`, `mpa`) VALUES ('$id_fecha', '$peso', '$pesoSumergido' , '$pesoSaturado', '$densidad2', '$tiempo2','$d','$ll','$p2','$mpahendi')";
	}

	if (!isset($a3)){
		$compac ="INSERT INTO `comprecion`(`id_fecha`, `a`, `b`, `h`, `densidad`, `masa`, `area`, `p`, `factor`, `mpa`) VALUES('$id_fecha','-1','-1','-1','-1' ,'-1','-1' ,'-1' , '-1'  ,'-1' )";
	}
		else{
		if($dato1!='' && $dato2!='' && $dato3!='') {
			$compaDensi=69;

		}
		else{
			$compaDensi= $masa3/(($a3*$b3*$h3)/1000);
		}
		$compaArea= $a3*$b3;		
		$mpacompa= ($p3/ $compaArea)*$factor3;
		$compac ="INSERT INTO `comprecion`(`id_fecha`, `a`, `b`, `h`, `densidad`, `masa`, `area`, `p`, `factor`, `mpa`) VALUES('$id_fecha','$a3','$b3','$h3','$compaDensi' ,'$masa3','$compaArea' ,'$p3', '$factor3' ,'$mpacompa')";
	}

	if(@mysql_query($flexotrac, $conexion) && @mysql_query($hendimi, $conexion) && @mysql_query($compac, $conexion)) $cont=1;


	if($cont == 1) echo "success"; 
	}

else 
	echo "fecha";
?>