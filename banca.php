<?php

session_start();

include 'includes/SmartyExt.class.php';
include 'includes/DB.class.php';
include 'includes/usuario.class.php';
/* Si se intenta acceder a esta página sin estar logueado,se redirige automáticamente
  a la página de login para que inicie sesión */
if (!isset($_SESSION['usuario'])) {
    header("location: index.php");
    die();
}
$template = new SmartyExt();
//Si la cookie que almacena el color de fondo está definida
if (isset($_COOKIE['colorfondo'])) {
    //Asignamos el valor de la cookie a la variable colorfondo para usarla en el template
    $template->assign("colorfondo", Usuario::colorFondo($_COOKIE['colorfondo']));
}

$template->assign('bienvenida', 'Bienvenid@ ' . $_SESSION['usuario']);
$template->assign('hora', 'Hora de inicio de sesión: ' . $_SESSION['hora']);

$template->display('banca.tpl');

