        {* Incluimos el encabezado y el menú*}
        {include file="header.tpl"}
        {include file="menu.tpl"}
        {if isset($colorfondo)}{$colorfondo}{/if}
        {if isset($mensaje)}<p class='rojo'>{$mensaje}</p>{/if}
        {if isset($correcto)}<p class='verde'>{$correcto}</p>{/if}            
        <!--Si existen recibos, mostramos la tabla con los recibos-->
        {if isset($recibos)}
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
                {foreach from=$recibos item=recibo}               
                <tr>
                    <td><input type='checkbox' name='selec[]' value={$recibo->getCodigoMov()}></td>
                    <td>{$recibo->getFecha()}</td>
                    <td>{$recibo->getConcepto()}</td>
                    <!--Al ser pagos, mostramos la cantidad en rojo-->
                    <td class='rojo'>{number_format($recibo->getCantidad(), 2, '.', '')}€</td>
                </tr>               
                {/foreach}
                <tr>
                    <td colspan='4'><input type='submit' name='devolver' value='Devolver' /></td>
                </tr>
            </table>
        </form>
        {/if}
        <p><a href="banca.php">Volver</a></p>     
 {* Incluimos el pie de página*}
{include file="footer.tpl"}