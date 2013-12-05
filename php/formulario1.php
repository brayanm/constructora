<?php

foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
} 

include "conexion.php";

$sql="INSERT INTO `registro`(`id_proyecto`, `correlacional`, `muestra`, `cono`, `t_ambiente`, `t_curado`, `hora_control`, `compactacion`, `grado_hormigon`, `diseno`, `n_guia`, `curado`, `proveedor`, `elemento_estructura`,`tipo`,`confianza`) VALUES ( '$proyecto', '$correlacion', '$muestra' , '$cono', '$tambiente', '$tcurado', '$hora' , '$compactacion' , '$gradoh' , '$diseno', '$guia' ,'$curado', '$proveedor' , '$elemento','$tipoform', '$confianza')";


if (@mysql_query($sql, $conexion)){ 

 echo "success"; 
}


?>