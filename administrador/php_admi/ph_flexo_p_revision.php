<?php
 	include "../../php/conexion.php";

    $consulta = "SELECT * from certificado_hp_flexo WHERE id_informe =".$_GET['id']." and id_proyecto =".$_GET['id2']." and id_certificado=".$_GET['v'];
    $query = mysql_query($consulta,$conexion);
    $fila = mysql_fetch_array($query);
    if ("450"==$fila['ensayo_carga']){
    	echo '<option value="450"> 450 </option>';
    	echo '<option value="350"> 350 </option>';

    }
    else{    	
    	echo '<option value="350"> 350 </option>';
    	echo '<option value="450"> 450 </option>';

    }


   	?>