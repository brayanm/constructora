

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
                           			document.muestreo.campo1.value = document.myForm.correlacion.value 
                           			document.muestreo.campo2.value = document.myForm.muestra.value                                                     			
                           			document.muestreo.submit()
                           			    }                         		
                           		
                           	else
                           		alert(responseText);
             };
   
        }); 
</script> 


</head>

<body>

<center><form method="post" name='myForm' id='myForm' action="estruc_agregar_muestreo_compac.php">

	<input type="hidden" name="correlacion" value="<?php echo $correlacion ?>" >
	<input type="hidden" name="muestra" value="<?php echo $muestra?>" >

	<h1>Ensayo Sala</h1><br>
	<table>
		<tr><td><h2>Fecha Muestreo</h2></td></tr>
		<tr>
			<td>Fecha</td>
			<td>
				<input type="date" name="fecha" required>
			</td>
		</tr>
		
	<tr><td colspan='4' align="center" ><h2>Compresión</h2></td></tr>
	
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

		<td colspan='4' align="center">  <br> instrucciones </br>  Usar para calcular densidad.. </td>
		</tr>

		<tr>

			<td>A</td>
			<td>
				<INPUT type=number name="dato11" max="9999">
			</td>
			<td>B</td>
			<td>
				<INPUT type=number name="dato22" max="9999">

			</td>
		</tr>
			<tr>

			<td>C</td>
			<td>
				<INPUT type=number name="dato33" max="9999">
			</td>
		</tr>

		<tr>
			<td><form><input type=button value="Salir" onClick=location='../seleccion.php'></form></td>
			<td><input type="submit" value="Aceptar"></td>
		</tr>
	</table><br>
</form>

<form action="estructura_ensayos.php" method=post name="muestreo"> 
	<input type="hidden" name="campo1"> 
	<input type="hidden" name="campo2" >
</form> 

</center>
</body>

</html>
