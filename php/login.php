<?php


	session_start(); 
	$usuario = $_POST["username"];
	$password = $_POST["password"];

	include "conexion.php";

	$sql="SELECT rut FROM usuarios WHERE nick = '$usuario' 
	AND password = '$password'";

	$comprobar = mysql_query($sql, $conexion);
	$count = 0; 

    while($row = mysql_fetch_array($comprobar))
    { 
    $rut =$row['rut'];
	$count++;      
	
    }

	
	$is_ajax = $_REQUEST['is_ajax'];
	if(isset($is_ajax) && $is_ajax)
	{
		if($count >= 1 ){
			if($rut == 2){
		$_SESSION["ESTADO"]= 3;
		setcookie ("ESTADO", "", time()+60);
		echo "success2";	
		}
		else{
		$_SESSION["ESTADO"]= 2;
		setcookie ("ESTADO", "", time()+60);
		echo "success";	
		}



		}
		else { echo $count; }
	}

	@mysql_close($conexion); 
	
?>