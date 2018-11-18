<?php
/* Smarty version 3.1.30, created on 2018-11-18 14:26:16
  from "C:\xampp\htdocs\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Ordonez_Tercero_MarioDavid_DWES04_Tarea\Smarty\templates\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bf16878d384e6_52127445',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09ab363a71508f5a2c644e6ed08da616ebf410d5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Ordonez_Tercero_MarioDavid_DWES04_Tarea\\Smarty\\templates\\login.tpl',
      1 => 1542547563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5bf16878d384e6_52127445 (Smarty_Internal_Template $_smarty_tpl) {
?>
    
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>




<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?><p class="rojo"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p><?php }?>
<form id="formUser" method="post" action="index.php">
    <fieldset class='fieldset'>
        <legend>Login usuario</legend>
        <table class='centro'>
            <tr>
                <td>Usuario:</td>
                <td><input type='text' name='login' /></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type='password' name='password' />
            </tr>
            <br>
            <tr>
                <td><br>
                    <div class="botonIniciar">
                        <input type="submit" name="iniciar" value="Iniciar sesión" />
                    </div>
                </td>
            </tr>
        </table>
    </fieldset>
</form>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
