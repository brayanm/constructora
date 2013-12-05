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
            $('#formAgregargrado').ajaxForm(opciones) ; 
            
             //lugar donde defino las funciones que utilizo dentro de "opciones"
        
             function mostrarRespuesta (responseText){
             				if(responseText == 'success'){             				
                        alert(" agregado ");
                        document.getElementById("formAgregargrado").reset();  
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
	<center><form id="formAgregargrado"   action="administrador/php_admi/agregar_gradoh.php" method="post">
		<table>
			<tr><h2>Agregar Grado Hormigon a un proyecto</h2><tr>
			<tr>
        <td>Proyecto </td>
          <td>
        <select name="proyecto_grado" id="proyecto" required autofocus>
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
				<td>Nombre grado hormigon</td>
				<td>
					<input type="text" name="nombregrado" required>
				</td>       
			</tr>
		</table>
    <center><button  class="button darkblue" type="submit" onclick="return show_confirm();" name="agregar" > Agregar </button></center>
	</form></center>

</form> 

</body>
</html>