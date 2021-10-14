<?php
    require "includes/common.php";
    require "includes/cabecera.php";
?>

<script>
    $(document).ready(function(){
        tinymce.init({
            selector: '.cajaTextarea',
            language: 'es',
            height: 200,
            width: 800,
            theme: 'modern',
            plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help code ',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link image | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code codesample',
        });
    })
</script>

<div class="xs100 flex xs_jcCenter">
    <div class="centrado flex xs_fCol xs_aiCenter fondoBlanco formControl mTop40 mBottom40">
        <h2 class="mBottom20">Añade un Plato</h2>
        <form action="guardarPlat.php" method="post" class="xs100 flex xs_fCol xs_aiCenter" enctype="multipart/form-data">
            <input type="text" name="plato" placeholder="Nombre del Plato" class="m20 mBottom20">
            <textarea class="cajaTextarea" name="descripPlato"></textarea>
            <input type="text" name="precio" placeholder="Precio" class="m20 mBottom20 mTop20">
            <select name="valoracion" class="xs15 mBottom20">
                <option value="" selected>-- Valoración --</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <input type="file" name="imgPlato" class="mBottom20 inputFile" id="dolarFile">
            <label for="dolarFile" class="dolarFile mBottom20">Selecciona una imagen</label>
            <select name="selectCat" class="xs15 mBottom20">
                <option value="" selected>-- Categoría --</option>
                <?php
                    $sql1 = "select * from categorias";
                    $resul1 = $db->query($sql1);
                    while ($row1 = $resul1->fetch_assoc()) {
                ?>
                <option value="<?php echo $row1['id_categoria']?>"><?php echo $row1['nombre']?></option>  
                <?php
                    }
                ?>
            </select>
            <input type="submit" value="Guardar Plato" class="botonRojo">
        </form>
    </div>
</div>