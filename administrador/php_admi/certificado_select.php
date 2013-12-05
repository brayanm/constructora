<?php
 	include "../../php/conexion.php";

    $consulta = "SELECT MAX(id_certificado)  as ncertificado from certificado WHERE id_informe =".$_GET['id']." and id_proyecto =".$_GET['id2'];
    $query = mysql_query($consulta,$conexion);
    $fila = mysql_fetch_array($query);
 
    if(  isset($fila['ncertificado']) ){   
    	echo ' <script> document.formAgregarcertificado.ncertificado.value ='.($fila['ncertificado']+1).' </script>';
    	       // echo '<option value="'.($fila['ncertificado']+1).'">'.(+1).'</option>';
    }
else  {
       echo ' <script> document.formAgregarcertificado.ncertificado.value = 1 ; </script>';
    };
 
?>