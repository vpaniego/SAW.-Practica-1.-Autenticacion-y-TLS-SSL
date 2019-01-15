<?php
// TODO 5: Comprobar autenticación del usuario
include ("includes/autenticado.php");
?>
<HTML>
    <HEAD>
        <title>Asignaturas matriculado</title>
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
    </HEAD>
    <body>
    <CENTER>
        <img src="logo.png" width= 120 height= 60>
        <br><br>
        <h1> Máster en Ingeniería Web </H1>
        <HR> <H2> Asignaturas en las que se encuentra matriculado <?php echo $_SESSION['user'] ?>: </H2>
        <?php
        if (($_SESSION['permisos'][0] === 'N') &&
                ($_SESSION['permisos'][1] === 'N') &&
                ($_SESSION['permisos'][2] === 'N') &&
                ($_SESSION['permisos'][3] === 'N') &&
                ($_SESSION['permisos'][4] === 'N') &&
                ($_SESSION['permisos'][5] === 'N') &&
                ($_SESSION['permisos'][6] === 'N')) {
            echo "NO ESTÁ MATRÍCULADO EN NINGUNA ASIGNATURA <br>";
        } else {
            if ($_SESSION['permisos'][0] === 'S') {
                echo ("Ingeniería Web: Visión General <br>");
            }
            if ($_SESSION['permisos'][1] === 'S') {
                echo ("Arquitectura y Patrones para Aplicaciones Web <br>");
            }
            if ($_SESSION['permisos'][2] === 'S') {
                echo ("Front-end para Móviles <br>");
            }
            if ($_SESSION['permisos'][3] === 'S') {
                echo ("Front-end para Navegadores Web <br>");
            }
            if ($_SESSION['permisos'][4] === 'S') {
                echo ("Back-end con Tecnologías de Libre Distribución <br>");
            }
            if ($_SESSION['permisos'][5] === 'S') {
                echo ("Seguridad en Aplicaciones Web<br>");
            }
        }
        ?>
        <BR><BR><a class='matricula' href= 'MasterWeb.php'> VOLVER A MÁSTER INGENIERÍA WEB </A>
    </center>
</BODY>
</HTML>

