   {* Incluimos el encabezado y el menú*}
   {include file="header.tpl"}
   {if isset($colorfondo)}{$colorfondo}{/if}
   {if isset($mensaje)}<p class='verde'>{$mensaje}</p>{/if}
   {include file="menu.tpl"}
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
{* Incluimos el pie de página*}
{include file="footer.tpl"}
