<?php
    require "includes/common.php";
    require "includes/cabecera.php"; 

    if (isset($_GET['pag'])) {
        $pag = $_GET['pag'];
    } else {
        $pag = 1;
    }

    $numElementos = 10;
    $start = ($pag-1)*$numElementos;
?>

<div class="xs100 flex xs_jcCenter">
    <div class="centrado flex xs_fCol xs_aiCenter">
        <div class="xs100 flex xs_fCol xs_aiCenter fondoBlanco formControl mTop40 mBottom40">
            <h2 class="mBottom40">Listado de Categorías</h2>
            <div class="xs90 flex xs_fCol xs_aiStart mBottom20">
                <?php
                    $sql1 = "select * from categorias";
                    $condicion = " where ";

                    if(isset($_SESSION['palabraControl'])) {
                        $sql1 = $sql1.$condicion." nombre like '%".$_SESSION['palabraControl']."%'";
                    }

                    $consultaTotal = $sql1;
                    $resulTotal = $db->query($consultaTotal);
                    $cuantos = $resulTotal->num_rows;
                    $sql1 = $sql1." limit ".$start.",".$numElementos;
                    $resul1 = $db->query($sql1);
                    if($resul1->num_rows==0){
                        echo "<h3 class='xs100 txCentrado mBottom40 mTop40'>No existen productos con los filtros asignados</h3>";
                    }
                    while ($row1 = $resul1->fetch_assoc()) {
                ?>

                    <div class="xs100 flex xs_jcSpabet xs_aiCenter mBottom20">
                        <h3><?php echo $row1['nombre']?></h3>
                        <div class="m10 flex xs_jcSpabet xs_aiCenter linkEd_Borr">
                            <a href="edCategoria.php?icat=<?php echo $row1['id_categoria']?>"><i class="fas fa-edit"></i></a>
                            <a href="delCategoria.php?icat=<?php echo $row1['id_categoria']?>" class="delElemento"><i class="far fa-trash-alt"></i></a>
                        </div>
                    </div>

                <?php
                    }
                ?>
            </div>
            <div class="fondoCian linkAzul"><a href="nCategoria.php">Añadir Categoria</a></div>
        </div>
        <div class="flex pBottom20">
            <?php
                if ($pag>1) {
            ?>
                <a href="?pag=<?php echo $pag-1?>" class="botonPag">&#171;</a>
            <?php
                }
                $paginasTotal = ceil($cuantos/$numElementos);
                for($i=1;$i<=$paginasTotal;$i++) {
                    if ($pag==$i) {
            ?>
                <a href="?pag=<?php echo $i?>" class="botonPag pagActiva"><?php echo $i?></a>
            <?php
                    } else {
            ?>
                <a href="?pag=<?php echo $i?>" class="botonPag"><?php echo $i?></a>
            <?php
                    }
                }

                if ($pag<$paginasTotal) {
            ?>
                <a href="?pag=<?php echo $pag+1?>" class="botonPag">&#187;</a>
            <?php
                }
            ?>
        </div>
    </div>
</div>