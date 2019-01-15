<?php

/*
  JJBM,   26/03/2009, captcha.php

  Genera una im�gen CAPTCHA y almacena en la sesi�n el c�digo establecido.

  (Obviamente s�lo puede usarse una imagen CAPTCHA por sesi�n a la vez).

 */

// Configuraci�n:
$N = 2;  // Nivel de emborronado { 2, 3, 4, ... }
$J = 100; // Calidad JPEG { 0, 1, 2, 3, ..., 100 }
$M = 5;  // Margen.
$L = 5;  // N�mero de letras.
$C = FALSE; // Case sensitive.
// Acceso a los objetos de sesi�n:
session_start();

// Indicamos que vamos a generar una imagen �no una p�gina HTML!
header("Content-type: image/jpeg");

// Inicializamos cualquier posible valor previo de captcha:
$_SESSION['CAPTCHA'] = '';
// Metemos tantos caraceteres aleatorios como sean precisos:
for ($n = 0; $n < $L; $n++)
    $_SESSION['CAPTCHA'] .= C();

// Si no es case sensitive lo ponemos todo en min�sculas:
if (!$C)
    $_SESSION['CAPTCHA'] = strtolower($_SESSION['CAPTCHA']);

// Dimensiones del captcha:
$w = 2 * $M + $L * imagefontwidth(5);
$h = 2 * $M + imagefontheight(5);

// Creamos una  imagen:
$i = imagecreatetruecolor($w, $h);

// La rellenamos de blanco:
imagefill($i, 0, 0, imagecolorallocate($i, 255, 255, 255));

// Elegimos aleatoriamente un �ngulo de emborronado:
$A = ( rand() % 180 ) / 3.14;

// Realizamos iteraciones de emborronado:
for ($n = 0; $n < $N; $n++) {

    // Factor de interpolaci�n, va de 1.0 a 0.0
    $t = 1.0 - $n / ( $N - 1.0 );

    // El radio se va centrando a medida que se hace n�tido:
    $r = $M * $t;

    // El color va siendo cada vez m�s oscuro:
    $c = 255 * $t;
    $c = imagecolorallocate($i, $c, $c, $c);

    // Trazamos dos l�neas aleatorias para dificultar m�s las cosas:
    imageline($i, $M, rand($M, $h - $M), $w - $M, rand($M, $h - $M), $c);
    imageline($i, rand($M, $w - $M), $M, rand($M, $w - $M), $h - $M, $c);

    // Pasamos un filtro gaussiano:
    imagefilter($i, IMG_FILTER_GAUSSIAN_BLUR);

    // Dibujamos el texto en el sentido del �ngulo y radio de desplazamiento:
    imagestring($i, 5, $M + $r * cos($A), $M + $r * sin($A), $_SESSION['CAPTCHA'], $c);

    // Pasamos otro filtro gaussiano:
    imagefilter($i, IMG_FILTER_GAUSSIAN_BLUR);
}

// Escribimos la imagen como un JPEG en el buffer de salida:
imagejpeg($i, NULL, $J);

// Liberamos la imagen:
imagedestroy($i);

// Devuelve un caracter aleatorio:
function C() {
    $W = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    return substr($W, rand() % strlen($W), 1);
}

?>