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
            $('#formAgregarproyecto').ajaxForm(opciones) ; 
            
             //lugar donde defino las funciones que utilizo dentro de "opciones"
        
             function mostrarRespuesta (responseText){
             				if(responseText == 'success'){             				
                        alert("agregado");
                        document.getElementById("formAgregarproyecto").reset(); 
                    }                         		
                    else
                        alert("Error Inesperado"+'\n'+responseText);
             };
   
        }); 



</script> 
<script>
    function show_confirm(){
        return confirm("Estas seguro?");
    }
</script>

</head>

<body>
	<center><form id="formAgregarproyecto" name="formAgregarproyecto"  action="administrador/php_admi/agregar_proyecto.php" method="post">
		<table>
			<tr><h2>Agregar Proyecto</h2><tr>
			<tr>
				<td>Nombre proyecto</td>
				<td>
					<input type="text" pattern=".{5,}" title="5 caracateres minimo"  name="nombreproyecto" required>
				</td>
        <td>Codigo</td>
        <td>
          <input type="text" name="codigo" required>
        </td>        
        </tr>
          <tr>
        <td>Región</td>
        <td>
          <input type="text" name="region" required>
        </td>
        <td>Provincia</td>
        <td>
          <input type="text" name="provincia" required>
        </td>                              
          </tr>
          <tr>
        <td>Sector</td>
        <td>
          <input type="text" name="sector" required>
        </td>
        <td>Mandante</td>
        <td>
          <input type="text" name="mandante" required>
        </td>             
          </tr>
          <tr>
        <td>Contratista</td>
        <td>
          <input type="text" name="contratista" required>
        </td>
        <td>Código Safi</td>
        <td>
          <input type="text" name="safi" required>
        </td> 
          </tr>
		</table>
    <center><button  class="button darkblue" type="submit" onclick="return show_confirm();" name="agregar" > Agregar </button></center>
	</form></center>

</form> 

</body>
</html>