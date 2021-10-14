<?php
    require "includes/common.php";
    require "includes/cabecera.php";
?>

<div class="xs100 flex xs_jcCenter">
    <div class="centrado flex xs_fCol xs_aiCenter fondoBlanco formControl mTop40 mBottom40">
        <h2 class="mBottom20">Añade una Marca</h2>
        <form action="guardarMar.php" method="post" class="xs100 flex xs_fCol xs_aiCenter">
            <input type="text" name="marca" placeholder="Nombre de la Marca" class="m20 mBottom20">
            <input type="submit" value="Guardar Marca" class="linkAzul fondoCian botonSubmit">
        </form>
    </div>
</div>