<?php
 	include "../../php/conexion.php";
 	
    $consulta = "SELECT * from informe WHERE id_proyecto = ".$_GET['id'];
    $query = mysql_query($consulta,$conexion);
   		 echo '<option disabled="disabled" ></option>';
    while ($fila = mysql_fetch_array($query)) {
        echo '<option value="'.$fila['codigo'].'">'.$fila['codigo'].'</option>';
    };
 
?>