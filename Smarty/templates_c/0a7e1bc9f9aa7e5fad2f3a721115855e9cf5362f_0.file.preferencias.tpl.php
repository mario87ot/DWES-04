<?php
/* Smarty version 3.1.30, created on 2018-03-20 16:38:10
  from "C:\xampp\htdocs\tarea4\Smarty\templates\preferencias.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ab12ae22003e0_62451809',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a7e1bc9f9aa7e5fad2f3a721115855e9cf5362f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tarea4\\Smarty\\templates\\preferencias.tpl',
      1 => 1521503201,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu.tpl' => 1,
  ),
),false)) {
function content_5ab12ae22003e0_62451809 (Smarty_Internal_Template $_smarty_tpl) {
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
</body>
</html>
<?php }
}
