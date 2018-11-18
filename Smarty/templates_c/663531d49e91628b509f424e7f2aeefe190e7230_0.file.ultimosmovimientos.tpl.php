<?php
/* Smarty version 3.1.30, created on 2018-03-20 17:29:58
  from "C:\xampp\htdocs\tarea4\Smarty\templates\ultimosmovimientos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ab137067bf101_66277998',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '663531d49e91628b509f424e7f2aeefe190e7230' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tarea4\\Smarty\\templates\\ultimosmovimientos.tpl',
      1 => 1521562924,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu.tpl' => 1,
  ),
),false)) {
function content_5ab137067bf101_66277998 (Smarty_Internal_Template $_smarty_tpl) {
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
        <?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)) {?><p class="rojo"><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
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
                    <?php if ($_smarty_tpl->tpl_vars['movimiento']->value->getCantidad() < 0) {?>
                    <td class="rojo"><?php echo number_format($_smarty_tpl->tpl_vars['movimiento']->value->getCantidad(),2,'.','');?>
€</td>
                    <?php } else { ?>
                        <td><?php echo number_format($_smarty_tpl->tpl_vars['movimiento']->value->getCantidad(),2,'.','');?>
€</td>
                    <?php }?>
                    <!--Si el saldo es negativo, lo mostramos en rojo-->
                    <?php if ($_smarty_tpl->tpl_vars['saldoContable']->value < 0) {?>
                        <td class="rojo"><?php echo number_format($_smarty_tpl->tpl_vars['saldoContable']->value,2,'.','');?>
€</</td>
                    <?php } else { ?>
                        <td><?php echo number_format($_smarty_tpl->tpl_vars['saldoContable']->value,2,'.','');?>
€</td>
                    <?php }?>
                </tr>
                <?php }?>
                <?php $_smarty_tpl->_assignInScope('saldo', $_smarty_tpl->tpl_vars['saldo']->value+$_smarty_tpl->tpl_vars['movimiento']->value->getCantidad());
?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php if ($_smarty_tpl->tpl_vars['saldoContable']->value < 0) {?>
                <tr><td colspan='4' style='background-color:#003366; color:white;'>SALDO CONTABLE ACTUAL: <span class="rojo"><?php echo number_format($_smarty_tpl->tpl_vars['saldoContable']->value,2,'.','');?>
 €</span></td></tr>
            <?php } else { ?>
                 <tr><td colspan='4' style='background-color:#003366; color:white;'>SALDO CONTABLE ACTUAL: <?php echo number_format($_smarty_tpl->tpl_vars['saldoContable']->value,2,'.','');?>
 €</td></tr>
            <?php }?>            
        <?php }?> 
        <p><a href="banca.php">Volver</a></p>
    </body>
</html>

<?php }
}
