<?php
  session_start();  

  if ($_SESSION["ESTADO"] != 2 ) 
     header("Location:../index.php");
      $correlacion=$_POST["campo1"];
      $muestra=$_POST["campo2"];

      $sql = "SELECT tipo FROM registro WHERE correlacional='$correlacion' and muestra = '$muestra' ";
      include "../php/conexion.php";
      $consulta =  mysql_query($sql,$conexion);
      $tipo=mysql_fetch_array($consulta);
      $tipo = $tipo['tipo'];
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
<script type="text/javascript">

</script>
       
</head>
    <body>
        <div class="contenedor">    
            <div id="cpestana1">
             <?php
             if($tipo == 0)
                 include "../formularios/pavimento_ensayo_compac.php";
             else include "../formularios/pavimento_ensayo_flexo.php";
             ?>    

     
        </div>
     </div>

        
    </body>
</html>
