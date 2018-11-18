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
$login=$_SESSION['usuario'];
$conexion=DB::conexion();
$movimientos=Movimiento::movimientos($conexion, $login);

if(count($movimientos)==0){
    $template->assign("mensaje", "*No existen movimientos que mostrar");
}else{
   $template->assign("movimientos", $movimientos); 
}

$template->assign("saldo", 0);
$template->assign("saldoContable", 0);
$template->assign("ultimoMovimiento", count($movimientos)-4);

$template->assign('bienvenida', 'Bienvenid@ ' . $_SESSION['usuario']);
$template->assign('hora', 'Hora de inicio de sesión: ' . $_SESSION['hora']);
$template->display('ultimosmovimientos.tpl');


