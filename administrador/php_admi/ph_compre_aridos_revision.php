<?php
 	include "../../php/conexion.php";

    $consulta = "SELECT * from certificado_hp_compresion WHERE id_informe =".$_GET['id']." and id_proyecto =".$_GET['id2']." and id_certificado=".$_GET['v'];
    $query = mysql_query($consulta,$conexion);
    $fila = mysql_fetch_array($query);
       echo ' <script> document.formAgregarcertificado.aridos.value ="'.$fila['procedencia_a'].'"; </script>';


   	?>