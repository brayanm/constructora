<?php
include "../../php/conexion.php";

foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
} 

$sql= "INSERT INTO `grado_hormigon`(`proyecto`,`nombre`) VALUES ( '$proyecto_grado','$nombregrado')";
if(@mysql_query($sql, $conexion)){
		mysql_close($conexion);
	echo 'success';
}
	else mysql_close($conexion);
	
	
?>
