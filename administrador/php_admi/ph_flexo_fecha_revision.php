<?php
 	include "../../php/conexion.php";

    $consulta = "SELECT * from certificado_hp_flexo WHERE id_informe =".$_GET['id']." and id_proyecto =".$_GET['id2']." and id_certificado=".$_GET['v'];
    $query = mysql_query($consulta,$conexion);
    $fila = mysql_fetch_array($query);    
    $fecha2 =explode("-",$fila['fecha']);
       echo ' <script> document.formAgregarcertificado.f1.value ="'.$fecha2[0].'-'.$fecha2[1].'-'.$fecha2[2].'"; </script>';


   	?>