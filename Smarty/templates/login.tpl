    {* Incluimos el encabezado y el menú*}
    {include file="header.tpl"}



{if isset($error)}<p class="rojo">{$error}</p>{/if}
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
{* Incluimos el pie de página*}
{include file="footer.tpl"}
