    {* Incluimos el encabezado y el menú*}
    {include file="header.tpl"}
    {include file="menu.tpl"}
    {if isset($colorfondo)}{$colorfondo}{/if}
    {if isset($mensaje)}<p class='verde'>{$mensaje}</p>{/if}
    {if isset($errorPago)}{$errorPago}{/if}
    <form action="pagarrecibos.php" method="post">
        <fieldset class='fieldset'>
            <legend>Formulario de pago</legend>
            <table align="center" class="tabla">
                <tr>
                    <td>Cantidad:</td> <td><input type = 'text' name = 'cantidad' placeholder="Ej: 130.85" value = '{if isset($cantidad)} {$cantidad}{/if}' size="18" autofocus /></td><br><br>
                </tr>
                <tr>
                    <td>Concepto:</td><td><input type="text" name="concepto" placeholder="Ej: ingreso ordinario" value="{if isset($concepto)} {$concepto}{/if}" size="18"/></td>
                </tr>
                <br><br>
                <tr>
                    <td>Fecha:</td><td> <input type="date" name="fecha" value="{date('Y-m-d')}"  /></td><br><br>
                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <input type = "submit" name = "pagar" value = "Pagar"/>     
                    </td>
                </tr>
            </table>
         </fieldset>
    </form>

        {if isset($error)} 
            {foreach from=$error item=dato} 
                <p class='rojo'>{$dato}</p> 
            {/foreach}        
        {/if}

        <p><a href="banca.php">Volver</a></p>

{* Incluimos el pie de página*}
{include file="footer.tpl"}