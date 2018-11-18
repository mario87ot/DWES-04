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
//Guardamos el último código de movimiento que exsta en la base de datos
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
    //Si se ha pulsado el botón ingresar
    if (isset($_POST['ingresar'])) {
        //Validamos los campos
        $error = Movimiento::validarCamposIngreso(trim($movimiento->getCantidad()), trim($movimiento->getConcepto()), $movimiento->getFecha());
        //Si no hay errores
        if (count($error) == 0) {
            $conexion = DB::conexion();
            $ingresoInsertado=Usuario::hacerIngreso($conexion, $movimiento);
            //Si se ha hecho el ingreso
            if($ingresoInsertado){
                $template->assign("mensaje", "Ingreso hecho correctamente");
                //Si no se ha podido realizar el ingreso
            }else{
                $template->assign("errorIngreso", "*Ha habido un error al realizar el ingreso. Vuelva a intentarlo");
            }
            //Si hay errores
        } else {
            $template->assign('error', $error);
        }
    }
}


$template->assign('bienvenida', 'Bienvenid@ ' . $_SESSION['usuario']);
$template->assign('hora', 'Hora de inicio de sesión: ' . $_SESSION['hora']);
$template->display('ingresardinero.tpl');


