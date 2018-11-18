<?php
/* Smarty version 3.1.30, created on 2018-11-18 14:26:27
  from "C:\xampp\htdocs\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Smarty\templates\pagarrecibos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bf16883e21b86_72049229',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4256feede95a484e7e2218a5459b94c7da862993' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Smarty\\templates\\pagarrecibos.tpl',
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
function content_5bf16883e21b86_72049229 (Smarty_Internal_Template $_smarty_tpl) {
?>
    
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php if (isset($_smarty_tpl->tpl_vars['colorfondo']->value)) {
echo $_smarty_tpl->tpl_vars['colorfondo']->value;
}?>
    <?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)) {?><p class='verde'><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</p><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errorPago']->value)) {
echo $_smarty_tpl->tpl_vars['errorPago']->value;
}?>
    <form action="pagarrecibos.php" method="post">
        <fieldset class='fieldset'>
            <legend>Formulario de pago</legend>
            <table align="center" class="tabla">
                <tr>
                    <td>Cantidad:</td> <td><input type = 'text' name = 'cantidad' placeholder="Ej: 130.85" value = '<?php if (isset($_smarty_tpl->tpl_vars['cantidad']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['cantidad']->value;
}?>' size="18" autofocus /></td><br><br>
                </tr>
                <tr>
                    <td>Concepto:</td><td><input type="text" name="concepto" placeholder="Ej: ingreso ordinario" value="<?php if (isset($_smarty_tpl->tpl_vars['concepto']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['concepto']->value;
}?>" size="18"/></td>
                </tr>
                <br><br>
                <tr>
                    <td>Fecha:</td><td> <input type="date" name="fecha" value="<?php echo date('Y-m-d');?>
"  /></td><br><br>
                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <input type = "submit" name = "pagar" value = "Pagar"/>     
                    </td>
                </tr>
            </table>
         </fieldset>
    </form>

        <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?> 
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['error']->value, 'dato');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->value) {
?> 
                <p class='rojo'><?php echo $_smarty_tpl->tpl_vars['dato']->value;?>
</p> 
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
        
        <?php }?>

        <p><a href="banca.php">Volver</a></p>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
