<?php
    require "includes/common.php";
    require "includes/cabecera.php";
    $iprod = $_GET['iprod'];
    $sql1 = "select * from productos where id_producto=".$iprod;
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
            <h2 class="mBottom20">Añade una Producto</h2>
            <form action="actualizarProd.php" method="post" class="xs100 flex xs_fCol xs_aiCenter" enctype="multipart/form-data">
                <input type="hidden" name="iprod" value="<?php echo $row1['id_producto']?>">
                <input type="text" name="producto" value="<?php echo $row1['nombre']?>" class="m20 mBottom20">
                <textarea class="cajaTextarea" name="descripProducto"><?php echo $row1['descripcion']?></textarea>
                <input type="text" name="precio" value="<?php echo $row1['precio']?>" class="m20 mBottom20 mTop20">
                <select name="valoracion" class="mBottom20">
                <?php
                    $sql2 = "select valoracion from productos";
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
                <input type="file" name="imgProducto" class="mBottom20 inputFile" id="dolarFile">
                <label for="dolarFile" class="dolarFile mBottom20">Selecciona una imagen</label>
                <div class="m30 flex xs_jcSpabet mBottom20">
                    <select name="selectCat">
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
                    <select name="selectMar">
                        <?php
                            $sql4 = "select * from marcas";
                            $resul4 = $db->query($sql4);
                            while ($row4 = $resul4->fetch_assoc()) {
                                if ($row4['id_marca']==$row1['id_marca']) {
                        ?>
                        <option value="<?php echo $row4['id_marca']?>" selected><?php echo $row4['nombre']?></option>  
                        <?php
                            } else {
                        ?>
                        <option value="<?php echo $row4['id_marca']?>"><?php echo $row4['nombre']?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </div>
                <input type="submit" value="Actualizar Producto" class="linkAzul fondoCian botonSubmit">
            </form>
        </div>
    </div>
<?php
    }
?>