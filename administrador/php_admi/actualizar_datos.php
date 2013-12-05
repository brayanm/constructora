<?php
include "../../php/conexion.php";
foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
} 
$v = true;
if (isset($_POST['cono'])) {
	$s4 = "UPDATE `registro` SET `cono`='$cono',`t_ambiente`='$tambiente',`t_curado`='$tcurado',`hora_control`='$hora',`compactacion`='$compactacion',`grado_hormigon`='$gradoh',`diseno`='$diseno',`n_guia`='$guia',`curado`='$curado',`proveedor`='$proveedor',`elemento_estructura`='$elemento',`confianza`='$confianza' WHERE correlacional='$correlacion' and muestra='$muestra'";
	if(!mysql_query($s4, $conexion)){$v = false;}
}
else{
	$contador = 0;
	if (isset($_POST['tiempo'])) {
		$mpaflexo = ($p * $l) / ($h *$h *$b);
		$s1="UPDATE `flexo_traccion` SET `tiempo`='$tiempo',`b`='$b',`h`='$h',`l`='$l',`p`='$p',`a`='$a',`mpa`='$mpaflexo' WHERE id_fecha='$id_f'";
		if(!mysql_query($s1, $conexion)){$v = false;}

		$mpahendi = ($p2 * 2)/($ll*$d *3.14159265);	
		$s2 = "UPDATE `hendimiento` SET `peso`='$peso',`peso_sumergido`='$pesoSumergido',`peso_saturado`='$pesoSaturado',`densidad`='$densidad2',`tiempo`='$tiempo2',`d`='$d',`l`='$ll',`p`='$p2',`mpa`='$mpahendi' WHERE id_fecha='$id_f'";
		if(!mysql_query($s2, $conexion)){$v = false;}

 		$sql1="SELECT * FROM `vista2` WHERE `correlacional`='$correlacion' and `muestra`='$muestra' and ensayo='4';";
 		$result=mysql_query($sql1, $conexion);
 		$t =mysql_num_rows($result);
 		if ($t!=0) {
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
			if ($contador==2) {
				$mpaflexo = ($mpa22+$mpa32+$mpa42)/3;
				$mpahendi = ($mpa23+$mpa33+$mpa43)/3;
				$c = $mpaflexo/$mpahendi;
				$resul = "INSERT INTO `resultados`(`correlacional`, `muestra`, `flexo_mpa`, `compre_mpa`, `hendi_mpa`, `c`) VALUES ('$correlacion' , '$muestra' ,'$mpaflexo' ,'0','$mpahendi' , '$c') ";
				if(!mysql_query($resul, $conexion)){$v = false;}
			}	
 		}	
	}
	if (isset($_POST['a3'])) {
		if($dato11!='' && $dato22!='' && $dato33!='') {
			$compaDensi=($dato11/$dato22-$dato33)*1000;
			$compaArea= $a3*$b3;		
			$mpacompa= ($p3/ $compaArea)*$factor3;
			$s3 = "UPDATE `comprecion` SET `a`='$a3',`b`='$b3',`h`='$h3',`densidad`='$compaDensi',`masa`='$masa3',`area`='$compaArea',`p`='$p3',`factor`='$factor3',`mpa`='$mpacompa',`dato1`='$dato11',`dato2`='$dato22',`dato3`='$dato33' WHERE id_fecha='$id_f'";
		}
		else{
			$compaDensi= $masa3/(($a3*$b3*$h3)/1000);
			$compaArea= $a3*$b3;		
			$mpacompa= ($p3/ $compaArea)*$factor3;
			$s3 = "UPDATE `comprecion` SET `a`='$a3',`b`='$b3',`h`='$h3',`densidad`='$compaDensi',`masa`='$masa3',`area`='$compaArea',`p`='$p3',`factor`='$factor3',`mpa`='$mpacompa' WHERE id_fecha='$id_f'";			
		}
		if(!mysql_query($s3, $conexion)){$v = false;}

		$sql1="SELECT * FROM `vista` WHERE `correlacional`='$correlacion' and `muestra`='$muestra' and ensayo='3';";
 		$result=mysql_query($sql1, $conexion);
 		$t =mysql_num_rows($result);
 		if ($t!=0) {
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
			if ($contador==2) {
				$mpacompa= ($mpa21+$mpa31+$mpa41)/3;
				$resul = "INSERT INTO `resultados`(`correlacional`, `muestra`, `flexo_mpa`, `compre_mpa`, `hendi_mpa`, `c`) VALUES ('$correlacion' , '$muestra' ,'0' ,'$mpacompa','0' , '0') ";
				if(!mysql_query($resul, $conexion)){$v = false;}
			}
 		}
	}
}

if ($v==true) {
	echo "<script>alert('Datos actualizados');</script>";
}
header("Location: ../../administracion.php");
?>