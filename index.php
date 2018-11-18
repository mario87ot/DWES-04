<?php

include 'includes/SmartyExt.class.php';
include 'includes/DB.class.php';
include 'includes/usuario.class.php';

$template = new SmartyExt();
//Si se ha pulsado en el botón de Iniciar sesión
if (isset($_POST['iniciar'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];
    //Comprobamos el login introducido
    $user = DB::getLogin($login);
    //Si existe
    if ($user) {
        //Guardamos login y contraseña
        $usuario=$user['login'];
        $clave=$user['password'];
        //Comprobamos la contraseña y si es correcta...
      if (password_verify($password, $clave)) {
            //Iniciamos una nueva sesión y redirigimos a la página principal
            session_start();
            $_SESSION['usuario']=$usuario;
            $_SESSION['hora']=date("H:i:s");
            header('location: banca.php');
            //Si la contraseña no es correcta
        } else {
            $template->assign('error', '*Error, se ha logueado incorrectamente');
        }
        //Si no existe el login introducido
    } else {
        $template->assign('error', '*Error, no existe el usuario');
    }
}

$template->display('login.tpl');




