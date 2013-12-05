<?php

$contador = 0;
if ($ens=="compresion") {
 	$sql1="SELECT * FROM `vista` WHERE `correlacional`='$correlacion' and `muestra`='$muestra' and ensayo='3';";
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
	$resul = "INSERT INTO `resultados`(`correlacional`, `muestra`, `flexo_mpa`, `compre_mpa`, `hendi_mpa`, `c`) VALUES ('$correlacion' , '$muestra' ,'0' ,'$mpacompa','0' , '0') ";
	mysql_query($resul, $conexion);

 }
 else{
 	$sql1="SELECT * FROM `vista2` WHERE `correlacional`='$correlacion' and `muestra`='$muestra' and ensayo='4';";
 	$result=mysql_query($sql1, $conexion);
	 	while ($row = mysql_fetch_array($result)){
		
		if($contador==0) {
			$mpa22=$row['flmpa']; 
			$mpa23=$row['hempa'];
		}

		if($contador==1) {
			 $mpa32=$row['flmpa']; 
			 $mpa33=$row['hempa'];
			}
		if($contador==2) {
			$mpa42=$row['flmpa']; 
			$mpa43=$row['hempa'];
		}
		$contador++;
	}
	$mpaflexo = ($mpa22+$mpa32+$mpa42)/3;
	$mpahendi = ($mpa23+$mpa33+$mpa43)/3;
	$c = $mpaflexo/$mpahendi;
	$resul = "INSERT INTO `resultados`(`correlacional`, `muestra`, `flexo_mpa`, `compre_mpa`, `hendi_mpa`, `c`) VALUES ('$correlacion' , '$muestra' ,'$mpaflexo' ,'0','$mpahendi' , '$c') ";
	mysql_query($resul, $conexion);
} 

?>