<?php
/* Smarty version 3.1.30, created on 2018-11-18 14:26:28
  from "C:\xampp\htdocs\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Smarty\templates\devolverrecibos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bf16884df39f7_13504747',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '979a3cfd33e246630a170a2ab0775fb1d7f0eba9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Smarty\\templates\\devolverrecibos.tpl',
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
function content_5bf16884df39f7_13504747 (Smarty_Internal_Template $_smarty_tpl) {
?>
        
        <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
 
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
