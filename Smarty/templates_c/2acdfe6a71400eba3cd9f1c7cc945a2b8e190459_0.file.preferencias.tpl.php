<?php
/* Smarty version 3.1.30, created on 2018-11-18 14:26:29
  from "C:\xampp\htdocs\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Smarty\templates\preferencias.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bf1688577f636_50086772',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2acdfe6a71400eba3cd9f1c7cc945a2b8e190459' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Smarty\\templates\\preferencias.tpl',
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
function content_5bf1688577f636_50086772 (Smarty_Internal_Template $_smarty_tpl) {
?>
   
   <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

   <?php if (isset($_smarty_tpl->tpl_vars['colorfondo']->value)) {
echo $_smarty_tpl->tpl_vars['colorfondo']->value;
}?>
   <?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)) {?><p class='verde'><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</p><?php }?>
   <?php $_smarty_tpl->_subTemplateRender("file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

   <h2>PREFERENCIAS</h2>
    <div class='formPreferencias'>
        <form action="preferencias.php" method="post">
            <table>
                <tr>
                    <!--Desplegable para seleccionar el color de fondo-->
                    <td align='center'>
                        Selecciona el color de fondo:</td><td align='center'><select name="color">    
                            <option>Blanco</option>
                            <option>Azul</option>
                            <option>Verde</option>
                            <option>Rojo</option>
                        </select></td>
                </tr>
                <tr><td align='center'>
                        <input type="submit" name="establecer" id="establecer" value="Establecer color de fondo"></td>
                    <td align='center'><input type="submit" name="eliminacookie" id="eliminacookie" value="Restablecer preferencias"></td>
                </tr>
            </table>
        </form>
    </div>   
    <p><a href="banca.php">Volver</a></p>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
