<?php
  session_start();  

  if ($_SESSION["ESTADO"] != 3 ) 
     header("Location:index.php");
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8"> 

        <title>Seleccion </title>


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
    var numero =0;
    while(numero <= 4){
    document.getElementById(formula+numero).style.display = 'none';
    numero++;
    }
    $(form).toggle();
    }
    </script> 

    <script type="text/javascript">


   function funcion2(form)
    {        
    var formula= 'form';
    var numero =10;
    while(numero <= 12){
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
          
        
    };
 </script>

       
</head>
    <body>
        <div class="contenedor">
            <div id="pestanas">
                <ul id="lista">
                    <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Inicio</a></li>
                    <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>Hormigon Pavimento</a></li>
                    <li id="pestana3"><a href='javascript:cambiarPestanna(pestanas,pestana3);'>Hormigon 2</a></li>
                    <li id="pestana4"><a href='javascript:cambiarPestanna(pestanas,pestana4);'>Hormigon 3</a></li>
                    <li id="pestana5"><a href='javascript:cambiarPestanna(pestanas,pestana5);'>Hormigon 4</a></li>
                    
                </ul>
            </div>
            
            <body onload="javascript:cambiarPestanna(pestanas,pestana1);">
       
            <div id="contenidopestanas">
                <div id="cpestana1">
                    <h1> Funciones administrativas generales </h1>
                    <button    onclick="JavaScript:boton1(form1,'administrador/generales/agregar_proyecto.php')" >Agregar Proyecto</button>
                    <button    onclick="JavaScript:boton1(form1,'administrador/generales/agregar_gradoh.php')">Argegar grado hormigon</button>
                    <button    onclick="JavaScript:boton1(form1,'administrador/generales/agregar_proveedor.php')">Agregar Proveedor</button>
                    <button    onclick="JavaScript:boton1(form1,'administrador/generales/agregar_informe.php')">Agregar Informe</button>
                    <button    onclick="JavaScript:boton1(form1,'administrador/generales/quitar_proyecto.php')">Quitar Proyecto</button>
               
                    <div hidden="hidden" id="form1"  name="form1">

                    </div>
               
                 
                </div>
                <div id="cpestana2">
                    <button    onclick="JavaScript:boton1(form10,'administrador/cambio_datos/cambiar_datos.php')" >Cambiar Datos</button>
                    <button    onclick="JavaScript:boton1(form10,'administrador/cambio_datos/agregar_certificado.php')" >Generar Certificado</button>
                   <button    onclick="JavaScript:boton1(form10,'administrador/cambio_datos/revision_certificado.php')" >Revision Certificado</button>
					<button    onclick="JavaScript:boton1(form10,'administrador/cambio_datos/resumen.php')" >Resumen</button> 				   

                    <div hidden="hidden"id="form10" >
                          
                    </div>                
                    

                </div>
                <div id="cpestana3">
                    holi 3
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
