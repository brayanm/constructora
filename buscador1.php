<?php
include "php/conexion.php";
?>
<html>
<head>
<meta charset="utf-8"> 

<script type="text/javascript"> 

        $(document).ready(function() { 
            // definimos las opciones del plugin AJAX FORM
            var opciones= {
                success: mostrarRespuesta, //funcion que se ejecuta una vez enviado el formulario
                               
            };
             //asignamos el plugin ajaxForm al formulario myForm y le pasamos las opciones
            $('#myForm3').ajaxForm(opciones) ; 
            
             //lugar donde defino las funciones que utilizo dentro de "opciones"
        
             function mostrarRespuesta (responseText){
             				if(responseText == 'malo')           				
                           			alert("No existen datos"); 
                           	else{
                           		document.formulario.fecha1.value = document.myForm3.fecha1.value;
                           		document.formulario.fecha2.value = document.myForm3.fecha2.value;
                           		document.formulario.busqueda2.value = document.myForm3.busqueda2.value;
                           		document.formulario.submit(); 
                           		
                           	}

             };
   
        });

         
</script>
<script language="JavaScript" type="text/JavaScript">
    $(document).ready(function(){
        $("#proyectoCertificado").change(function(event){
            var id = $("#proyectoCertificado").find(':selected').val();
             $("#corre").load('php/corremuestra_select.php?id='+id);
          
        });
    });
</script> 

</head>
<body>
	<center><form id="myForm2" name="myForm2" action="php/procesar_busqueda.php" method="post">
		<table>
			<tr><h2>Buscar por N° Correlación y N° Muestra</h2><tr>
			<tr>
			<td>Proyecto</td>
			<td>
				<select name="proyectoCertificado" id="proyectoCertificado" required>
							<option disabled="disabled" selected="selected"></option>
					<?php
						$cons = "select * from proyecto where estado='1'";
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
			<td>Nº Correlacional  -  Nº Muestra</td>
			<td>				
				<select name="corre" id="corre"  required>
					<option disabled="disabled" selected="selected"></option>	
				</select>			
			</td>
				<td>	
					<button  class="button darkblue" type="submit" name="busqueda1" value="Buscar"> Buscar </button>
				</td>	
			</tr>	
		</table>
	</form></center>


	<center><form id="myForm3" name="myForm3" action="php/procesar_busqueda.php" method="post">
		<table>
			<tr><h2>Buscar por Rango de Fechas</h2><tr>
			<tr>
				<td>Desde</td>
				<td>
					<input type="date" name="fecha1" required>
				</td>
				<td>Hasta</td>
				<td>
					<input type="date" name="fecha2" required>
				</td>
				<td>	
					<button  class="button darkblue" type="submit" name="busqueda2" value="Buscar"> Buscar </button>
				</td>	
			</tr>	
		</table>
	</form></center>
</form> 

<form action="php/procesar_busqueda.php" method=post name="formulario"> 
	<input type="hidden" name="busqueda2" value="Buscar">
	<input type="hidden" name="fecha1"> 
	<input type="hidden" name="fecha2" > 
</form> 

</body>
</html>