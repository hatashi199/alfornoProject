<?php
    require "includes/common.php";
    require "includes/cabecera.php";
?>

<div class="xs100 flex xs_jcCenter">
    <div class="centrado flex xs_fCol xs_aiCenter fondoBlanco formControl mTop40 mBottom40">
        <h2 class="mBottom20">Añade una Foto</h2>
        <form action="guardarFot.php" method="post" class="xs100 flex xs_fCol xs_aiCenter" enctype="multipart/form-data">
            <input type="file" name="imgGaleria" class="mBottom20 inputFile" id="dolarFile">
            <label for="dolarFile" class="dolarFile mBottom20">Selecciona una imagen</label>
            <input type="text" name="alternativo" placeholder="Nombre del texto alternativo">
            <input type="submit" value="Guardar Foto" class="botonRojo">
        </form>
    </div>
</div>