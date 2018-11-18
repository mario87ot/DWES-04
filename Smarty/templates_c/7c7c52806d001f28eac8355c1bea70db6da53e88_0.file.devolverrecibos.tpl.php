<?php
/* Smarty version 3.1.30, created on 2018-03-20 17:29:57
  from "C:\xampp\htdocs\tarea4\Smarty\templates\devolverrecibos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ab13705751b59_05656451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c7c52806d001f28eac8355c1bea70db6da53e88' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tarea4\\Smarty\\templates\\devolverrecibos.tpl',
      1 => 1521563279,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu.tpl' => 1,
  ),
),false)) {
function content_5ab13705751b59_05656451 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tarea 4</title>
        <link rel="stylesheet" href="css/estilos.css">      
    </head>
        <?php $_smarty_tpl->_subTemplateRender("file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php if (isset($_smarty_tpl->tpl_vars['colorfondo']->value)) {
echo $_smarty_tpl->tpl_vars['colorfondo']->value;
}?>
        <?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)) {?><p class='rojo'><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</p><?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['correcto']->value)) {?><p class='verde'><?php echo $_smarty_tpl->tpl_vars['correcto']->value;?>
</p><?php }?>            
        <!--Si existen recibos, mostramos la tabla con los recibos-->
        <?php if (isset($_smarty_tpl->tpl_vars['recibos']->value)) {?>
        <form action="devolverrecibos.php" method="post">
            <h2>RECIBOS</h2>
            <br>
            <table border='1' class='tablaRecibos'>
                <thead>
                    <tr>
                        <th>Selección</th>
                        <th>Fecha</th>
                        <th>Concepto</th>
                        <th>Cantidad</th>                   
                    </tr>
                </thead>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recibos']->value, 'recibo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['recibo']->value) {
?>               
                <tr>
                    <td><input type='checkbox' name='selec[]' value=<?php echo $_smarty_tpl->tpl_vars['recibo']->value->getCodigoMov();?>
></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['recibo']->value->getFecha();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['recibo']->value->getConcepto();?>
</td>
                    <!--Al ser pagos, mostramos la cantidad en rojo-->
                    <td class='rojo'><?php echo number_format($_smarty_tpl->tpl_vars['recibo']->value->getCantidad(),2,'.','');?>
€</td>
                </tr>               
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <tr>
                    <td colspan='4'><input type='submit' name='devolver' value='Devolver' /></td>
                </tr>
            </table>
        </form>
        <?php }?>
        <p><a href="banca.php">Volver</a></p>     
     </body>
</html>  <?php }
}
