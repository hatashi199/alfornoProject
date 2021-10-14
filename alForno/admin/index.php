<?php
    require "includes/common.php";
    require "includes/cabecera.php";

    if (isset($_GET['pag'])) {
        $pag = $_GET['pag'];
    } else {
        $pag = 1;
    }

    $numElementos = 6;
    $start = ($pag-1)*$numElementos;
?>

<div class="xs100 flex xs_jcCenter">
    <div class="centrado flex xs_fCol xs_aiCenter">
    <script>
        $(document).ready(function(){
            var ordenProductos = $(".ordenLista");
            ordenProductos.change(function(){
                $("#formListado").submit();
            })
        })
    </script>
        <div class="xs100 flex xs_jcCenter fondoBlanco pTop20 pBottom20 filtroControl mTop40">
            <?php
                if(isset($_GET['ordenControl1'])) {
                    $_SESSION['ordenControl1'] = $_GET['ordenControl1'];
                }

                if(isset($_GET['filtroCategoria'])) {
                    $_SESSION['filtroCategoria']=$_GET['filtroCategoria'];
                } 
            ?>
            <form action="index.php" method="get" id="formListado" class="xs70 flex xs_jcCenter xs_jcSpabet">
                <select name="filtroCategoria" class="xs25 ordenLista">
                    <option value="0" <?php if ((isset($_SESSION['filtroCategoria']))&&($_SESSION['filtroCategoria']==0)) echo "selected"?>>Todas las Categorías</option>
                    <?php
                        $sql2 = "select * from categorias";
                        $resul2 = $db->query($sql2);
                        while ($row2 = $resul2->fetch_assoc()) {
                            if ((isset($_SESSION['filtroCategoria']))&&($_SESSION['filtroCategoria']==$row2['id_categoria'])) {
                    ?>

                    <option value="<?php echo $row2['id_categoria']?>" selected><?php echo $row2['nombre']?></option>
                    
                    <?php
                        } else {
                    ?>

                    <option value="<?php echo $row2['id_categoria']?>"><?php echo $row2['nombre']?></option>

                    <?php
                            }
                        }
                    ?>
                </select>
                <select name="ordenControl1" class="xs25 ordenLista">
                    <option value="0" <?php if ((isset($_SESSION['ordenControl1']))&&($_SESSION['ordenControl1']==0)) {echo "selected";}?>>Por defecto</option>
                    <option value="1" <?php if ((isset($_SESSION['ordenControl1']))&&($_SESSION['ordenControl1']==1)) {echo "selected";}?>>Ordenar por más barato</option>
                    <option value="2" <?php if ((isset($_SESSION['ordenControl1']))&&($_SESSION['ordenControl1']==2)) {echo "selected";}?>>Ordenar por más caro</option>
                    <option value="3" <?php if ((isset($_SESSION['ordenControl1']))&&($_SESSION['ordenControl1']==3)) {echo "selected";}?>>Orden alfabético A-Z</option>
                    <option value="4" <?php if ((isset($_SESSION['ordenControl1']))&&($_SESSION['ordenControl1']==4)) {echo "selected";}?>>Orden alfabético Z-A</option>
                </select>
            </form>
            <span></span>
        </div>
        <div class="centrado flex xs_fCol xs_aiCenter fondoBlanco formControl mTop40 mBottom40">
            <h2 class="mBottom40">Listado de productos</h2>
            <div class="xs90 flex xs_fCol mBottom20">
                <?php
                    $sql1 = "select c.nombre as categoria,p.* from categorias c left join platos p 
                                on c.id_categoria=p.id_categoria";
                    $condicion = " where ";

                    if(isset($_SESSION['filtroCategoria'])) {
                        if ($_SESSION['filtroCategoria']==0) {
                            $sql1 = $sql1;
                        } else {
                            $sql1 = $sql1.$condicion."p.id_categoria=".$_SESSION['filtroCategoria'];
                            $condicion = " and ";
                        }
                    } 

                    if(isset($_SESSION['palabraControl'])) {
                        $sql1 = $sql1.$condicion." p.nombre like '%".$_SESSION['palabraControl']."%'";
                        $condicion = " and ";
                    }

                    if ($_SESSION['ordenControl1']==0) {
                        $sql1 = $sql1;
                    } elseif ($_SESSION['ordenControl1']==1) {
                        $sql1 = $sql1." order by precio asc";
                    } elseif ($_SESSION['ordenControl1']==2) {
                        $sql1 = $sql1." order by precio desc";
                    } elseif ($_SESSION['ordenControl1']==3) {
                        $sql1 = $sql1." order by nombre asc";
                    } elseif ($_SESSION['ordenControl1']==4) {
                        $sql1 = $sql1." order by nombre desc";
                    }               

                    $consultaTotal = $sql1;
                    $resulTotal = $db->query($consultaTotal);
                    $cuantos = $resulTotal->num_rows;
                    $sql1 = $sql1." limit ".$start.",".$numElementos;
                    $resul1 = $db->query($sql1);
                    $inicioMuestra = ($start+1);                  
                    $finMuestra = $start+$numElementos;             //Para hacer esto aprovechamos las variables creadas para la paginación.
                    if ($finMuestra>$cuantos) $finMuestra=$cuantos;
                ?>

                    <span class="resulMuestra mBottom20 txDerecha">Mostrando del <?php echo $inicioMuestra?> al <?php echo $finMuestra?> de <?php echo $cuantos?> resultados</span>

                <?php
                    if($resul1->num_rows==0){
                        echo "<h3 class='xs100 txCentrado mBottom40 mTop40'>No existen productos con los filtros asignados</h3>";
                    }
                    while ($row1 = $resul1->fetch_assoc()) {
                ?>

                    <div class="xs100 flex xs_jcSpabet xs_aiCenter mBottom20">
                        <div class="overhide xs10"><a href="../images/carta<?php echo $row1['foto']?>" style="display: block;"><img src="../images/carta<?php echo $row1['foto']?>" alt="imagenProducto" class="xs100" style="display: block;"></a></div>
                        <h3><?php echo $row1['nombre']?></h3>
                        <div class="m10 flex xs_jcSpabet xs_aiCenter linkEd_Borr">
                            <a href="edPlato.php?iplat=<?php echo $row1['id_plato']?>"><i class="fas fa-edit"></i></a>
                            <a href="delPlato.php?iplat=<?php echo $row1['id_plato']?>" class="delElemento"><i class="far fa-trash-alt"></i></a>
                        </div>
                    </div>

                <?php
                    }
                ?>
            </div>
            <div><a href="nPlato.php"  class="botonRojo">Añadir Producto</a></div>
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

