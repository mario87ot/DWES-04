<?php
/* Smarty version 3.1.30, created on 2018-11-17 14:11:04
  from "C:\xampp\htdocs\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Ordonez_Tercero_MarioDavid_DWES04_Tarea\smarty\templates\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bf01368ea2fe0_13280307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88276db8fc3869921a6b1e6caca812646fabd693' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\smarty\\templates\\header.tpl',
      1 => 1542460022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf01368ea2fe0_13280307 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Forrare Bank</title>
    <link type="text/css" href="css/estilos.css" rel="stylesheet" />
</head>

<body>
    <h1>FORRARE BANK</h1>

    <?php if (isset($_smarty_tpl->tpl_vars['bienvenida']->value)) {?><h2><?php echo $_smarty_tpl->tpl_vars['bienvenida']->value;?>
</h2><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['hora']->value)) {?><h2><?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
</h2><?php }
}
}
