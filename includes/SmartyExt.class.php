<?php

include 'libs/Smarty.class.php';
//Clase que extiende a la clase de Smarty
class SmartyExt extends Smarty {
    
    //CONSTRUCTOR
    function __construct() {
        //Establecemos la estructura de directorios de smarty
        parent::__construct();
        $this->setTemplateDir('Smarty/templates');
        $this->setCompileDir('Smarty/templates_c');
        $this->setCacheDir('Smarty/cache');
        $this->setConfigDir('Smarty/configs');
    }
}