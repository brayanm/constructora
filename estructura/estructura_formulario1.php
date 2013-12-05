<?php

foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
} 

include "../php/conexion.php";

$sql="INSERT INTO `estructura_registro`(`id_proyecto`, `correlacional`, `muestra`, `cono`, `t_ambiente`, `t_curado`, `hora_control`, `compactacion`, `grado_hormigon`, `diseno`, `n_guia`, `curado`, `proveedor`, `elemento_estructura`,`tipo`,`confianza`) VALUES ( '$proyecto2', '$correlacion', '$muestra' , '$cono', '$tambiente', '$tcurado', '$hora' , '$compactacion' , '$gradoh2' , '$diseno', '$guia' ,'$curado', '$proveedor2' , '$elemento','1', '$confianza')";


if (@mysql_query($sql, $conexion)){ 

 echo "success"; 
}


?>