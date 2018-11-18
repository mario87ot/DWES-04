{* Incluimos el encabezado y el menú*}
{include file="header.tpl"}}
{include file="menu.tpl"}
{if isset($colorfondo)}{$colorfondo}{/if}
{if isset($mensaje)}<p class="rojo">{$mensaje}</p>{/if}
<!--Si existen movimientos, mostramos la tabla con los últimos 4-->
{if isset($movimientos)}
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
    {foreach from=$movimientos item=movimiento key=indice}
    {$saldoContable=$saldo+$movimiento->getCantidad()}
    {if $indice>=$ultimoMovimiento}
    <tr>
        <td>{$movimiento->getFecha()}</td>
        <td>{$movimiento->getConcepto()}</td>
        <!--Si la cantidad es negativa la mostramos en rojo-->
        {if $movimiento->getCantidad()<0} <td class="rojo">{number_format($movimiento->getCantidad(), 2, '.', '')}€</td>
            {else}
            <td>{number_format($movimiento->getCantidad(), 2, '.', '')}€</td>
            {/if}
            <!--Si el saldo es negativo, lo mostramos en rojo-->
            {if $saldoContable<0} <td class="rojo">{number_format($saldoContable, 2, '.', '')}€</td> {else} <td>{number_format($saldoContable, 2, '.', '')}€</td>
                {/if}
                {/if}
    </tr>
    
    {$saldo = $saldo + $movimiento->getCantidad()}
    {/foreach}
    {if $saldoContable<0} <tr>
        <td colspan='4' style='background-color:#003366; color:white;'>SALDO CONTABLE ACTUAL: <span class="rojo">{number_format($saldoContable, 2, '.', '')} €</span></td>
        </tr>
        {else}
        <tr>
            <td colspan='4' style='background-color:#003366; color:white;'>SALDO CONTABLE ACTUAL: {number_format($saldoContable, 2, '.', '')} €</td>
        </tr>
        {/if}
        {/if}
        
</table>
        <p><a href="banca.php">Volver</a></p>
        {* Incluimos el pie de página*}
        {include file="footer.tpl"}
