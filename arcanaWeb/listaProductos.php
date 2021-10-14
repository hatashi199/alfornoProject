<?php 
    require "includes/dbConnect.php";
    include "cabecera.php";
    session_start();

    if (isset($_GET['icat'])) {
        if ($_GET['icat']>0){
            $_SESSION['categoria'] = $_GET['icat'];
        }
    }

    if (isset($_POST['accion'])&&($_POST['accion']=="filtrar")){
        if (isset($_POST['imar'])) {
            $_SESSION['marca'] = $_POST['imar'];
        }else{
            $_SESSION['marca'] = array();
        }
    }


    if (isset($_GET['palabra'])) {
        $_SESSION['buscador'] = $_GET['palabra'];
    }

    if (isset($_GET['orden'])) {
        if ($_GET['orden']>0){
            $_SESSION['orden'] = $_GET['orden'];
        }
    }

    if (!isset($_SESSION['marca'])) {
        $_SESSION['marca'] = array();       //Para que me liste las marcas cuando las variables de sesion no estan definidas ni tienen contenido.
    }
 
?>
<div class="xs100 flex xs_jcCenter posRel">
    <div class="centrado flex xs_fCol xs_jcSpabet m_filaWrap m_m_jcSpabet m_aiStart">
        <div class="xs85 m20 flex xs_jcSpabet m_filaWrap m_aiStart pTop40 pBottom40" id="filtroProductos">
            <div class="xs100 flex xs_fCol xs_aiStart mBottom40">
                <h3 class="mBottom20">Buscar Productos</h3>
                <form action="listaProductos.php" method="get" class="flex">
                    <input type="text" name="palabra" placeholder="Busca el producto" id="iBuscar">
                    <button type="submit" class="botonBuscar"></button>
                </form>
            </div>

            <div class="xs100 flex xs_fCol xs_aiStart mBottom40 mTop40">
                <h3 class="mBottom20">Categorías</h3>
                <ul class="xs100 flex xs_fCol xs_aiStart">
                    <?php
                        $consul2 = "select * from categorias order by nombre";
                        $resul2 = $db->query($consul2);
                        while ($row2 = $resul2->fetch_assoc()) {
                    ?>
                    <li><a href="listaProductos.php?icat=<?php echo  $row2['id_categoria']?>"<?php if((isset($_SESSION['categoria']))&&($_SESSION['categoria']==$row2['id_categoria'])) {echo " class='filtroActivo'";}?>><?php echo  $row2['nombre']?></a></li>
                    <!-- <li><a href="listaProductos.php?icat=<?php // echo  $row2['id_categoria']?><?php // if(isset($_GET['orden'])) echo "&orden=".$_GET['orden']?><?php // if(isset($_GET['palabra'])) echo "&palabra=".$_GET['palabra']?>"><?php // echo  $row2['nombre']?></a></li> 
                            Asi seria sin variables de sesión porque necesita pasar los parametros -->     
                    <?php
                        }
                    ?>
                    <li><a href="listaProductos.php?icat=0">Todas</a></li>
                </ul>
            </div>

            <script>
                $(document).ready(function(){
                    var filtroMarca = $(".checkMarca");
                    filtroMarca.change(function(){
                        $("#formMarcas").submit();
                    })
                })
            </script>

            <div class="xs100 flex xs_fCol xs_aiStart">
                <h3 class="mBottom20">Marcas</h3>
                <form action="listaProductos.php" method="post" class="xs100 flex xs_fCol xs_aiStart" id="formMarcas">
                    <input type="hidden" name="accion" value="filtrar"><!-- Para que se pueda desmarcar los checkbox -->
                    <?php
                        $consul3 = "select * from marcas order by nombre";
                        $resul3 = $db->query($consul3);
                        while ($row3 = $resul3->fetch_assoc()) {
                    ?>
                    <div class="xs100 flex xs_aiCenter">
                        <input type="checkbox" name="imar[]" value="<?php echo $row3['id_marca']?>" class="checkMarca" id="checkMar" <?php if (in_array($row3['id_marca'],$_SESSION['marca'])) echo " checked";?>><label for="checkMar"><?php echo $row3['nombre']?></label>
                    </div>
                    <!-- <li><a href="listaProductos.php?imar=<?php // echo $row3['id_marca']?><?php // if(isset($_GET['icat'])) echo "&icat=".$_GET['icat']?><?php // if(isset($_GET['orden'])) echo "&orden=".$_GET['orden']?><?php // if(isset($_GET['palabra'])) echo "&palabra=".$_GET['palabra']?>"><?php // echo  $row3['nombre']?></a></li> 
                            Asi seria sin variables de sesión porque necesita pasar los parametros -->
                    <?php
                        }
                    ?>
                </form>
            </div>
        </div>

        <?php
            if(isset($_GET['pag'])) {
                $pag = $_GET['pag'];
            } else {
                $pag = 1;
            }

            $num_elementos = 9;        
            $start = ($pag-1)*$num_elementos;
        ?>

        <div class="xs100 m75 flex xs_jcCenter">
            <div class="xs85 m100 flex xs_fCol xs_aiCenter pTop40 pBottom40" id="secProductos">
                <h2 class="txCentrado mBottom40">Listado de Productos</h2>

                <script>
                    $(document).ready(function(){
                        var ordenProductos = $("#ordenLista");
                        ordenProductos.change(function(){
                            $("#formListado").submit();
                        })
                    })
                </script>
                <form action="listaProductos.php" method="get" id="formListado" class="xs100 flex xs_jcCenter mBottom20">

                    <!-- Los input:hidden se pintan si reciben los parametros, si queremos ordenar cuantos filtramos por categoria o marca -->
                    <!--?php
                    if (isset($_GET['icat'])){
                    ?>
                        <input type="hidden" name="icat" value="?php echo $_GET['icat'];?>">
                    ?php
                    }
                    if (isset($_POST['imar'])){                                                     //Solo vale si lo hacemos sin variables de sesión.
                    ?>
                        <input type='hidden' name='imar' value='?php echo $_POST['imar'];?>'>
                    ?php
                    }
                    ?>
                    ?php
                    if (isset($_GET['palabra'])){
                    ?>
                        <input type="hidden" name="palabra" value="?php echo $_GET['palabra'];?>">
                    ?php
                    }
                    ?>-->
                    <select name="orden" id="ordenLista" class="xs30">
                        <option value="0" selected>Por defecto</option>
                        <option value="1" <?php if((isset($_SESSION['orden']))&&($_SESSION['orden']==1)){echo "selected";}?>>Precio más alto</option>
                        <option value="2" <?php if((isset($_SESSION['orden']))&&($_SESSION['orden']==2)){echo "selected";}?>>Precio más bajo</option>
                    </select>
                </form>
                <div class="xs85 flex xs_filaWrap s_jcSpabet">
                    <?php
                         $consul1 = "select c.nombre as categoria,p.*,m.nombre as marca from categorias c left join productos p 
                                    on c.id_categoria=p.id_categoria left join marcas m 
                                    on p.id_marca=m.id_marca ";
                        $separador = " WHERE ";



                        if (isset($_SESSION['categoria'])) {
                            $icat = $_SESSION['categoria'];
                            $consul1 = $consul1 . $separador ." p.id_categoria=$icat";
                            $separador = " AND ";
                        }
                        
                        if (isset($_SESSION['marca'])) {
                            if (sizeof($_SESSION['marca'])>0){
                                $imar = $_SESSION['marca'];
                                $consul1 =$consul1 . $separador ." p.id_marca IN (".implode(",",$imar).")"; //El implode se pone porque al ser checkbox se convierte en un array.
                                $separador = " AND ";
                            }
                        } 


                        if (isset($_SESSION['buscador'])) {
                            $palabra = $_SESSION['buscador'];
                            if (!empty($palabra)) {
                                $consul1 =$consul1 . $separador ." p.nombre like '%$palabra%' ";
                                $separador = " AND ";
                            }     
                        } 
                        
                        
                        if (isset($_SESSION['orden'])) {
                            $orden = $_SESSION['orden'];
                            if ($orden == 1) {
                                $consul1 = $consul1 . " order by p.precio desc";
                            } elseif ($orden == 2) {
                                $consul1 = $consul1 . " order by p.precio asc";
                            } elseif ($orden == 0) {
                                $consul1 = $consul1 . " order by p.nombre ";
                            }
                        }



                        $consulta_total = $consul1;
                        $resultotal = $db->query($consulta_total);
                        $cuantos = $resultotal->num_rows;
                        

                        $consul1 = $consul1." limit $start,$num_elementos";
                        $resul1 = $db->query($consul1);

                        if($resul1->num_rows==0){
                            echo "<h3 class='xs100 txCentrado mBottom40 mTop40'>No existen productos con los filtros asignados</h3>";
                        }

                        while ($row1 = $resul1->fetch_assoc()) {
                    ?>

                        <div class="xs100 s45 m30 flex xs_fCol xs_aiCenter xs_jcSpabet mBottom40 cajaProducto">
                            <div class="iconServicio overhide mBottom20">
                                <a href="images/productosImg<?php echo $row1['imagen']?>" class="xs100 overhide flex xs_jcCenter xs_aiCenter lightbox">
                                    <img src="images/productosImg<?php echo $row1['imagen']?>" alt="imgProducto" class="xs100">
                                </a>
                            </div>
                            <a href="productoPage.php?ipr=<?php echo $row1['id_producto']?>"><h3 class="txCentrado mBottom20"><?php echo $row1['nombre']?></h3></a>
                            <span class="txGris"><?php echo $row1['categoria']?></span>
                            <span class="txPrecio mTop20 mBottom20"><?php echo $row1['precio']?> €</span>
                            <div class="xs100 l95 xl75 flex xs_jcCenter xs_aiCenter fondoCian linkAzul"><a href="carrito.php?iprod=<?php echo $row1['id_producto']?>">Añadir al carrito</a></div>
                        </div>

                    <?php
                        }
                    ?>

                    <div class="xs100 flex pTop20 pBottom20">
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
    </div>
    <?php if (!isset($_SESSION['carrito'])) {?>

    <div id="carritoCompra">
        <a href="carrito.php"><i class="fas fa-shopping-cart posRel">
            <span class="cantidadProd">0</span>
        </i></a>
    </div>

    <?php
    } else {
    ?>

    <div id="carritoCompra">
        <a href="carrito.php"><i class="fas fa-shopping-cart posRel">
            <span class="cantidadProd">
                <?php
                    $total = 0;
                    foreach($_SESSION['carrito'] as $lineaCarrito){
                        $total += $lineaCarrito['cantidad'];
                    }
                    echo $total;
                ?>
            </span>
        </i></a>
    </div>

    <?php
    }
    ?>
</div>

<?php
    include "pie.php";
?>