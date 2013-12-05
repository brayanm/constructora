<?php
include "../../php/conexion.php";

foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
}

 $corre = explode ('#', $corre); //metodo split java de php
 $consulta = "SELECT tipo from registro WHERE correlacional = '$corre[0]' and muestra = '$corre[1]' ";
 $query = mysql_query($consulta,$conexion);
 $fila = mysql_fetch_array($query);
 $consulta = "UPDATE certificado set revision = $revision where id_certificado = $selectcertificado and id_informe='".$informe69."' and id_proyecto=$proyectoCertificado ";
 $query = mysql_query($consulta,$conexion);

if(isset($ensayoc) and  isset($luz)){	

 	$consulta2 = "UPDATE certificado_hp_flexo set fecha='".$f1."', procedencia_a ='".$aridos."', comentarios='".$comentario."', luz_ensayo='".$luz."' , ensayo_carga= '".$ensayoc."'
 	 where id_certificado = $selectcertificado and id_informe='".$informe69."' and id_proyecto=$proyectoCertificado ";
 	}
else{
 	$consulta2 = "UPDATE certificado_hp_compresion set fecha='".$f1."', procedencia_a ='".$aridos."', comentarios='".$comentario."' where id_certificado = $selectcertificado and id_informe='".$informe69."' and id_proyecto=$proyectoCertificado ";

}
 if ( !@mysql_query($consulta2,$conexion)){

 	echo '<scripr> alert("error") </script>;';

 }
 echo $fila['tipo']; 

mysql_close($conexion);
 

?>
