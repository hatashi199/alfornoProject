<?php
    require "includes/common.php";
    require "includes/cabecera.php";
    $imar = $_GET['imar'];
    $sql1 = "select * from marcas where id_marca=".$imar;
    $resul1 = $db->query($sql1);
    if ($row1 = $resul1->fetch_assoc()) {

?>

<div class="xs100 flex xs_jcCenter">
    <div class="centrado flex xs_fCol xs_aiCenter fondoBlanco formControl mTop40 mBottom40">
        <h2 class="mBottom20">Edita una Marca</h2>
        <form action="actualizarMar.php" method="post" class="xs100 flex xs_fCol xs_aiCenter">
            <input type="hidden" name="imar" value="<?php echo $row1['id_marca']?>">
            <input type="text" name="marca" value="<?php echo $row1['nombre']?>" class="m20 mBottom20">
            <input type="submit" value="Editar Marca" class="linkAzul fondoCian botonSubmit">
        </form>
    </div>
</div>

<?php
    }
?>