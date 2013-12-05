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
            $('#formQuitarProyecto').ajaxForm(opciones) ; 
            
             //lugar donde defino las funciones que utilizo dentro de "opciones"
        
             function mostrarRespuesta (responseText){
             				if(responseText == 'success'){             				
                        alert("Proyecto eliminado");
                        document.getElementById("formQuitarProyecto").reset();  
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
	<center><form id="formQuitarProyecto"   action="administrador/php_admi/quitar_proyecto.php" method="post">
		<table>
			<tr><h2>Quitar un proyecto</h2></tr>
			<tr>
        <td>Proyecto </td>
          <td>
        <select name="proyecto_quitar" id="proyecto" required autofocus>
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
        <td>
					<button  class="button darkblue" type="submit" onclick="return show_confirm();" name="quitar" > Quitar </button>
				</td>	
			</tr>	
		</table>
	</form>
</center>

</form> 

</body>
</html>