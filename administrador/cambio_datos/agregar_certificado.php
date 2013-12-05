

 <script type="text/javascript"> 
        // esperamos que el DOM cargue
        $(document).ready(function() { 
            // definimos las opciones del plugin AJAX FORM
            var opciones= {
                               success: mostrarRespuesta, //funcion que se ejecuta una vez enviado el formulario
                               
            };
             //asignamos el plugin ajaxForm al formulario myForm y le pasamos las opciones
            $('#formAgregarcertificado').ajaxForm(opciones) ; 
            
             //lugar donde defino las funciones que utilizo dentro de "opciones"
        
             function mostrarRespuesta (responseText){
             				if(responseText == '0'){             				
                           			alert(" agregado ");                             			
                           			document.formloco.corre.value = document.formAgregarcertificado.corre.value;
                           			document.formloco.id_proyecto.value = document.formAgregarcertificado.proyectoCertificado.value ;
                           			document.formloco.f1.value = document.formAgregarcertificado.f1.value ;
                           			document.formloco.aridos.value = document.formAgregarcertificado.aridos.value ;
                           			document.formloco.comentario.value = document.formAgregarcertificado.comentario.value;
                           			document.formloco.informe69.value = document.formAgregarcertificado.informe69.value;                           			
                           			document.formloco.revision.value = '0';
                           			document.formloco.submit();
                           			document.getElementById("formAgregarcertificado").reset();
             				
	                           		//window.location = "administrador/php_admi/certificado2.php?corre="+corre,+"?id_proyecto="+id_proyecto,+"?id_informe"+id_informe;
	                           	  } 
                           	else{                        		
			             		if(responseText == '1'){
                           			alert(" agregado ");                             			
                           			document.formloco2.corre.value = document.formAgregarcertificado.corre.value;
                           			document.formloco2.id_proyecto.value = document.formAgregarcertificado.proyectoCertificado.value ;
                           			document.formloco2.f1.value = document.formAgregarcertificado.f1.value ;
                           			document.formloco2.aridos.value = document.formAgregarcertificado.aridos.value ;
                           			document.formloco2.comentario.value = document.formAgregarcertificado.comentario.value;
                           			document.formloco2.luz.value = document.formAgregarcertificado.luz.value ;
                           			document.formloco2.ensayoc.value = document.formAgregarcertificado.ensayoc.value;
                           			document.formloco2.informe69.value = document.formAgregarcertificado.informe69.value;
                           			document.formloco2.revision.value = '0';
                           			document.formloco2.submit();
                           			document.getElementById("formAgregarcertificado").reset();         							                           			
			                	}
			                	else
			                    	alert("Error Inesperado"+'\n'+responseText);
                           }

             };
   
        }); 

</script> 

<script language="JavaScript" type="text/JavaScript">
    $(document).ready(function(){
        $("#proyectoCertificado").change(function(event){
        	var v = nose();
            var id = $("#proyectoCertificado").find(':selected').val();
             $("#informe69").load('administrador/php_admi/informe_select.php?id='+id);
             $("#corre").load('administrador/php_admi/corremuestra_select.php?id='+id+'&v='+v); 
          
        });
    });
   
function nose(){
    for(i=0; i <document.radios.tipo.length; i++){
        if(document.radios.tipo[i].checked){
            valorSeleccionado = document.radios.tipo[i].value;
            return valorSeleccionado;
        }
    }
}
   function fun(v)
    {        
    $("#ctf").show();
    document.getElementById("formAgregarcertificado").reset();
	if (v==1) {
		document.formAgregarcertificado.luz.disabled = false;
		document.formAgregarcertificado.ensayoc.disabled = false;
	}
	else{
		document.formAgregarcertificado.luz.disabled = true;
		document.formAgregarcertificado.ensayoc.disabled = true;  		
	}     	
    }
</script> 


<script language="JavaScript" type="text/JavaScript">
    $(document).ready(function(){
        $("#informe69").change(function(event){
            var id = $("#informe69").find(':selected').val();
            var id2 = $("#proyectoCertificado").find(':selected').val();
             $("#ncertificado").load('administrador/php_admi/certificado_select.php?id="'+id+'"&id2='+id2);
          
        });
    });
 </script>


</head>

<body>
	<center><form id="radios" name="radios">
		<table>
	<td><h3>Elegir tipo certificado</h3></td>
	<td>Flexo</td><td><input type="radio" name="tipo" onclick="JavaScript:fun(1)" value="1" required></td><td>compresion</td><td><input type="radio" name="tipo" onclick="JavaScript:fun(0)" value="0" required></td>
	</table>
	</form></center>

	<div hidden="hidden" id="ctf" >
	<center><form id="formAgregarcertificado"   name="formAgregarcertificado" action="administrador/php_admi/generar_certificado.php" method="post">
		<table>
			<tr><h2>Generar certificado Hormigon Pavimento</h2><tr>	
			<tr>
			    <td>Proyecto </td>
			      <td>
			    <select name="proyectoCertificado" id="proyectoCertificado" required autofocus>
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
				<td>Codigo informe</td>
			<td>				
				<select name="informe69" id="informe69"   required>
					<option disabled="disabled" selected="selected"></option>	
				</select>
			
			</td>
				<td>Nº Certificado </td>
			<td>				
				<input name="ncertificado" id="ncertificado"  size="5" readonly required></input>
			
			</td>

			</tr>
			<tr>
				<td>Nº Correlacional  -  Nº Muestra</td>
			<td>				
				<select name="corre" id="corre"  required>
					<option disabled="disabled" selected="selected"></option>	
				</select>			
			</td>
				<td>Fecha</td>
			<td>				
				<input type="date" name="f1" required>
			</td>			
			</tr>
			<tr>
				<td>Procedencia Aridos</td>
				<td>
				<input type="text" name="aridos" required>
				</td>
								<td>Comentarios</td>
				<td>
					<textarea rows="4" name="comentario"></textarea>
				</td>				
			</tr>
			<td>Luz de Ensayo</td>
			<td><select name="luz" required disabled>
				<option disabled="disabled" selected="selected"></option>
				<option value="P">P</option>
				<option value="P/2">P/2</option>
			</select></td>
			<td>Ensayo Carga</td>
			<td><select name="ensayoc" required disabled>
				<option disabled="disabled" selected="selected"></option>
				<option value="450">450</option>
				<option value="300">300</option>
				</select>
			</td>	
		</table>
		<button  class="button darkblue" type="submit" name="agregar" > Agregar </button>	
	</form></center>
</div>


<form name="formloco" method=post action="administrador/php_admi/certificado2.php"> 
	<input type="hidden" name="corre"> 
	<input type="hidden" name="id_proyecto" >
	<input type="hidden" name="f1"> 
	<input type="hidden" name="aridos" >
	<input type="hidden" name="comentario" >
	<input type="hidden" name="informe69" >  
	<input type="hidden" name="revision" >  	  
</form>

<form name="formloco2" method=post action="administrador/php_admi/certificado_fh.php">
	<input type="hidden" name="corre"> 
	<input type="hidden" name="id_proyecto" >
	<input type="hidden" name="f1">  
	<input type="hidden" name="aridos" >
	<input type="hidden" name="comentario" >
	<input type="hidden" name="luz" >
	<input type="hidden" name="ensayoc" >
	<input type="hidden" name="informe69" > 
	<input type="hidden" name="revision" > 		  
</form>


</body>
</html>