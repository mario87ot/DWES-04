<?php

include 'includes/SmartyExt.class.php';
include 'includes/DB.class.php';
include 'includes/usuario.class.php';

session_start();
/* Si se intenta acceder a esta página sin estar logueado,se redirige automáticamente
  a la página de login para que inicie sesión */
if (!isset($_SESSION['usuario'])) {
    header("location: index.php");
    die();
}

$template = new SmartyExt();

//Si se ha pulsado en Establecer color de fondo
if (isset($_POST['establecer'])) {
    //Creamos una cookie que almacene el color seleccionado
    setcookie("colorfondo", $_POST['color'], time() + 3600, "/");
    $_COOKIE['colorfondo'] = $_POST['color'];
}
//Si se ha pulsado la opción Restablecer preferencias
if (isset($_POST['eliminacookie'])) {
    if (isset($_COOKIE["colorfondo"])) {
        //Destruimos la cookie y se restablecerán las prefencias por defecto
        setcookie("colorfondo", $_COOKIE['colorfondo'], time() - 1, "/");
        header("location: preferencias.php");
    }
}

//Si la cookie que almacena el color de fondo está definida
if (isset($_COOKIE['colorfondo'])) {
    //Asignamos el valor de la cookie a la variable colorfondo para usarla en el template
    $template->assign("colorfondo", Usuario::colorFondo($_COOKIE['colorfondo']));
}


$template->assign('bienvenida', 'Bienvenid@ ' . $_SESSION['usuario']);
$template->assign('hora', 'Hora de inicio de sesión: ' . $_SESSION['hora']);
$template->display('preferencias.tpl');


