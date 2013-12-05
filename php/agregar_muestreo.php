<?php

foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
} 
$fecha1= date("Y/m/d", strtotime("$fecha + 7 day"));
$fecha2= date("Y/m/d", strtotime("$fecha + 28 day"));
$fecha3= date("Y/m/d", strtotime("$fecha + 90 day"));

include "conexion.php";

$sql= "INSERT INTO `registro_fecha`(`correlacional`, `muestra`, `fecha`, `llena` , `ensayo`) VALUES ( '$correlacion', '$muestra' , '$fecha', '1', '1')";
$sql1= "INSERT INTO `registro_fecha`(`correlacional`, `muestra`, `fecha`, `llena` , `ensayo`) VALUES ( '$correlacion', '$muestra' , '$fecha1', '0', '2')";
$sql2= "INSERT INTO `registro_fecha`(`correlacional`, `muestra`, `fecha`, `llena`, `ensayo`) VALUES ( '$correlacion', '$muestra' , '$fecha2', '0' , '3')";
$sql3= "INSERT INTO `registro_fecha`(`correlacional`, `muestra`, `fecha`, `llena`, `ensayo`) VALUES ( '$correlacion', '$muestra' , '$fecha3', '0','4')";
if(@mysql_query($sql, $conexion))  $cont =1;
$id_fecha=mysql_insert_id($conexion);

if(@mysql_query($sql1, $conexion))  $cont++ ;
if(@mysql_query($sql2, $conexion)) $cont++ ;
if(@mysql_query($sql3, $conexion)) $cont++ ;





if ($dato1==1) {
	$mpaflexo = ($p * $l) / ($h *$h *$b);
$flexotrac = "INSERT INTO `flexo_traccion`(`id_fecha`, `tiempo`, `b`, `h`, `l`, `p`, `a`, `mpa`) VALUES ('$id_fecha', '$tiempo', '$b' ,'$h','$l','$p','$a', '$mpaflexo') ";
}
else{$flexotrac = "INSERT INTO `flexo_traccion`(`id_fecha`, `tiempo`, `b`, `h`, `l`, `p`, `a`, `mpa`) VALUES ('$id_fecha', '-1', '-1' ,'-1','-1','-1','-1', '-1') ";}

if ($dato2==1) {
	$mpahendi = ($p2 * 2)/($ll*$d *3.14159265);
	$hendimi ="INSERT INTO `hendimiento`(`id_fecha`, `peso`, `peso_sumergido`, `peso_saturado`, `densidad`, `tiempo`, `d`, `l`, `p`, `mpa`) VALUES ('$id_fecha', '$peso', '$pesoSumergido' , '$pesoSaturado', '$densidad2', '$tiempo2','$d','$ll','$p2','$mpahendi')";
}
else{$hendimi ="INSERT INTO `hendimiento`(`id_fecha`, `peso`, `peso_sumergido`, `peso_saturado`, `densidad`, `tiempo`, `d`, `l`, `p`, `mpa`) VALUES ('$id_fecha', '-1', '-1' , '-1', '-1', '-1','-1','-1','-1','-1')";}
if ($dato3==1) {
	if($dato11!='' && $dato22!='' && $dato33!='') {
			$compaDensi=69;

		}
		else{
			$compaDensi= $masa3/(($a3*$b3*$h3)/1000);
		}
	$compaArea= $a3*$b3;


$mpacompa= ($p3/ $compaArea)*$factor3;
	$compac ="INSERT INTO `comprecion`(`id_fecha`, `a`, `b`, `h`, `densidad`, `masa`, `area`, `p`, `factor`, `mpa`) VALUES('$id_fecha','$a3','$b3','$h3','$compaDensi' ,'$masa3','$compaArea' ,'$p3', '$factor3' ,'$mpacompa')";
}
else{$compac ="INSERT INTO `comprecion`(`id_fecha`, `a`, `b`, `h`, `densidad`, `masa`, `area`, `p`, `factor`, `mpa`) VALUES('$id_fecha','-1','-1','-1','-1' ,'-1','-1' ,'-1', '-1' ,'-1')";}


if(@mysql_query($flexotrac, $conexion)) $cont++ ;
if(@mysql_query($hendimi, $conexion)) $cont++;
if(@mysql_query($compac, $conexion)) $cont++;

if ($cont == 7) echo "success"; 

?>