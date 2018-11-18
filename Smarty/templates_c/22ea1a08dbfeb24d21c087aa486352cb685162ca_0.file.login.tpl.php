<?php
/* Smarty version 3.1.30, created on 2018-03-19 18:21:22
  from "C:\xampp\htdocs\tarea4\Smarty\templates\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aaff192a87891_95253554',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22ea1a08dbfeb24d21c087aa486352cb685162ca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tarea4\\Smarty\\templates\\login.tpl',
      1 => 1521480079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aaff192a87891_95253554 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tarea 4</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <h1>FORRARE BANK</h1>

        <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?><p class="rojo"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p><?php }?>
        <form id="formUser" method="post" action="index.php">
        <fieldset class='fieldset'>
            <legend>Login usuario</legend>
                <table class='centro'>
                    <tr>
                        <td>Usuario:</td><td><input type='text' name='login'/></td>
                    </tr>                  
                    <tr>
                        <td>Password: </td><td><input type='password' name='password'/>
                    </tr>
                    <br>
                    <tr>
                        <td><br>
                            <div class="botonIniciar">
                                <input type="submit" name="iniciar" value="Iniciar sesión"/>
                            </div>
                        </td>
                    </tr>
                </table>
        </fieldset>       
           
            

        </form>
    </body>
</html>
<?php }
}
