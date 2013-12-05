<?php

$contador = 0;
if ($ens=="compresion") {
 	$sql1="SELECT * FROM `estructura_vista` WHERE `correlacional`='$correlacion' and `muestra`='$muestra' and ensayo='3';";
 	$result=mysql_query($sql1, $conexion);
	 	while ($row = mysql_fetch_array($result)){
		
		if($contador==0) {
			$mpa21=$row['compa']; 
		}

		if($contador==1) {
			$mpa31=$row['compa'];
			}
		if($contador==2) {
			$mpa41=$row['compa']; 
		}
		$contador++;
	}
	$mpacompa= ($mpa21+$mpa31+$mpa41)/3;
	$resul = "INSERT INTO `estructura_resultados`(`correlacional`, `muestra`, `flexo_mpa`, `compre_mpa`, `hendi_mpa`, `c`) VALUES ('$correlacion' , '$muestra' ,'0' ,'$mpacompa','0' , '0') ";
	mysql_query($resul, $conexion);

 }

?>