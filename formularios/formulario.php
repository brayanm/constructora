<?php
include "../php/conexion.php";
?>

<?php
function showText($testing) // Variable utilizada para el texto
{
        echo $testing;
}
?>
<html>
<head>
<meta charset="utf-8"> 


 <script type="text/javascript"> 
        // esperamos que el DOM cargue
        $(document).ready(function() { 
            // definimos las opciones del plugin AJAX FORM
            var opciones= {
                               success: mostrarRespuesta, //funcion que se ejecuta una vez enviado el formulario
                               
            };
             //asignamos el plugin ajaxForm al formulario myForm y le pasamos las opciones
            $('#myForm').ajaxForm(opciones) ; 
            
             //lugar donde defino las funciones que utilizo dentro de "opciones"
        
             function mostrarRespuesta (responseText){
             				if(responseText == 'success'){             				
                           			alert(" agregado ");  
                           			document.formulario1.campo1.value = document.myForm.correlacion.value;
                           			document.formulario1.campo2.value = document.myForm.muestra.value ;                           			
										for (i = 0; i <2; i++) {
											if (document.myForm.tipoform[i].checked) {
												document.formulario1.campo3.value = document.myForm.tipoform[i].value;
											}
										}
									document.formulario1.submit(); 
							}                          			                           		
                           		
                           	else
                           		alert("malo");
             };
   
        }); 

//setTimeout("dime()",9000);

</script> 
<script language="JavaScript" type="text/JavaScript">
    $(document).ready(function(){
        $("#proyecto").change(function(event){
            var id = $("#proyecto").find(':selected').val();
            $("#gradoh").load('php/genera-select.php?id='+id);
            $("#proveedor").load('php/genera-select2.php?id='+id);
        });
    });
</script>

</head>
<body>
<center>
	<form id="myForm" method="POST" action="php/formulario1.php" name="myForm">
	<h2>Registro</h2>
	<table>
		<tr>
			<td>Proyecto</td>
			<td>
				<select name="proyecto" id="proyecto" required autofocus>
							<option disabled="disabled" selected="selected"></option>
					<?php
						$cons = "select * from proyecto";
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
		</tr>
		<tr>
			<td >N° Correlación</td>
			<td>
				<input type=number name="correlacion" required>
			</td>
		</tr>
		<tr>
			<td>N° Muestra</td>
			<td>
				<INPUT type=number name="muestra" required>
			</td>
		</tr>
		<tr>
			<td> <h2> Tipo formulario:  </h2> </td>
		</tr><tr>
			<td> Flexo Traccion - Hendimiento: <input type=radio name="tipoform" value="1" ></td>
			<td> Compactacion: <input type=radio name="tipoform" value="0" ></td>			
		</tr>
	</table>
	<h2>Control de Campo</h2>
		<table>
		<tr>
			<td>Cono</td>
			<td>
				<INPUT type=text pattern="\d{1,2}\.\d{0,1}" name="cono" title="Debe tener 1 decimal.Ej: 12.0" required>
			</td>
			<td>Grado Hormigón</td>
			<td>
				
				<select name="gradoh" id="gradoh"  required>
					<option disabled="disabled" selected="selected"></option>
					
					

				
				</select>
			
			</td>
		</tr>
		<tr>
			<td>T° Ambiente</td>
			<td>
				<INPUT type=text pattern="\d{1,2}\.\d{1,1}" name="tambiente" title="Debe tener 1 decimal.Ej: 20.2" required>
			</td>
			<td>Diseño</td>
			<td>
				<INPUT type=text name="diseno" required>
			</td>
			<td>Nivel Confianza</td>
			<td>
				<INPUT type=number name="confianza" max="100" required>
			</td>			
		</tr>
		<tr>
			<td>T° Curado</td>
			<td>
				<INPUT type=text step="0.1" pattern="\d{1,2}\.\d{1}" name="tcurado" title="Debe tener 1 decimal.Ej: 12.0" required>
			</td>
			<td>N° Guia</td>
			<td>
				<INPUT type=text name="guia" required>
			</td>
		</tr>
		<tr>
			<td>Hora Control</td>
			<td>
				<input type="time" name="hora" required>
			</td>
			<td>Curado</td>
			<td>
				<INPUT type=text name="curado" required>
			</td>
		</tr>
		<tr>
			<td>Compactación</td>
			<td>
				<INPUT type=text name="compactacion" required>
			</td>
			<td>Proveedor</td>
			<td>
				
				<select name="proveedor" id="proveedor"  required>
					<option disabled="disabled" selected="selected"></option>
					
					
				
				</select>
			
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Elemento-Estructura</td>
			<td>
				<textarea type=tex rows=10 cols=46 name="elemento" required></textarea>
			</td>
		</tr>
	</table><br>
	<button  class="button darkblue" type="submit" value="Aceptar"> Aceptar </button>
</form>

</center>

<form action="pavimento/muestreo.php" method=post name="formulario1"> 
	<input type="hidden" name="campo1"> 
	<input type="hidden" name="campo2" > 
	<input type="hidden" name="campo3" > 
</form> 

</body>

</html>