<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <script type="text/javascript" src="js/cambiarPestanna.js"></script>
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <title></title>
    </head>
    <body>
        <div class="contenedor">
            <div class="titulo">¿Sobre que escribiré en el blog?</div>
            <div id="pestanas">
                <ul id=lista>
                    <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Inicio</a></li>
                    <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>Hormigon Pavimento</a></li>
                    <li id="pestana3"><a href='javascript:cambiarPestanna(pestanas,pestana3);'>Hormigon Cemento</a></li>
                    <li id="pestana4"><a href='javascript:cambiarPestanna(pestanas,pestana4);'>Hormigon Ceramica</a></li>
                    <li id="pestana5"><a href='javascript:cambiarPestanna(pestanas,pestana5);'>Hormigon Greda</a></li>
                    
                </ul>
            </div>
            
            <body onload="javascript:cambiarPestanna(pestanas,pestana1);">
       
            <div id="contenidopestanas">
                <div id="cpestana1">
                    HTML, siglas de HyperText Markup Language («lenguaje de marcado de hipertexto»), 
                    hace referencia al lenguaje de marcado predominante para la elaboración de páginas web que
                     se utiliza para describir y traducir la estructura y la información en forma de texto, así 
                     como para complementar el texto con objetos tales como imágenes. El HTML se escribe en forma 
                     de «etiquetas», rodeadas por corchetes angulares (<,>). HTML también puede describir, hasta un 
                     cierto punto, la apariencia de un documento, y puede incluir un script (por ejemplo JavaScript), 
                     el cual puede afectar el comportamiento de navegadores web y otros procesadores de HTML.
                </div>
                <div id="cpestana2">
                    El nombre hojas de estilo en cascada viene del inglés Cascading Style Sheets, del que toma sus siglas.
                    CSS es un lenguaje usado para definir la presentación de un documento estructurado escrito en HTML o XML2 
                    (y por extensión en XHTML). El W3C (World Wide Web Consortium) es el encargado de formular la especificación de 
                    las hojas de estilo que servirán de estándar para los agentes de usuario o navegadores.
                </div>
                <div id="cpestana3">
                    JavaScript es un lenguaje de programación interpretado, dialecto del estándar ECMAScript. Se define como orientado
                     a objetos,3 basado en prototipos, imperativo, débilmente tipado y dinámico.
                </div>
                <div id="cpestana4">
                    PHP es un lenguaje de programación de uso general de script del lado del servidor originalmente diseñado para 
                    el desarrollo web de contenido dinámico. Fue uno de los primeros lenguajes de programación del lado del servidor
                     que se podían incorporar directamente en el documento HTML en lugar de llamar a un archivo externo que 
                     procese los datos. El código es interpretado por un servidor web con un módulo de procesador de PHP que genera 
                     la página Web resultante. PHP ha evolucionado por lo que ahora incluye también una interfaz de línea de comandos que 
                     puede ser usada en aplicaciones gráficas independientes. PHP puede ser usado en la mayoría de los servidores web al 
                     igual que en casi todos los sistemas operativos y plataformas sin ningún costo.
                </div>
                <div id="cpestana5">
                    Java Platform, Enterprise Edition o Java EE (anteriormente conocido como Java 2 Platform, 
                    Enterprise Edition o J2EE hasta la versión 1.4; traducido informalmente como Java Empresarial),
                     es una plataforma de programación—parte de la Plataforma Java—para desarrollar y ejecutar software
                      de aplicaciones en el lenguaje de programación Java. Permite utilizar arquitecturas de N capas distribuidas 
                      y se apoya ampliamente en componentes de software modulares ejecutándose sobre un servidor de aplicaciones. 
                      La plataforma Java EE está definida por una especificación. Similar a otras especificaciones del Java Community 
                      Process, Java EE es también considerada informalmente como un estándar debido a que los proveedores deben cumplir
                       ciertos requisitos de conformidad para declarar que sus productos son conformes a Java EE; estandarizado por The Java Community Process / JCP.
                </div>
            </div>
        </div>
    </body>
</html>
