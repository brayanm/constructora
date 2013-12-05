
<?php

include "../php/conexion.php";

?>


<html>

<head>

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
                           			document.ensayo.campo1.value = document.myForm.correlacion.value ;
                           			document.ensayo.campo2.value = document.myForm.muestra.value ;
                           			document.ensayo.submit();
                           			    }  

                            else if(responseText == 'fecha')  {
                            	alert(" No agregado, aun no se cumple la fecha especificada en el ensayo seleccionado");   
                            	}                     		
                           		
                           		else
                           			alert("malo");
             };
   
        });
</script> 


</head>

<body>
<div id="form1">
<center><form method="post" name="myForm" id="myForm" action="../php/agregar_ensayo_flexo.php">


	<input type="hidden" name="correlacion" value="<?php echo $correlacion ?>" >
	<input type="hidden" name="muestra" value="<?php echo $muestra ?>" >	
	

	<h1>Ensayo Sala</h1><br>
	<table>
		<tr><td><h2>Fecha Ensayo</h2></td></tr>
		<tr>
			<td>Ensayo</td>
			<td>
				<select name="id_fecha" required>

					<?php
			
				
					$sql ="SELECT `id_fecha`,`fecha`, `llena`, `ensayo` FROM `registro_fecha` WHERE (`muestra`='$muestra' AND `correlacional`='$correlacion' AND `llena`='0')";
					
					$result = mysql_query($sql, $conexion);

					$total_count =mysql_num_rows($result); 

					if ($total_count!=0) {
							while($row = mysql_fetch_array($result)){
					
					 		if($row['ensayo']==1) echo "<option value=".$row['id_fecha']."> ".$row['fecha']."  (muestreo)  </option>";
					 		if($row['ensayo']==2) echo "<option value=".$row['id_fecha']."> ".$row['fecha']."  (ensayo 7 dias)  </option>";
					 		if($row['ensayo']==3) echo "<option value=".$row['id_fecha'].">" .$row['fecha']."  (ensayo 28 dias)  </option>";
					 		if($row['ensayo']==4) echo "<option value=".$row['id_fecha']."> ".$row['fecha']."  (ensayo 90 dias)  </option>";
						 }
						
					}
					else{
						$ens = "flexo";
						include "../php/sql_resultado.php";

						header ("Location: ../seleccion.php");
					}




					?>
				</select>
			</td>			
	

	

		</tr>
	<tr><td colspan='4' align="center" ><h2>Flexo Tracción</h2>

	</td></tr>
		<tr>
			<td>Tiempo (s)</td>
			<td>
				<input  type=number name="tiempo" max="999" required>
			</td>
			<td>L (s)</td>
			<td>
				<input  type=number name="l" max="999" required>
			</td>
		</tr>
		<tr>
			<td>b (mm)</td>
			<td>
				<INPUT type=number name="b" max="999" required>
			</td>
			<td>P (N)</td>
			<td>
				<INPUT  type=number name="p" max="99999" required>
			</td>
		</tr>
		<tr>
			<td>h (mm)</td>
			<td>
				<INPUT type=number name="h" max="999" required>
			</td>
			<td>a (mm)</td>
			<td>
				<INPUT  type=text pattern="\d{1}\.\d{1,2}" name="a" title="Debe tener un entero y 2 decimales.Ej: 0.05" required>
			</td>
		</tr>	
	<tr><td colspan='4' align="center" > <h2>Hendimiento</h2></td></tr>	
		<tr>
			<td>Peso (gr)</td>
			<td>
				<INPUT type=number name="peso" max="9999" required>
			</td>
			<td>Tiempo (s)</td>
			<td>
				<INPUT type=number name="tiempo2" max"999" required>
			</td>
		</tr>
		<tr>
			<td>Peso Sumergido (gr)</td>
			<td>
				<INPUT type=number name="pesoSumergido" max="9999" required>
			</td>
			<td>d (mm)</td>
			<td>
				<INPUT type=number name="d" max="999" required>
			</td>
		</tr>
		<tr>
			<td>Peso Saturado (gr)</td>
			<td>
				<INPUT type=number name="pesoSaturado" max="9999" required>
			</td>
			<td>l (mm)</td>
			<td>
				<INPUT type=number name="ll" max="999" required>
			</td>
		</tr>
		<tr>
			<td>Densidad (Kg/cm3)</td>
			<td>
				<INPUT type=text pattern="\d{1}\.\d{1,3}" name="densidad2" title="Debe tener un entero y 3 decimales.Ej: 2.349" required>
			</td>
			<td>P (N)</td>
			<td>
				<INPUT type=number name="p2" max="999999" required>
			</td>
		</tr>

	<td><input type="submit" value="Aceptar"></td>
</form>
</center>
</div>

<form action="ensayos.php" method=post name="ensayo"> 
	<input type="hidden" name="campo1"> 
	<input type="hidden" name="campo2" > 
</form> 
</body>

</html>