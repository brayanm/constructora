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
            $('#formAgregarInfo').ajaxForm(opciones) ; 
            
             //lugar donde defino las funciones que utilizo dentro de "opciones"
        
             function mostrarRespuesta (responseText){
             				if(responseText == 'success'){             				
                           			alert(" agregado ");
                                document.getElementById("formAgregarInfo").reset();  
                           			    }                         		
                           		
                           	else
                           		alert("Error Inesperado"+'\n'+responseText);
             };
   
        }); 

    function show_confirm(){
        return confirm("Estas seguro?");
    }

</script> 
</head>

<body>
	<center><form id="formAgregarInfo"   action="administrador/php_admi/agregar_informe.php" method="post">
		<table>
			<tr><h2>Agregar Informe a un proyecto</h2><tr>
			<tr>
        <td>Proyecto </td>
          <td>
        <select name="proyecto_informe" id="proyecto" required autofocus>
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
             mysql_close($conexion);

          ?>
        </select>
      </td>
				<td>Codigo informe</td>
				<td>
					<input   name="codigoInforme" required>
				</td>
				<td>
					<button  class="button darkblue" type="submit" onclick="return show_confirm();" name="agregar" > Agregar </button>
				</td>	
			</tr>	
		</table>
	</form></center>

</form> 

</body>
</html>