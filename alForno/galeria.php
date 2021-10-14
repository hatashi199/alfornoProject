<?php
    require "includes/dbConnect.php";
    require "includes/cabecera.php";
?>

<script>
    $(document).ready(function(){
        $('.overlayGaleria').magnificPopup({
            type:'image',
            gallery: {
                enabled: true
            }
        });
    })
</script>

<div class="xs100 flex xs_jcCenter pTop60 pBottom60" id="galeriaPage">
    <div class="centrado flex xs_fCol xs_aiCenter">
        <h2 class="txNegro mBottom40">Galería de Fotos</h2>
        <div class="xs100 flex xs_fCol xs_aiCenter s_filaWrap s_jcCenter">
            <?php
                $sql1="select * from galeria";
                $resul1=$db->query($sql1);
                while ($row1=$resul1->fetch_assoc()) {
            ?>

            <div class="fondoImgCentrado imgGaleria posRel" style="background-image:url(images/<?php echo $row1['foto']?>);">
                <a href="images/<?php echo $row1['foto']?>" class="overlayGaleria flex xs_jcCenter xs_aiCenter"></a>
            </div>

            <?php
                }
            ?>
        </div>
    </div>
</div>

<?php
    require "includes/pie.php";
?>