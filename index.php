<?php
  session_start();  

  if (isset($_SESSION["ESTADO"]) && $_SESSION["ESTADO"] == 2 ) 
  	 header("Location:seleccion.php");

  if (isset($_SESSION["ESTADO"]) && $_SESSION["ESTADO"] == 3) 
  	 header("Location:administracion.php");


?>


<!DOCTYPE html>

<html lang="en">

<head>
<title>Inicio </title>

<meta charset="utf-8"> 

<link rel="stylesheet" href="css/login.css"/>
<script type="text/javascript" src="jquery-1.5.2.min.js"></script>


<script type="text/javascript">
$(document).ready(function() {
	
	$("#submit").click(function() {
	
		var action = $("#form1").attr('action');
		var form_data = {
			username: $("#username").val(),
			password: $("#password").val(),
			is_ajax: 1
		};
		
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
				if(response == 'success'){

						setTimeout("location.href='seleccion.php'", 500);
				
						$("#message").html("<p class='success'>You have logged in successfully!</p>");
					}

				
				else { if (response == 'success2'){
						setTimeout("location.href='administracion.php'", 500);
				
						$("#message").html("<p class='success'>You have logged in successfully!</p>");
					}
						else
							$("#message").html("<p class='error'>"+response+".</p>");	
				}
			}
		});
		
		return false;
	});
});

</script>

</head>

<body>
 <div class="logo"> 
	<center> <img src="img/casco.png" width="280px" height="280px" alt="CVV" > </center>
</div>

<div class="login">
	<div class="login_side">
		<div class="login_inside">
		<h2>Inicio Sesión</h2>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
	</div>
	</div>
		<form id="form1" name="form1" method="POST" action="php/login.php">
        	<label for="username">Nombre usuario :</label>
            	<input type="text" name="username" id="username"/>
        	<label for="password">Password :</label>
            	<input type="Password" name="password" id="password" />
            	<input type="submit" value="Ingresar" id="submit" name="submit" class="submit" />
		</form>

		<div id="message"></div>
	
</div>

</body>

</html>