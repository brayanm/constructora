<?php
 	include "../../php/conexion.php";

    $consulta = "SELECT * from certificado_hp_flexo WHERE id_informe =".$_GET['id']." and id_proyecto =".$_GET['id2']." and id_certificado=".$_GET['v'];
    $query = mysql_query($consulta,$conexion);
    $fila = mysql_fetch_array($query); 
           echo ' <script> document.formAgregarcertificado.comentario.value ="'.$fila['comentarios'].'"; </script>';


   	?>