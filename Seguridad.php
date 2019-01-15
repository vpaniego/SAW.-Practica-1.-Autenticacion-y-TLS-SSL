<?php
// TODO 5: Comprobar autenticación del usuario
include("includes/autenticado.php");
// TODO 6: Comprobar autorización del usuario
if (isset($_SESSION['permisos'])) {
    $permiso_seguridad = $_SESSION['permisos'][5];
    if ($permiso_seguridad === 'N') {
        header("Location: NoAuth.php");
        exit;
    }
}
?>
<html>
<head>
    <html>
    <head>
        <title> Seguridad </title>
        <meta charset="UTF-8">
    </head>
<body>
<br><br>
<center>
    <img src="logo.png" width=120 height=60>
    <br><br>
    <H2> SEGURIDAD EN APLICACIONES WEB </H2>
    <HR>
    <BR>
    <a href='/tema1'> Tema 1: Introducción </a><br><br>
    <a href='/tema1'> Tema 2: Conceptos previos: HTTP y Apache </a><br><br>
    <a href='/tema1'> Tema 3: Autenticación y Autorización </a><br><br>
    <a href='/tema1'> Tema 4: El protocolo TLS/SSL </a><br><br>
    <a href='/tema1'> Tema 5: Cross Site Scripting </a><br><br>
    <a href='/tema1'> Tema 6: Robo de Sesiones </a><br><br>
    <a href='/tema1'> Tema 7: SQL injection </a><br><br>
    <a href='/tema1'> Tema 8: Otros temas de seguridad en aplicaciones web </a><br><br>
    <a href='/tema1'> Tema 9: Análisis de vulnerabilidades en aplicaciones web </a><br><br><br>
    <a href='MasterWeb.php'> VOLVER A MASTER INGENIERIA WEB
</center>
</body>
</html>