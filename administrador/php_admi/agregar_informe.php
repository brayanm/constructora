<?php
include "../../php/conexion.php";

foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
} 

$sql= "INSERT INTO `informe`(`id_proyecto`,`codigo`) VALUES ( '$proyecto_informe','$codigoInforme')";
if(@mysql_query($sql, $conexion)){
    mysql_close($conexion);
  echo 'success';
}
  else mysql_close($conexion);
  
  
?>
