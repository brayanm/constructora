<?php
  session_start();  

  if ($_SESSION["ESTADO"] != 2 ) 
     header("Location:../index.php");
 
  $correlacion=$_POST["campo1"];
  $muestra=$_POST["campo2"];
  $tipoform =$_POST["campo3"];
                
?>

<!DOCTYPE html>

<html>

<head>

        <title>Seleccion </title>

        <meta charset="utf-8"> 

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/estilomuestra.css"/>
        <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="../js/jquery.form.js"></script>

       
</head>
    <body>
    	<div class="contenedor">    
            <div id="cpestana1">            
             <?php

                 include "estructura_muestreo_compac.php";


             ?>    
     
        </div>
     </div>

        
    </body>
</html>
