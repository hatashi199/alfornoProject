<?php
    require "includes/common.php";
    require "includes/cabecera.php";
    $icat = $_GET['icat'];
    $sql1 = "select * from categorias where id_categoria=".$icat;
    $resul1 = $db->query($sql1);
    if ($row1 = $resul1->fetch_assoc()) {

?>

<div class="xs100 flex xs_jcCenter">
    <div class="centrado flex xs_fCol xs_aiCenter fondoBlanco formControl mTop40 mBottom40">
        <h2 class="mBottom20">Edita una Categoria</h2>
        <form action="actualizarCat.php" method="post" class="xs100 flex xs_fCol xs_aiCenter">
            <input type="hidden" name="icat" value="<?php echo $row1['id_categoria']?>">
            <input type="text" name="categoria" value="<?php echo $row1['nombre']?>" class="m20 mBottom20">
            <input type="submit" value="Editar Categoria" class="botonRojo">
        </form>
    </div>
</div>

<?php
    }
?>