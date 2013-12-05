<?php
include "../../php/conexion.php";

foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
} 

$sql= "INSERT INTO `proyecto`(`Nombre`, `codigo`, `sector`, `provincia`, `region`, `mandante`, `contratista`, `safi`) VALUES ( '$nombreproyecto', '$codigo', '$sector', '$provincia', '$region', 'mandante', 'contratista', 'safi')";
if(@mysql_query($sql, $conexion)){

	echo 'success';
}
	
?>
