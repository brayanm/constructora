<?php
include "../../php/conexion.php";

foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
} 

$sql= "INSERT INTO `proveedor`(`proyecto`,`nombre`) VALUES ( '$proyecto_provee','$nombreProvee')";
if(@mysql_query($sql, $conexion)){

    mysql_close($conexion);
 	 echo 'success';
 	}
else mysql_close($conexion);
  
  
?>
 