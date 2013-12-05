
<form id="resumen" name="resumen" action="administrador/php_admi/Resumen_Certificados.php" method="post">
	<center><table>
		<tr><h2>Generar Resumen Hormigon Pavimento</h2></tr>
		<tr>
		<td>Proyecto</td>
		<td>
			<select name="proyecto" id="proyecto" required autofocus>
			<option disabled="disabled" selected="selected"></option>
			<?php
			include "../../php/conexion.php";
			$cons = "select * from proyecto where estado = '1' ";
			$res = mysql_query($cons, $conexion);
			$t =mysql_num_rows($res);
			if ($t!=0) {
				while ($r = mysql_fetch_array($res)) {
					echo "<option value='$r[id_proyecto]'>$r[Nombre]</option>";
				}
			}	
			?>
			</select>
		</td>
		<td>Tipo </td>
		<td>
		<select name="tipo" id="tipo" required autofocus>
		<option disabled="disabled" selected="selected"></option>
		<option value="1">Flexo-Hendimiento</option>
		<option value="0">Compresion</option>
		</select>
		</td>
		</tr>
	</table>
	<button  class="button darkblue" type="submit" name="aceptar" > Aceptar </button>	
	</center>	
</form>