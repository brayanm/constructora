<?php
include "php/conexion.php";
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
            $('#myForm5').ajaxForm(opciones) ; 
            
             //lugar donde defino las funciones que utilizo dentro de "opciones"
        
             function mostrarRespuesta (responseText){
             				if(responseText == 'malo')           				
                           			alert("No existen datos"); 
                           	else{
                           		document.f.cr.value = document.myForm5.cr.value;
                           		document.f.mt.value = document.myForm5.mt.value;
                           		document.f.submit();
                           		
                           	}

             };
   
        }); 

</script> 

</head>
<body>
	<center><form id="myForm5" name="myForm5" action="php/proceso.php" method="post">
		<table>
			<tr><h2>Buscar Registro</h2><tr>
			<tr>				
				<td>N° Correlación</td>
				<td>
					<input type=number name="cr" required>
				</td>
				<td>N° Muestra</td>
				<td>
					<input type=number name="mt" required>
				</td>
				<td>	
					<button  class="button darkblue" type="submit" name="busqueda"> Buscar </button>
				</td>	
			</tr>	
		</table>
	</form></center>

<form action="php/proceso.php" method=post name="f"> 
	<input type="hidden" name="cr"> 
	<input type="hidden" name="mt" > 
</form> 

</body>
</html>