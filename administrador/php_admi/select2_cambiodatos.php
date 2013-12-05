<?php
 	include "../../php/conexion.php";
    $corre = $_GET['id'];
    
    $corre1 = explode ('#', $corre);
	$correlacion = $corre1[0];
	$muestra = $corre1[1];
	//echo '<script>alert("'.$muestra.'");</script>';  

	$sql ="SELECT `id_fecha`, `ensayo` FROM `registro_fecha` WHERE (`muestra`='$correlacion' AND `correlacional`='$correlacion')";
					
	$result = mysql_query($sql, $conexion);

	$total_count =mysql_num_rows($result); 
	echo "<option value='inicial'>Control campo</option>";
	if ($total_count!=0) {
		while($row = mysql_fetch_array($result)){
			if($row['ensayo']==1) echo "<option value=".$row['id_fecha'].">muestreo</option>";
			if($row['ensayo']==2) echo "<option value=".$row['id_fecha'].">ensayo 7 dias</option>";
			if($row['ensayo']==3) echo "<option value=".$row['id_fecha'].">ensayo 28 dias</option>";
			if($row['ensayo']==4) echo "<option value=".$row['id_fecha'].">ensayo 90 dias</option>";
		}					
	}     
?>