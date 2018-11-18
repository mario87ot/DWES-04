<?php
/* Smarty version 3.1.30, created on 2018-11-18 14:26:24
  from "C:\xampp\htdocs\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Smarty\templates\ultimosmovimientos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bf16880a6fec7_96559261',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4719de4bc585456d756227cef6a71a6736ded27f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Smarty\\templates\\ultimosmovimientos.tpl',
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
function content_5bf16880a6fec7_96559261 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
}
<?php $_smarty_tpl->_subTemplateRender("file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if (isset($_smarty_tpl->tpl_vars['colorfondo']->value)) {
echo $_smarty_tpl->tpl_vars['colorfondo']->value;
}
if (isset($_smarty_tpl->tpl_vars['mensaje']->value)) {?><p class="rojo"><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</p><?php }?>
<!--Si existen movimientos, mostramos la tabla con los últimos 4-->
<?php if (isset($_smarty_tpl->tpl_vars['movimientos']->value)) {?>
<h2>ÚLTIMOS MOVIMIENTOS</h2>
<table border='1' class='tablaMovimientos'>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Concepto</th>
            <th>Cantidad</th>
            <th>Saldo contable</th>
        </tr>
    </thead>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['movimientos']->value, 'movimiento', false, 'indice');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['indice']->value => $_smarty_tpl->tpl_vars['movimiento']->value) {
?>
    <?php $_smarty_tpl->_assignInScope('saldoContable', $_smarty_tpl->tpl_vars['saldo']->value+$_smarty_tpl->tpl_vars['movimiento']->value->getCantidad());
?>
    <?php if ($_smarty_tpl->tpl_vars['indice']->value >= $_smarty_tpl->tpl_vars['ultimoMovimiento']->value) {?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['movimiento']->value->getFecha();?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['movimiento']->value->getConcepto();?>
</td>
        <!--Si la cantidad es negativa la mostramos en rojo-->
        <?php if ($_smarty_tpl->tpl_vars['movimiento']->value->getCantidad() < 0) {?> <td class="rojo"><?php echo number_format($_smarty_tpl->tpl_vars['movimiento']->value->getCantidad(),2,'.','');?>
€</td>
            <?php } else { ?>
            <td><?php echo number_format($_smarty_tpl->tpl_vars['movimiento']->value->getCantidad(),2,'.','');?>
€</td>
            <?php }?>
            <!--Si el saldo es negativo, lo mostramos en rojo-->
            <?php if ($_smarty_tpl->tpl_vars['saldoContable']->value < 0) {?> <td class="rojo"><?php echo number_format($_smarty_tpl->tpl_vars['saldoContable']->value,2,'.','');?>
€</td> <?php } else { ?> <td><?php echo number_format($_smarty_tpl->tpl_vars['saldoContable']->value,2,'.','');?>
€</td>
                <?php }?>
                <?php }?>
    </tr>
    
    <?php $_smarty_tpl->_assignInScope('saldo', $_smarty_tpl->tpl_vars['saldo']->value+$_smarty_tpl->tpl_vars['movimiento']->value->getCantidad());
?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php if ($_smarty_tpl->tpl_vars['saldoContable']->value < 0) {?> <tr>
        <td colspan='4' style='background-color:#003366; color:white;'>SALDO CONTABLE ACTUAL: <span class="rojo"><?php echo number_format($_smarty_tpl->tpl_vars['saldoContable']->value,2,'.','');?>
 €</span></td>
        </tr>
        <?php } else { ?>
        <tr>
            <td colspan='4' style='background-color:#003366; color:white;'>SALDO CONTABLE ACTUAL: <?php echo number_format($_smarty_tpl->tpl_vars['saldoContable']->value,2,'.','');?>
 €</td>
        </tr>
        <?php }?>
        <?php }?>
        
</table>
        <p><a href="banca.php">Volver</a></p>
        
        <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
