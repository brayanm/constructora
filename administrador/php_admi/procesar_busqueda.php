<?php
include "../../php/conexion.php";

$corre1 = explode ('#', $_POST['corre']);
$correlacion = $corre1[0];
$muestra = $corre1[1];
$dato3 = $_POST['fecha'];
$p = $_POST['proyecto1'];
$s = "SELECT llena FROM `registro_fecha` WHERE `id_fecha`='$dato3' and llena='1'";
$con = mysql_query($s, $conexion);
$total = mysql_num_rows($con);
$s1 = "SELECT * FROM `registro` WHERE `correlacional`='$correlacion' and `muestra`='$muestra' and `id_proyecto`='$p'";
$c1 = mysql_query($s1, $conexion);
$r1=mysql_fetch_array($c1);
if ($total!=0) {
		if($r1['tipo']!=0){
			$sqlf = "select * from flexo_traccion where id_fecha='$dato3'";
			$sqlh = "select * from hendimiento where id_fecha='$dato3'";
			$conf = mysql_query($sqlf, $conexion);
			$conh = mysql_query($sqlh, $conexion);
			$rowf=mysql_fetch_array($conf);
			$rowh=mysql_fetch_array($conh);
		}else{
			$sqlc = "select * from comprecion where id_fecha='$dato3'";
			$conc = mysql_query($sqlc, $conexion);
			$rowc=mysql_fetch_array($conc);
		}
	?>
	<meta charset="utf-8"> 
			 <?php  echo " <link rel='stylesheet' type='text/css' href='../../css/estilomuestra.css'/>" ?>
	<body>
			 <?php echo"  <div class='contenedor'>        <div id='cpestana1'>" ?>
	<center><form method="post" name='myForm' id='myForm' action="actualizar_datos.php">
		<h1>Cambio de datos</h1><br>
		<table>
		<tr><td colspan='4' align="center"></td>
	
		
			<?php echo "<input type='hidden' name='id_f' value='$dato3'>\n"; ?>
			<?php echo "<input type='hidden' name='correlacion' value='$correlacion'>\n"; ?> 
			<?php echo "<input type='hidden' name='muestra' value='$muestra'>\n"; ?>  

			<?php
				if ($r1['tipo']!=0){ 
			 ?>
			<h2>Flexo Tracción</h2>
					</tr>
			<tr>
				<td>Tiempo (s)</td>
				<td>
					<?php echo "<input type=number name='tiempo' max='999' value='$rowf[tiempo]' required>\n"; ?>
				</td>
				<td>L (s)</td>
				<td>
					<?php echo "<INPUT  type=number name='l' max='999' value='$rowf[l]' required>\n"; ?>
				</td>
			</tr>
			<tr>
				<td>b (mm)</td>
				<td>
					<?php echo "<INPUT type=number name='b' max='999' value='$rowf[b]' required>\n"; ?>
				</td>
				<td>P (N)</td>
				<td>
					<?php echo "<INPUT  type=number name='p' max='99999' value='$rowf[p]' required>\n"; ?>
				</td>
			</tr>
			<tr>
				<td>h (mm)</td>
				<td>
					<?php echo "<INPUT type=number name='h' max='999' value='$rowf[h]' required>\n"; ?>
				</td>
				<td>a (mm)</td>
				<td>
					<?php echo "<INPUT  type=text pattern='\d{1}\.\d{1,2}' name='a' value='$rowf[a]' title='Debe tener un entero y 2 decimales.Ej: 0.05' required>\n"; ?>
				</td>
			</tr>
		<tr><td colspan='4' align="center"><h2>Hendimiento</h2></td></tr>	
			<tr>
				<td>Peso (gr)</td>
				<td>
					<?php echo "<INPUT type=number name='peso' max='9999' value='$rowh[peso]' required>\n"; ?>
				</td>
				<td>Tiempo (s)</td>
				<td>
					<?php echo "<INPUT type=number name='tiempo2' max'999' value='$rowh[tiempo]' required>\n"; ?>
				</td>
			</tr>
			<tr>
				<td>Peso Sumergido (gr)</td>
				<td>
					<?php echo "<INPUT type=number name='pesoSumergido' max='9999' value='$rowh[peso_sumergido]' required>\n"; ?>
				</td>
				<td>d (mm)</td>
				<td>
					<?php echo "<INPUT type=number name='d' max='999' value='$rowh[d]' required>\n"; ?>
				</td>
			</tr>
			<tr>
				<td>Peso Saturado (gr)</td>
				<td>
					<?php echo "<INPUT type=number name='pesoSaturado' max='9999' value='$rowh[peso_saturado]' required>\n"; ?>
				</td>
				<td>l (mm)</td>
				<td>
					<?php echo "<INPUT type=number name='ll' max='999' value='$rowh[l]' required>\n"; ?>
				</td>
			</tr>
			<tr>
				<td>Densidad (Kg/cm3)</td>
				<td>
					<?php echo "<INPUT type=text pattern='\d{1}\.\d{1,3}'' name='densidad2' value='$rowh[densidad]' title='Debe tener un entero y 3 decimales.Ej: 2.349' required>\n"; ?>
				</td>
				<td>P (N)</td>
				<td>
					<?php echo "<INPUT type=number name='p2' max='999999' value='$rowh[p]' required>\n"; ?>
				</td>
			</tr>
		<?php } 
		else{ ?>
		<tr><td colspan='4' align="center" ><h2>Compresión</h2></td></tr>
			<tr>
				<td>a</td>
				<td>
					<?php echo "<INPUT type=number name='a3' max='999' value='$rowc[a]' required>\n"; ?>
				</td>
				<td>Masa</td>
				<td>
					<?php echo "<INPUT type=number name='masa3' max='9999' value='$rowc[masa]' required>\n"; ?>
				</td>
			</tr>
			<tr>
				<td>b</td>
				<td>
					<?php echo "<INPUT type=number name='b3' max='999' value='$rowc[b]' required>\n"; ?>
				</td>
				<td>P (N)</td>
				<td>
					<?php echo "<INPUT type=number name='p3' max='9999999' value='$rowc[p]' required>\n"; ?>
				</td>
			</tr>
			<tr>
				<td>h</td>
				<td>
					<?php echo "<INPUT type=number name='h3' max='999' value='$rowc[h]' required>\n"; ?>
				</td>
				<td>Factor</td>
				<td>
					<?php echo "<INPUT type=text pattern='\d{1}\.\d{1,3}'' name='factor3' value='$rowc[factor]' title='Debe tener un entero y 2 decimales.Ej: 0.95' required>\n"; ?>

				</td>
			</tr>
			<tr>	
			<td colspan='4' align="center">  <br> instrucciones </br>  solo usar en caso extremo </td>
			</tr>
			<tr>
				<td>A</td>
				<td>
					<?php if ($rowc['dato1']==0) {
						echo "<INPUT type=number name='dato11' max='9999'>";
					}
					else{
						echo "<INPUT type=number value='$rowc[dato1]' name='dato11' max='9999'>"; } ?>
				</td>
				<td>B</td>
				<td>
					<?php if ($rowc['dato2']==0) {
						echo "<INPUT type=number name='dato22' max='9999'>"; 
					}else{
						echo "<INPUT type=number value='$rowc[dato2]' name='dato22' max='9999'>";} ?>
				</td>
			</tr>
				<tr>
				<td>C</td>
				<td>
					<?php if ($rowc['dato3']==0) {
						echo "<INPUT type=number name='dato33' max='9999'>";
					}else{ 
						echo "<INPUT type=number value='$rowc[dato3]' name='dato33' max='9999'>";} ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td><form><input type=button value="Salir" onClick=location='../seleccion.php'></form></td>
				<td><input type="submit" name="actualizar" value="Actualizar"></td>
			</tr>
		</table><br>
	</form></center>
	 <?php echo " </div>  </div>" ?>
</body>
<?php 
}
else if($dato3=='inicial'){ ?>
	<meta charset="utf-8"> 
			 <?php  echo " <link rel='stylesheet' type='text/css' href='../../css/estilomuestra.css'/>" ?>:
	<body>
			 <?php echo"  <div class='contenedor'>        <div id='cpestana1'>" ?>
	<center><form method="post" name='myForm' id='myForm' action="actualizar_datos.php">
		<h1>Cambio de datos</h1><br>
		<table>
		<tr><td colspan='4' align="center"></td>
			<?php echo "<input type='hidden' name='correlacion' value='$correlacion'>\n"; ?> 
			<?php echo "<input type='hidden' name='muestra' value='$muestra'>\n"; ?>
	<h2>Control de Campo</h2>
		<table>
		<tr>
			<td>Cono</td>
			<td>
				<?php echo "<INPUT type=text pattern='\d{1,2}\.\d{0,1}' value='$r1[cono]' name='cono' title='Debe tener 1 decimal.Ej: 12.0' required>" ?>
			</td>
			<td>Grado Hormigón</td>
			<td>
				
				<select name="gradoh" id="gradoh"  required>
					<?php 
					$consulta = "SELECT * from grado_hormigon WHERE proyecto = '$p'";
    				$query = mysql_query($consulta,$conexion);
					while ($fila = mysql_fetch_array($query)) {
						if ($fila['nombre']!=$r1['grado_hormigon']) {
							echo '<option value="'.$fila['nombre'].'">'.$fila['nombre'].'</option>';
						}
						else{
        				echo '<option value="'.$fila['nombre'].'" selected>'.$fila['nombre'].'</option>';}
    				}
					?>							
				</select>			
			</td>
		</tr>
		<tr>
			<td>T° Ambiente</td>
			<td>
				<?php echo "<INPUT type=text pattern='\d{1,2}\.\d{1,1}' value='$r1[t_ambiente]' name='tambiente' title='Debe tener 1 decimal.Ej: 20.2' required>" ?>
			</td>
			<td>Diseño</td>
			<td>
				<?php echo "<INPUT type=text value='$r1[diseno]' name='diseno' required>" ?>
			</td>
			<td>Nivel Confianza</td>
			<td>
				<?php echo "<INPUT type=number value='$r1[confianza]' name='confianza' max='100' required>" ?>
			</td>
		</tr>
		<tr>
			<td>T° Curado</td>
			<td>
				<?php echo "<INPUT type=text step='0.1' pattern='\d{1,2}\.\d{1}' value='$r1[t_curado]' name='tcurado' title='Debe tener 1 decimal.Ej: 12.0' required>" ?>
			</td>
			<td>N° Guia</td>
			<td>
				<?php echo "<INPUT type=text value='$r1[n_guia]' name='guia' required>" ?>
			</td>
		</tr>
		<tr>
			<td>Hora Control</td>
			<td>
				<?php echo "<input type='time' value='$r1[hora_control]' name='hora' required>" ?>
			</td>
			<td>Curado</td>
			<td>
				<?php echo "<INPUT type=text value='$r1[curado]' name='curado' required>" ?>
			</td>
		</tr>
		<tr>
			<td>Compactación</td>
			<td>
				<?php echo "<INPUT type=text value='$r1[compactacion]' name='compactacion' required>" ?>
			</td>
			<td>Proveedor</td>
			<td>
				
				<select name="proveedor" id="proveedor"  required>
					<?php 
				    $consulta1 = "SELECT * from proveedor WHERE proyecto = '$p'";
				    $query1 = mysql_query($consulta1,$conexion);
				    while ($fila1 = mysql_fetch_array($query1)) {
				    	if ($fila1['nombre']!=$r1['proveedor']) {
				    		echo '<option value="'.$fila1['nombre'].'">'.$fila1['nombre'].'</option>';
				    	}
				    	else{
				        echo '<option value="'.$fila1['nombre'].'" selected>'.$fila1['nombre'].'</option>';}
				    }
					?>
				</select>			
			</td>
		</tr>
			<tr>
			<td>Elemento-Estructura</td>
			<td>
				<?php echo "<textarea type=tex rows=7 cols=20 name='elemento' required>$r1[elemento_estructura]</textarea>" ?>
			</td>
		</tr>
			<tr>
				<td><form><input type=button value="Salir" onClick=location='../seleccion.php'></form></td>
				<td><input type="submit" name="actualizar" value="Actualizar"></td>
			</tr>
		</table><br>
	</form></center>
	 <?php echo " </div>  </div>" ?>
</body>				
<?php }
else{
	echo "malo";
}
?>
