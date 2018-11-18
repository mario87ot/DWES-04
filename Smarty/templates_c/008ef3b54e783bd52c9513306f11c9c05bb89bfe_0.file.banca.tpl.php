<?php
/* Smarty version 3.1.30, created on 2018-03-17 17:03:01
  from "C:\xampp\htdocs\tarea4\Smarty\templates\banca.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aad3c35815ff0_19840723',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '008ef3b54e783bd52c9513306f11c9c05bb89bfe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tarea4\\Smarty\\templates\\banca.tpl',
      1 => 1521302574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu.tpl' => 1,
  ),
),false)) {
function content_5aad3c35815ff0_19840723 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tarea 4</title>
        <link rel="stylesheet" href="css/estilos.css">      
    </head>
        <?php if (isset($_smarty_tpl->tpl_vars['colorfondo']->value)) {
echo $_smarty_tpl->tpl_vars['colorfondo']->value;
}?>
        <?php if (isset($_smarty_tpl->tpl_vars['bienvenida']->value)) {?><h2><?php echo $_smarty_tpl->tpl_vars['bienvenida']->value;?>
</h2><?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['hora']->value)) {?><h2><?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
</h2><?php }?>

        <?php $_smarty_tpl->_subTemplateRender("file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        
    </body>
</html>  <?php }
}
