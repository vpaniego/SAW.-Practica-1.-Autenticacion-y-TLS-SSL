<?php
// TODO 5: Comprobar autenticación del usuario
include ("includes/autenticado.php");
?>
<html>
    <head>
        <title> Master Web </title>
        <meta charset="UTF-8">
        <style>
            p.asignatura {
                font-size:13pt;
                margin-top:-7pt;
            }
            a:link {text-decoration:none;}
            a:visited {text-decoration:none}
            a:hover {color:blue;}
            a.matricula:link {color:red;}
            a.matricula:visited {color:red;}
            a.matricula:hover {color:blue;}

        </style>
    </head>
    <body>    
        <br><br>
    <center>
        <img src="logo.png" width= 120 height= 60>
        <br><br>
        <h1> Máster en Ingeniería Web </H1>
        <HR> <BR>
        <a href = '/'> Ingeniería Web: Visión General (IWVG) </a><br>
        <a href = '/'> Arquitectura y Patrones para Aplicacionew Web (APAW)</a><br>
        <a href = '/'> Front-end para Móviles (FEM) </a><br>
        <a href = '/'> Front-end para Navegadores Web (FENW)</a><br>
        <a href = '/'> Back-end con Tecnologías de Libre Distribución (PHP)</a><br>
        <a href = 'seguridad.php'> Seguridad en Aplicaciones Web (SAW) </a><br>
        <a href = '/'> Back-end con Tecnologías Propietarias (NET) </a><br>
        <a href = '/'> Back-end con Tecnologías de Código Abierto (Spring) </a><br>
        <a href = '/'> Metodologías de Desarrollo Web (MDW)</a><br>
        <a href = '/'> Proyecto Fin de Master </a><br>			
        <br><br><br><br>
        <a class='matricula' href = 'asignaturas.php'> ASIGNATURAS MATRICULADO </a></br></br>
        <a class='matricula' href = 'matricula.php'> NUEVA MATRICULA DE ASIGNATURAS </a>
    </center>
</body>		
</html>