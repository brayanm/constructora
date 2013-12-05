<?php
include "conexion.php";

if(isset($_POST['busqueda1'])){
$corre1 = explode ('#', $_POST['corre']);
$correlacion = $corre1[0];
$muestra = $corre1[1];

$sql1 = "Select fecha from registro_fecha where correlacional='$correlacion' and muestra='$muestra' and llena='1' and ensayo='1'";
$sql3 = "Select llena from registro_fecha where correlacional='$correlacion' and muestra='$muestra' and llena='0'";
$sql4 = "Select id_proyecto from registro where correlacional='$correlacion' and muestra='$muestra'";
$consulta4 = mysql_query($sql4, $conexion);

$proyecto=mysql_fetch_array($consulta4);
$sql5 ="Select nombre from proyecto where id_proyecto= '$proyecto[id_proyecto]'";
$consulta1 = mysql_query($sql1, $conexion);
$consulta3 = mysql_query($sql3, $conexion);
$consulta4 = mysql_query($sql5, $conexion);
$total = mysql_num_rows($consulta1);
$total1 = mysql_num_rows($consulta3);

if($total!=0 && $total1!=0){
	echo "<meta http-equiv='Content-Type' content='text/html'; charset='utf-8' />
	<link rel='stylesheet' type='text/css' href='../css/tabla.css'/>
	<link rel='stylesheet' type='text/css' href='../css/estilo.css'/>\n";
	echo "<div class='contenedor'>\n";
	echo "<center><table class='titulos'>\n"; 
	echo "<tr class='headers'>\n"; 
	echo "<th class='nose'>N° Correlación</th>\n"; 
	echo "<th class='nose'>N° Muestra</th>\n"; 
	echo "<th class='nose'>Fecha Muestreo</th>\n"; 
	echo "<th class='nose'>Proyecto</th>\n"; 
	echo "<th></th>\n"; 
	echo "</tr>\n"; 
	echo "</table></center>\n"; 
	echo "<div class='contiene_tabla'>\n"; 
	echo "<center><table>\n"; 
	if($row=mysql_fetch_array($consulta1)) {		
	$proyecto=mysql_fetch_array($consulta4);
		echo "<form action='../pavimento/ensayos.php' method='post'>";
		echo "<tr>
		<td>$correlacion</td>
		<td>$muestra</td>
		<td>$row[fecha]</td>
		<td>$proyecto[nombre]</td>
		<td><input type='submit' value='Ingresar'></td></tr>\n";

		echo "<input type='hidden' name='campo1' value='$correlacion'>\n";
		echo "<input type='hidden' name='campo2' value='$muestra'>\n";
		echo "</form>\n";
	} 
	else{ echo "error";}
	echo "</table></center>\n";
	echo "</div>\n";
echo "</div>\n";
}
else{echo "malo";}
}



if(isset($_POST['busqueda2'])){
$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];

$sql = "Select * from registro_fecha where fecha>='$fecha1' and fecha<='$fecha2' and ensayo='1'";
$consulta = mysql_query($sql, $conexion);
$c = 0;
while($row=mysql_fetch_array($consulta)) {
	$sql4 = "Select llena from registro_fecha where correlacional='$row[correlacional]' and muestra='$row[muestra]' and llena='0'";
	$consulta4 = mysql_query($sql4, $conexion);
	$total2 = mysql_num_rows($consulta4);
	if($total2!=0){$c++;}
}
if($c!=0){
	echo "<meta http-equiv='Content-Type' content='text/html'; charset='utf-8' />
	<link rel='stylesheet' type='text/css' href='../css/tabla.css'/>
	<link rel='stylesheet' type='text/css' href='../css/estilo.css'/>\n";
	echo "<div class='contenedor'>\n";
	echo "<center><table class='titulos'>\n"; 
	echo "<tr class='headers'>\n"; 
	echo "<th class='nose'>N° Correlación</th>\n"; 
	echo "<th class='nose'>N° Muestra</th>\n"; 
	echo "<th class='nose'>Fecha Muestreo</th>\n"; 
	echo "<th class='nose'>proyecto</th>\n"; 
	echo "<th></th>\n"; 
	echo "</tr>\n"; 
	echo "</table></center>\n"; 
	echo "<center><div style='height:500px;width:715px;overflow:scroll;>\n";
	echo "<div class='contiene_tabla'>\n"; 
	echo "<table>\n"; 
	$sql6 = "Select * from registro_fecha where fecha>='$fecha1' and fecha<='$fecha2' and ensayo='1'";
	$consulta6 = mysql_query($sql6, $conexion);
	while($row1=mysql_fetch_array($consulta6)) {
		$sql4 = "Select llena from registro_fecha where correlacional='$row1[correlacional]' and muestra='$row1[muestra]' and llena='0'";
		$consulta4 = mysql_query($sql4, $conexion);
		$total3 = mysql_num_rows($consulta4);

		$sql69 = "Select id_proyecto from registro where correlacional='$row1[correlacional]' and muestra='$row1[muestra]'";
		$consulta69 = mysql_query($sql69, $conexion);
		$proyecto=mysql_fetch_array($consulta69);
		$sql69 ="Select nombre from proyecto where id_proyecto= '$proyecto[id_proyecto]'";
		$consulta69 = mysql_query($sql69, $conexion);
		$proyecto=mysql_fetch_array($consulta69);

		if($total3!=0){
			echo "<form action='../pavimento/ensayos.php' method='post'>\n";
			echo "<tr>
			<td>$row1[correlacional]</td>
			<td>$row1[muestra]</td>
			<td>$row1[fecha]</td>
			<td>$proyecto[nombre]</td>
			<td ><input type='submit' value='Ingresar'></td></tr>\n";
			echo "<input type='hidden' name='campo1' value='$row1[correlacional]'>\n";
			echo "<input type='hidden' name='campo2' value='$row1[muestra]'>\n";
			echo "</form>\n";
		}
	} 
	echo "</table>\n";
	echo "</div>\n";
	echo "</div></center>\n";
	echo "</div>\n";
}
else{echo "malo";}
}
?>