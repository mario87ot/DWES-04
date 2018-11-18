<?php
//Destruimos la sesion
session_start();
session_unset();
session_destroy();
//Redireccionamos a la pagina de inicio
header("location: index.php");




