<?php
 	include "../../php/conexion.php";
 	
    $consulta = "SELECT * from certificado WHERE id_proyecto = ".$_GET['id2']." and id_informe =".$_GET['id'];
    $query = mysql_query($consulta,$conexion);
   		 echo '<option disabled="disabled" ></option>';
    while ($fila = mysql_fetch_array($query)) {
        echo '<option value="'.$fila['id_certificado'].'">'.$fila['id_certificado'].'</option>';
    };
 
?>