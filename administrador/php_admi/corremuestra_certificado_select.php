<?php
 	include "../../php/conexion.php";
 	
    $consulta = "SELECT * from certificado WHERE id_proyecto = ".$_GET['id2']." and id_informe =".$_GET['id']."and id_certificado=".$_GET['v'];
    $query = mysql_query($consulta,$conexion);   		
    while ($fila = mysql_fetch_array($query)) {
   		 echo '<option value='.$fila['correlacional'].'#'.$fila['muestra'].'>'.$fila['correlacional']."   --   ".$fila['muestra'].'</option>';
    };
 
?>