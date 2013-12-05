<?php
include "conexion.php";
$cr = $_POST["cr"];
$mt = $_POST["mt"];

$sql = "select id_proyecto, correlacional, muestra from registro where correlacional='$cr' and muestra='$mt'";
$consulta = mysql_query($sql, $conexion);
$total = mysql_num_rows($consulta);
if ($total!=0) {
	echo "<meta http-equiv='Content-Type' content='text/html'; charset='utf-8' />
	<link rel='stylesheet' type='text/css' href='../css/tabla.css'/>
	<link rel='stylesheet' type='text/css' href='../css/estilo.css'/>\n";
	echo "<div class='contenedor'>\n";
	echo "<center><table class='titulos'>\n"; 
	echo "<tr class='headers'>\n";	
	echo "<th class='nose'>N° Correlación</th>\n"; 
	echo "<th class='nose'>N° Muestra</th>\n";
	echo "</tr>\n"; 
	echo "</table></center>\n"; 
	echo "<div class='contiene_tabla'>\n"; 
	echo "<center><table>\n"; 
	if($row=mysql_fetch_array($consulta)) {
		echo "<tr><td>$cr</td><td>$mt</td></tr>\n";
	} 
	echo "</table></center><br>\n";
	echo "<tr>\n";
	echo "<form action='proceso.php' method='post'>\n";
	echo "<tr><td>N° Informe</td><td><input type=text name='informe'></td><td>Certificado</td><td><input type=text name='certificado'></td><td><input type=submit name='agregarI' value='Agregar'></td></tr>\n";
	echo "<input type='hidden' name='cr' value='$cr'>\n";
	echo "<input type='hidden' name='mt' value='$mt'>\n";
	echo "</form>\n";
	echo "</tr>\n";
	echo "</div>\n";
	echo "</div>\n";
}else{
	echo "malo";
}

if (isset($_POST['agregarI'])) {
	$informe = $_POST["informe"];
	$certificado = $_POST["certificado"];
	$sql="INSERT INTO `informe`(`correlacional`, `muestra`, `num_informe`, `num_certificado`) VALUES ( '$cr', '$mt', '$informe', '$certificado')";
	if (@mysql_query($sql, $conexion)){ 
		echo "<script>alert('Datos agregado')</script>"; 
	}
	else{echo "<script>alert('Error')</script>";}
}
?>