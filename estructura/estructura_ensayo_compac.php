
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
<center><form method="post" name="myForm" id="myForm" action="estructura_agregar_ensayo_compac.php">


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
			
				
					$sql ="SELECT `id_fecha`,`fecha`, `llena`, `ensayo` FROM `estructura_registro_fecha` WHERE (`muestra`='$muestra' AND `correlacional`='$correlacion' AND `llena`='0')";
					
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
						$ens = "compresion";
						include "estructura_sql_resultado.php";

						header ("Location: ../seleccion.php");
				}




					?>
				</select>
			</td>			
	
		</tr>
		
	<tr><td colspan='4' align="center"><h2>Compresión</h2></td></tr>
		<tr>
			<td>a</td>
			<td>
				<INPUT type=number name="a3" max="999" required>
			</td>
			<td>Masa</td>
			<td>
				<INPUT type=number name="masa3" max="9999" required>
			</td>
		</tr>
		<tr>
			<td>b</td>
			<td>
				<INPUT type=number name="b3" max="999" required>
			</td>
			<td>P (N)</td>
			<td>
				<INPUT type=number name="p3" max="9999999" required>
			</td>
		</tr>
		<tr>
			<td>h</td>
			<td>
				<INPUT type=number name="h3" max="999" required>
			</td>
			<td>Factor</td>
			<td>
				<INPUT type=text pattern="\d{1}\.\d{1,3}" name="factor3" title="Debe tener un entero y 2 decimales.Ej: 0.95" required>

			</td>
		</tr>

		<tr>

			<td colspan='4' align="center">  <br> instrucciones </br> Usar para calcular densidad.. </td>
		</tr>

		<tr>

			<td>A</td>
			<td>
				<INPUT type=number name="dato11" max="9999">
			</td>
			<td>B</td>
			<td>
				<INPUT type=number name="dato22" max"9999">

			</td>
		</tr>
			<tr>

			<td>C</td>
			<td>
				<INPUT type=number name="dato33" max="9999">
			</td>
		</tr>

	<td><input type="submit" value="Aceptar"></td>
</form>
</center>
</div>

<form action="estructura_ensayos.php" method=post name="ensayo"> 
	<input type="hidden" name="campo1"> 
	<input type="hidden" name="campo2" > 
</form> 
</body>

</html>