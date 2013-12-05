<?php
 	include "../../php/conexion.php";
    $id = $_GET['id'];
    $t = $_GET['v'];
    $consulta = "SELECT * from registro WHERE id_proyecto ='$id' and tipo='$t'";
    $query = mysql_query($consulta,$conexion);

    while ($fila = mysql_fetch_array($query)) {
    	  	$resp[0] =$fila['correlacional'];
  			$resp[1] =$fila['muestra'];
  			$sql = "SELECT `llena` FROM `registro_fecha` WHERE `correlacional`='$resp[0]' and `muestra` ='$resp[1]' group by `llena`";
  			$query2 = mysql_query($sql,$conexion);
  			$row = mysql_num_rows($query2);
  			if ($row==1){
        echo '<option value='.$resp[0].'#'.$resp[1].'>'.$resp[0]."   --   ".$resp[1].'</option>';
    		}
    };
 
?>