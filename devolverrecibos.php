<?php

include 'includes/SmartyExt.class.php';
include 'includes/DB.class.php';
include 'includes/movimiento.class.php';
include 'includes/usuario.class.php';

session_start();
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

$login = $_SESSION['usuario'];
$conexion = DB::conexion();

//Guardamos los recibos
$recibos = Movimiento::recibos($conexion, $login);
//Si no hay recibos
if (count($recibos) == 0) {
    $template->assign("mensaje", "*No existen recibos actualmente");
    //Si hay recibos
} else {
    $template->assign("recibos", $recibos);
}

//Guardamos los movimientos
$datos = Movimiento::movimientos($conexion, $login);
//si se ha pulsado el botón Devolver
if (isset($_POST['devolver'])) {
    //Devolvemos los recibos seleccionados
    $recibosDevueltos = Usuario::devolverRecibos($conexion, $datos);
    //Si se han devuelto
    if ($recibosDevueltos) {
        $template->assign("correcto", "Recibo devuelto correctamente");
        header("location: devolverrecibos.php");

        //Si no se ha seleccionado ningún recibo
    } else {
        $template->assign("mensaje", "*No ha seleccionado ningún recibo");
    }
}

$template->assign('bienvenida', 'Bienvenid@ ' . $_SESSION['usuario']);
$template->assign('hora', 'Hora de inicio de sesión: ' . $_SESSION['hora']);
$template->display("devolverrecibos.tpl");
