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
            $('#formAgregarProvee').ajaxForm(opciones) ; 
            
             //lugar donde defino las funciones que utilizo dentro de "opciones"
        
             function mostrarRespuesta (responseText){
             				if(responseText == 'success'){             				
                           			alert(" agregado ");  
                           			    }                         		
                           		
                           	else
                           		alert("Error Inesperado"+'\n'+responseText);
             };
   
        }); 



</script> 
</head>

<body>
	<center><form id="formAgregarProvee"   action="administrador/php_admi/agregar_proveedor.php" method="post">
		<table>
			<tr><h2>Agregar proveedor a un proyecto</h2><tr>
			<tr>
        <td>Proyecto </td>
          <td>
        <select name="proyecto_provee" id="proyecto" required autofocus>
              <option disabled="disabled" selected="selected"></option>
          <?php
            include "php/conexion.php";
            $cons = "select * from proyecto";
            $res = mysql_query($cons, $conexion);
            $t =mysql_num_rows($res);
            if ($t!=0) {
              while ($r = mysql_fetch_array($res)) {
                echo "<option value='$r[id_proyecto]'>$r[Nombre]</option>";
              }
             }
             mysql_close($conexion);

          ?>
        </select>
      </td>
				<td>Nombre proveedor</td>
				<td>
					<input   name="nombreProvee" required>
				</td>
				<td>
					<button  class="button darkblue" type="submit" name="agregar" > Agregar </button>
				</td>	
			</tr>	
		</table>
	</form></center>

</form> 

</body>
</html>