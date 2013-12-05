<?php
 	include "conexion.php";
 
    $consulta = "SELECT * from grado_hormigon WHERE proyecto = ".$_GET['id'];
    $query = mysql_query($consulta,$conexion);

    while ($fila = mysql_fetch_array($query)) {
        echo '<option value="'.$fila['nombre'].'">'.$fila['nombre'].'</option>';
    };
 
?>