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

$row = array();
$row['codigoMov'] = Movimiento::numeroMovimiento();
$row['loginUsu'] = $_SESSION['usuario'];

if (isset($_POST['fecha'])) {
    $row['fecha'] = $_POST['fecha'];
    $template->assign('fecha', $_POST['fecha']);
}

if (isset($_POST['concepto'])) {
    $row['concepto'] = $_POST['concepto'];
    $template->assign('concepto', $_POST['concepto']);
}

if (isset($_POST['cantidad'])) {
    $row['cantidad'] = $_POST['cantidad'];
    $template->assign('cantidad', $_POST['cantidad']);
}

if (isset($_POST['fecha']) && isset($_POST['concepto']) && isset($_POST['cantidad'])) {
    $movimiento = new Movimiento($row);
    if (isset($_POST['pagar'])) {
        $error = Movimiento::validarCamposPago(trim($movimiento->getCantidad()), trim($movimiento->getConcepto()), $movimiento->getFecha());
        if (count($error) == 0) {
            $conexion = DB::conexion();
            $pagoInsertado = Usuario::hacerPago($conexion, $movimiento);
            if ($pagoInsertado) {
                $template->assign("mensaje", "Pago hecho correctamente");
            } else {
                $template->assign("errorIngreso", "*Ha habido un error al realizar el pago. Vuelva a intentarlo");
            }
        } else {
            $template->assign('error', $error);
        }
    }
}

$template->assign('bienvenida', 'Bienvenid@ ' . $_SESSION['usuario']);
$template->assign('hora', 'Hora de inicio de sesión: ' . $_SESSION['hora']);

$template->display('pagarrecibos.tpl');

