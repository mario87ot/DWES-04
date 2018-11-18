<?php
/* Smarty version 3.1.30, created on 2018-11-18 14:20:05
  from "C:\xampp\htdocs\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Smarty\templates\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bf167050e2410_72578348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4aeb91d615ee04b83d589b6390f628117578f9a8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Smarty\\templates\\header.tpl',
      1 => 1542460022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf167050e2410_72578348 (Smarty_Internal_Template $_smarty_tpl) {
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
