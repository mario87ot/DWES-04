<?php
/* Smarty version 3.1.30, created on 2018-11-18 14:26:22
  from "C:\xampp\htdocs\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Smarty\templates\banca.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bf1687e6f9d41_33602160',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '210c5626beadaa81dbb0ef4e1684f3af9c045b5b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Smarty\\templates\\banca.tpl',
      1 => 1542547563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:menu.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5bf1687e6f9d41_33602160 (Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

       
        <?php if (isset($_smarty_tpl->tpl_vars['colorfondo']->value)) {
echo $_smarty_tpl->tpl_vars['colorfondo']->value;
}?>

        <?php $_smarty_tpl->_subTemplateRender("file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        
  
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
