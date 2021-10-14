<?php
    require "includes/common.php";
    require "includes/cabecera.php";
?>

<div class="xs100 flex xs_jcCenter">
    <div class="centrado flex xs_fCol xs_aiCenter fondoBlanco formControl mTop40 mBottom40">
        <h2 class="mBottom20">Añade una Categoria</h2>
        <form action="guardarCat.php" method="post" class="xs100 flex xs_fCol xs_aiCenter">
            <input type="text" name="categoria" placeholder="Nombre de la Categoria" class="m20 mBottom20">
            <input type="submit" value="Guardar Categoría" class="linkAzul fondoCian botonSubmit">
        </form>
    </div>
</div>