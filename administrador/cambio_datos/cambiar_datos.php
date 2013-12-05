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
             				if(responseText == 'malo')           				
                           			alert("No existen datos"); 
                           	else{
                           		document.f.proyecto1.value = document.myForm.proyecto1.value;
                           		document.f.corre.value = document.myForm.corre.value;                         
                           		document.f.fecha.value = document.myForm.fecha.value;
                           		document.f.submit();    
                           	}

             };
   
        }); 

</script>
<script language="JavaScript" type="text/JavaScript">
    $(document).ready(function(){
        $("#proyecto1").change(function(event){
            var id = $("#proyecto1").find(':selected').val();
             $("#corre").load('administrador/php_admi/select_cambiodatos.php?id='+id);
          
        });
    });
</script>
<script language="JavaScript" type="text/JavaScript">
    $(document).ready(function(){
        $("#corre").change(function(event){
            var id = $("#corre").find(':selected').val();
             $("#fecha").load('administrador/php_admi/select2_cambiodatos.php?id='+id);          
        });
    });
</script>   

</head>
<body>
	<center><form id="myForm" name="myForm" action="administrador/php_admi/procesar_busqueda.php" method="post">
		<table>
			<tr><h2>Buscar Registro</h2><tr>
			<tr>				
			<td>Proyecto</td>
			<td>
				<select name="proyecto1" id="proyecto1" required>
							<option disabled="disabled" selected="selected"></option>
					<?php
						include "../../php/conexion.php";
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
			<td>Nº Correlacional  -  Nº Muestra</td>
			<td>				
				<select name="corre" id="corre"  required>
					<option disabled="disabled" selected="selected"></option>	
				</select>			
			</td>
				<td>Fecha</td>
				<td>
					<select name="fecha" id="fecha" required>
						<option disabled="disabled" selected="selected"></option>
					</select>
				</td>				
				<td>	
					<button  class="button darkblue" type="submit" name="busquedaC"> Ingresar </button>
				</td>	
			</tr>	
		</table>
	</form></center>
<form action="administrador/php_admi/procesar_busqueda.php" method=post name="f">
	<input type="hidden" name="proyecto1" >
 	<input type="hidden" name="corre" >
	<input type="hidden" name="fecha" >  
</form> 

</body>
</html>