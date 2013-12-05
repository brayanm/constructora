<?php
include "../../php/conexion.php";

foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
}
 $corre = explode ('#', $corre); //metodo split java de php

 $consulta = "SELECT tipo from registro WHERE correlacional = '$corre[0]' and muestra = '$corre[1]' ";
 $query = mysql_query($consulta,$conexion);
 $fila = mysql_fetch_array($query);

 $consulta = "INSERT INTO certificado(id_certificado, id_proyecto , id_informe, correlacional, muestra) VALUES ('$ncertificado', '$proyectoCertificado' , '$informe69' , '$corre[0]' , '$corre[1]')";
 $query = mysql_query($consulta,$conexion);
if(isset($ensayoc) and  isset($luz)){	
 	$consulta2 = "INSERT INTO certificado_hp_flexo(id_certificado, id_informe , id_proyecto, fecha, procedencia_a,comentarios, luz_ensayo , ensayo_carga) 
 	VALUES ('$ncertificado', '$informe69', '$proyectoCertificado'  , '$f1' , '$aridos', '$comentario', '$luz', '$ensayoc')";
}
else{
 	$consulta2 = "INSERT INTO certificado_hp_compresion (id_certificado, id_informe , id_proyecto, fecha, procedencia_a, comentarios) 
 	VALUES ('$ncertificado', '$informe69', '$proyectoCertificado'  , '$f1' , '$aridos', '$comentario')";


}
 if ( @mysql_query($consulta2,$conexion)){

 }

 echo $fila['tipo']; 
 

?>
