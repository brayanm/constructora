<?php
include "../../php/conexion.php";

foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
} 

$sql= "UPDATE `proyecto` SET `estado`='0' WHERE `id_proyecto`='$proyecto_quitar'";
if(@mysql_query($sql, $conexion)){
	mysql_close($conexion);
	echo 'success';
}
	else mysql_close($conexion);
	
	
?>
