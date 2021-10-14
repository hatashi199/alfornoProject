<?php
    require "includes/common.php";
    require "includes/cabecera.php";
    $iplat = $_GET['iplat'];
    $sql1 = "select * from platos where id_plato=".$iplat;
    $resul1 = $db->query($sql1);
    if ($row1 = $resul1->fetch_assoc()) {
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
            <form action="actualizarPlat.php" method="post" class="xs100 flex xs_fCol xs_aiCenter" enctype="multipart/form-data">
                <input type="hidden" name="iplat" value="<?php echo $row1['id_plato']?>">
                <input type="text" name="plato" value="<?php echo $row1['nombre']?>" class="m20 mBottom20">
                <textarea class="cajaTextarea" name="descripPlato"><?php echo $row1['descripcion']?></textarea>
                <input type="text" name="precio" value="<?php echo $row1['precio']?>" class="m20 mBottom20 mTop20">
                <select name="valoracion" class="xs10 mBottom20">
                <?php
                    $sql2 = "select valoracion from platos";
                    $resul2 = $db->query($sql2);
                    while ($row2 = $resul2->fetch_assoc()) {
                        if ($row2['valoracion']==$row1['valoracion']) {
                ?>
                    <option value="<?php echo $row2['valoracion']?>" selected><?php echo $row2['valoracion']?></option>

                <?php    
                        }
                    }
                ?>
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
                    <?php
                        $sql3 = "select * from categorias";
                        $resul3 = $db->query($sql3);
                        while ($row3 = $resul3->fetch_assoc()) {
                            if ($row3['id_categoria']==$row1['id_categoria']) {
                    ?>
                    <option value="<?php echo $row3['id_categoria']?>" selected><?php echo $row3['nombre']?></option>  
                    <?php
                        } else {
                    ?>
                    <option value="<?php echo $row3['id_categoria']?>"><?php echo $row3['nombre']?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
                <input type="submit" value="Actualizar Plato" class="botonRojo">
            </form>
        </div>
    </div>
<?php
    }
?>