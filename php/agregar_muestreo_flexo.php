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
$sql3= "INSERT INTO `registro_fecha`(`correlacional`, `muestra`, `fecha`, `llena`, `ensayo`) VALUES ( '$correlacion', '$muestra' , '$fecha3', '0' , '4')";
$sql4= "INSERT INTO `registro_fecha`(`correlacional`, `muestra`, `fecha`, `llena`, `ensayo`) VALUES ( '$correlacion', '$muestra' , '$fecha3', '0' , '4')";
$sql5= "INSERT INTO `registro_fecha`(`correlacional`, `muestra`, `fecha`, `llena`, `ensayo`) VALUES ( '$correlacion', '$muestra' , '$fecha3', '0' , '4')";

if(@mysql_query($sql, $conexion))  $cont =1;
$id_fecha=mysql_insert_id($conexion);

if(@mysql_query($sql1, $conexion))  $cont++ ;
if(@mysql_query($sql2, $conexion)) $cont++ ;
if(@mysql_query($sql3, $conexion)) $cont++ ;
if(@mysql_query($sql4, $conexion))  $cont++ ;
if(@mysql_query($sql5, $conexion)) $cont++ ;






$mpaflexo = ($p * $l) / ($h *$h *$b);
$flexotrac = "INSERT INTO `flexo_traccion`(`id_fecha`, `tiempo`, `b`, `h`, `l`, `p`, `a`, `mpa`) VALUES ('$id_fecha', '$tiempo', '$b' ,'$h','$l','$p','$a', '$mpaflexo') ";

$mpahendi = ($p2 * 2)/($ll*$d *3.14159265);
$hendimi ="INSERT INTO `hendimiento`(`id_fecha`, `peso`, `peso_sumergido`, `peso_saturado`, `densidad`, `tiempo`, `d`, `l`, `p`, `mpa`) VALUES ('$id_fecha', '$peso', '$pesoSumergido' , '$pesoSaturado', '$densidad2', '$tiempo2','$d','$ll','$p2','$mpahendi')";


if(@mysql_query($flexotrac, $conexion)) $cont++ ;
if(@mysql_query($hendimi, $conexion)) $cont++;


if ($cont == 8) echo "success";

?>