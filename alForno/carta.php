<?php
    require "includes/dbConnect.php";
    require "includes/cabecera.php";

    // Declaracion de las variables de sesion

    if (isset($_GET['categ'])) {
        if ($_GET['categ']>0) {
            $_SESSION['categoria'] = $_GET['categ'];
        } else {
            unset($_SESSION['categoria']);
        }
    }

    if (isset($_POST['palabra'])) {
        if($_POST['palabra']!=="") {
            $_SESSION['buscador'] = $_POST['palabra'];
        } else {
            unset($_SESSION['buscador']);
        }
    }

    if (isset($_GET['ordenPlatos'])) {
        $_SESSION['ordenPlatos'] = $_GET['ordenPlatos'];
    }

    //Paginacion

    if(isset($_GET['pag'])) {
        $pag = $_GET['pag'];
    } else {
        $pag = 1;
    }

    $num_elementos = 6;        
    $start = ($pag-1)*$num_elementos;

    //Consulta con filtros

    $sql2 = "select c.nombre as categoria, p.* from platos p left join categorias c on p.id_categoria=c.id_categoria";
    $condicion = " where ";

    if(isset($_SESSION['categoria'])) {
        $sql2 = $sql2.$condicion."p.id_categoria=".$_SESSION['categoria'];
        $condicion = " and ";
    }

    if(isset($_SESSION['buscador'])) {
        $sql2 = $sql2.$condicion."p.nombre like '%".$_SESSION['buscador']."%'";
        $condicion = " and ";
    }

    if (isset($_SESSION['ordenPlatos'])) {
        if ($_SESSION['ordenPlatos'] == 1) {
            $sql2 = $sql2." order by precio asc";
        }
        elseif ($_SESSION['ordenPlatos'] == 2) {
            $sql2 = $sql2." order by precio desc";
        }
        elseif ($_SESSION['ordenPlatos'] == 3) {
            $sql2 = $sql2." order by p.nombre asc";
        }
        elseif ($_SESSION['ordenPlatos'] == 4) {
            $sql2 = $sql2." order by p.nombre desc";
        }
        elseif ($_SESSION['ordenPlatos'] == 0) {
            $sql2 = $sql2." order by p.nombre";
        }
    }

    $sql_total = $sql2;
    $resulTotal = $db->query($sql_total);
    $cuantos = $resulTotal->num_rows;

    $inicioMuestra = ($start+1);
    $finMuestra = $start+$num_elementos;

    if ($finMuestra>$cuantos) $finMuestra =$cuantos;

    $sql2 = $sql2." limit ".$start.",".$num_elementos;
    $resul2 = $db->query($sql2);

    if ($resul2->num_rows==0) {
        echo "<h3 class='xs100 txCentrado mBottom40 mTop40'>No existen productos con los filtros asignados</h3>";
    }
?>

<div class="xs100 flex xs_jcCenter pTop60 pBottom60">
    <div class="centrado flex xs_fCol xs_jcSpabet m_filaWrap m_jcSpabet m_aiStart">
        <div class="xs100 m20 flex xs_filaWrap xs_jcCenter m_fCol m_aiStart filtrosCarta mBottom60">
            <div class="xs100 flex xs_filaWrap xs_jcCenter m_fCol m_aiStart">
                <h3 class="txNegro mBottom20">categorías</h3>
                <ul class="xs100 flex xs_filaWrap xs_jcSpabet m_fCol m_aiStart">
                    <?php
                        $sql1= "select * from categorias";
                        $resul1 = $db->query($sql1);
                        while ($row1 = $resul1->fetch_assoc()) {
                    ?>

                    <li><a href="carta.php?categ=<?php echo $row1['id_categoria']?>" <?php if((isset($_SESSION['categoria']))&&($_SESSION['categoria']==$row1['id_categoria'])) { echo "class='filtroActivo'";}?>><?php echo $row1['nombre']?></a></li>

                    <?php
                        }
                    ?>
                    <li><a href="carta.php?categ=0">todas las categorias</a></li>
                </ul>
            </div>
            <div class="xs100 flex xs_jcCenter">
                <form action="carta.php" method="post" class="xs100 flex xs_jcCenter m_jcStart">
                    <input type="text" name="palabra" placeholder="Nombre del plato">
                    <button type="submit" class="botonBuscar"></button>
                </form>
            </div>
        </div>



        <script>
            $(document).ready(function(){
                $(".filtroSelect").change(function(){
                    $("#filtroPlato").submit();
                })
            })
        </script>

        <div class="xs100 m70 flex xs_fCol xs_aiCenter" id="platos">
            <h2 class="txCentrado txNegro mBottom40">Carta Ristorante al Forno</h2>
            <div class="xs100 flex xs_fCol xs_aiCenter m_filaWrap m_jcSpabet mBottom40">
                <form action="carta.php" method="get" id="filtroPlato">
                    <select name="ordenPlatos" class="filtroSelect">
                        <option value="0" <?php if ((isset($_SESSION['ordenPlatos']))&&($_SESSION['ordenPlatos']==0)) echo "selected"?>>Por defecto</option>
                        <option value="1" <?php if ((isset($_SESSION['ordenPlatos']))&&($_SESSION['ordenPlatos']==1)) echo "selected"?>>Precio más barato</option>
                        <option value="2" <?php if ((isset($_SESSION['ordenPlatos']))&&($_SESSION['ordenPlatos']==2)) echo "selected"?>>Precio más caro</option>
                        <option value="3" <?php if ((isset($_SESSION['ordenPlatos']))&&($_SESSION['ordenPlatos']==3)) echo "selected"?>>Orden alfabético A-Z</option>
                        <option value="4" <?php if ((isset($_SESSION['ordenPlatos']))&&($_SESSION['ordenPlatos']==4)) echo "selected"?>>Orden alfabético Z-A</option>
                    </select>
                </form>
                <span class="muestraPlatos mTop20">Mostrando del <?php echo $inicioMuestra?> al <?php echo $finMuestra?> de <?php echo $cuantos?> platos</span>
            </div>

            <?php

            ?>

            <div class="xs100 flex xs_fCol m_filaWrap m_jcSpabet">
                <?php
                    while ($row2 = $resul2->fetch_assoc()) {
                ?>

                    <div class="xs100 m30 flex xs_fCol xs_aiCenter xs_jcSpabet mBottom60">
                        <div class="imgPlato" style="background-image:url(images/carta<?php echo $row2['foto']?>)"></div>
                        <h3 class="txNegro mTop20 mBottom20"><?php echo $row2['nombre']?></h3>
                        <span class="precio mBottom40"><?php echo $row2['precio']?> €</span>
                        <div><a href="platoPage.php?plat=<?php echo $row2['id_plato']?>" class="botonRojo">Ficha del plato</a></div>
                    </div>

                <?php
                    }
                ?>
            </div>
            <div class="xs100 flex xs_jcCenter pTop20 pBottom20">
                <?php
                    if ($pag>1) {
                ?>

                    <a href="?pag=<?php echo $pag-1?>" class="botonPag">&#171;</a>

                <?php
                    }
                    $totalPages = ceil($cuantos/$num_elementos);
    
                    for($i=1;$i<=$totalPages;$i++) {
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
                    if ($pag<$totalPages) {
                ?>
                    <a href="?pag=<?php echo $pag+1?>" class="botonPag">&#187;</a>
                <?php     
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
    require "includes/pie.php";
?>