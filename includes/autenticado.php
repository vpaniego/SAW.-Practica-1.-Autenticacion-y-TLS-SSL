<?php
// TODO 4 Comprobar si el usuario está autenticado
session_start();

// Si hay usuario autenticado se deja pasar si no se redirigirá a NoAuth.php
if (!isset($_SESSION['user'])) {
    header("Location: NoAuth.php");
    exit;
}