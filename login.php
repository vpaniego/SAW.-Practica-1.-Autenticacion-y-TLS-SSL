<?php
session_start();
if (isset($_POST['registro'])) {
    header("Location: registro.php");
    exit;
}

if (isset($_POST['login'])) {
    // TODO 7: Comprobar captcha
    if (!isset($_POST['valor']) || (strcmp($_SESSION['CAPTCHA'], $_POST['valor']) !== 0)) {
        $_SESSION['CAPTCHA_LOGIN'] = 'incorrecto';
        header("Location:" . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $_SESSION['CAPTCHA_LOGIN'] = 'correcto';
    }
    include("includes/abrirbd.php");
    $sql = "SELECT * FROM usuarios WHERE user ='{$_POST['user']}'";
    $resultado = mysqli_query($link, $sql);
    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);
        // TODO 3 Comprobar el password de entrada con el de la BD
        $password = $_POST['passwd'];
        $salt = $usuario['salt'];
        $hash = hash("sha256", $password . $salt, false);
        // TODO 3 La condición del if es que el password sea correcto
        if (strcmp($hash, $usuario['password']) == 0) {
            $_SESSION['autenticado'] = 'correcto';
            $_SESSION['permisos'] = str_split($usuario['permisos']);
            $_SESSION['user'] = $usuario['user'];
            header("Location:MasterWeb.php");
        } else {
            $_SESSION['autenticado'] = 'incorrecto';
            header("Location: NoAuth.php");
        }
    } else {
        $_SESSION['autenticado'] = 'incorrecto';
        header("Location: NoAuth.php");
    }
    mysqli_close($link);
    exit;
}
?>
<html>
<head>
    <title> Login </title>
    <meta charset="UTF-8">
</head>
<body>
<br><br><br>
<center>
    <img src="logo.png" width=120 height=60>
    <br><br><br>
    <form action='<?php "{$_SERVER['PHP_SELF']}" ?>' method=post>
        <table bgcolor='lightgrey'>
            <tr>
                <td width=100> Usuario:</td>
                <td><input type=text name='user'></td>
            </tr>
            <tr>
                <td width=100> Password:</td>
                <td><input type=password name='passwd'></td>
            </tr>
        </table>
        <br>
        <img src=captcha.php>
        <input type=text name='valor'>
        <input type=submit name='login' value="LOGIN"><br><br><br>
        <br><A href='logincert.php'> autenticación con certificado </A>
        <br><br><br>
        <input type=submit name='registro' value="REGISTRAR USUARIO">
    </form>
    <?php
    if (isset($_SESSION['CAPTCHA_LOGIN']) && (strcmp($_SESSION['CAPTCHA_LOGIN'], 'incorrecto') === 0)) {
        echo "<Center> <font color= red>";
        echo "<BR><BR><BR>Error de captcha <BR><BR>";
        echo "</font></Center>";
    } else {
        unset($_SESSION['CAPTCHA_LOGIN']);
        echo "<br />";
    }
    ?>
</center>
</body>
</html>
