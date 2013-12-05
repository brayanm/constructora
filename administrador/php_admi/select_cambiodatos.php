<?php
 	include "../../php/conexion.php";
    $id = $_GET['id'];  
    $consulta = "SELECT * from registro WHERE id_proyecto ='$id'";
    $query = mysql_query($consulta,$conexion);
    echo '<option disabled="disabled" selected="selected"></option>';
    while ($fila = mysql_fetch_array($query)) {
    	  	$resp[0] =$fila['correlacional'];
  			$resp[1] =$fila['muestra'];
        echo "<option value=".$resp[0]."#".$resp[1].">".$resp[0]."   --   ".$resp[1]."</option>";
    }
?>