<?php
 	include "../../php/conexion.php";

    $consulta = "SELECT * from certificado_hp_flexo WHERE id_informe =".$_GET['id']." and id_proyecto =".$_GET['id2']." and id_certificado=".$_GET['v'];
    $query = mysql_query($consulta,$conexion);
    $fila = mysql_fetch_array($query);
    if ('P'==$fila['luz_ensayo']){
    	echo '<option value="P"> P </option>';
    	echo '<option value="P/2"> P/2 </option>';

    }
    else{    	
    	echo '<option value="P/2"> P/2 </option>';
    	echo '<option value="P"> P </option>';

    }
    
     mysql_close($conexion);

   	?>