<?php
  session_start();  

  if ($_SESSION["ESTADO"] != 2 ) 
     header("Location:index.php");
?>

<!DOCTYPE html>

<html>

<head>

        <title>Seleccion </title>

        <meta charset="utf-8"> 

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href="css/botonesselec.css"/>
        <script type="text/javascript" src="js/cambiarPestanna.js"></script>
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.form.js"></script>

        <script type="text/javascript">

    function funcion1(form)
    {
    var formula= 'form';
    var numero =1;
    while(numero <= 2){
    document.getElementById(formula+numero).style.display = 'none';
    numero++;
    }

    $(form).toggle();
    }
</script>
<script language="JavaScript" type="text/JavaScript">

        function boton1(form,link){
      
            $(form).load(link);            
            $(form).show();
          
        ;
    };
 </script> 


       
</head>
    <body>
        <div class="contenedor">
            <div id="pestanas">
                <ul id="lista">
                    <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Inicio</a></li>
                    <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>Hormigon Pavimento</a></li>
                    <li id="pestana3"><a href='javascript:cambiarPestanna(pestanas,pestana3);'>Hormigon Estructura</a></li>
                    <li id="pestana4"><a href='javascript:cambiarPestanna(pestanas,pestana4);'>Hormigon 3</a></li>
                    <li id="pestana5"><a href='javascript:cambiarPestanna(pestanas,pestana5);'>Hormigon 4</a></li>
                    
                </ul>
            </div>
            
            <body onload="javascript:cambiarPestanna(pestanas,pestana1);">
       
            <div id="contenidopestanas">
                <div id="cpestana1">
                    holi
                    
                </div>
                <div id="cpestana2">
                    <p> instrucciones </p>
                    <button    onclick="JavaScript:boton1(form1,'formularios/formulario.php')">Crear nuevo hormigón</button>
                    <button onclick="JavaScript:boton1(form1,'buscador1.php')">Continuar ingreso datos</button>
                    <div hidden="hidden" id="form1" >
                      
                    </div>
                </div>
                <div id="cpestana3">
                    <p> instrucciones </p>
                    <button    onclick="JavaScript:boton1(form2,'estructura/estructura_formulario.php')">Crear nuevo hormigón</button>
                    <button onclick="JavaScript:boton1(form2,'buscador1.php')">Continuar ingreso datos</button>
                    <div hidden="hidden" id="form2" >
                      
                    </div>
                </div>
                <div id="cpestana4">
                    holi 4
                </div>
                <div id="cpestana5">
                    holi 5
                </div>
            </div>
        </div>

        
    </body>
</html>
