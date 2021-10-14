<?php
    require "includes/dbConnect.php";
    include "cabecera.php";
    $ipr = $_GET['ipr'];
    $resul1 = $db->query("select c.nombre as categoria,p.*,m.nombre as marca from categorias c left join productos p 
                on c.id_categoria=p.id_categoria left join marcas m on p.id_marca=m.id_marca
                where id_producto=$ipr");
    if ($row1 = $resul1->fetch_assoc()) {
?>

    <div class="xs100 flex xs_jcCenter">
        <div class="centrado flex xs_filaWrap xs_jcCenter pTop40 pBottom40">
            <div class="xs100 flex xs_fCol xs_aiCenter s_filaWrap s_jcSpabet descProducto">
                <h3 class="xs100 txCentrado mBottom20"><?php echo $row1['nombre']?></h3>
                <div class="xs70 s30 overhide iconServicio mBottom20">
                    <div class="xs100 overhide flex">
                        <img src="images/productosImg<?php echo $row1['imagen']?>" alt="productoImg" class="xs100">
                    </div>
                </div>
                <div class="xs100 s65 flex xs_fCol xs_aiStart mBottom20">
                    <span class="txMarca"><?php echo $row1['marca']?></span>
                    <span class="txCategoria"><?php echo $row1['categoria']?></span>
                    <p class="txDescripcion mTop20"><?php echo $row1['descripcion']?></p>
                    <span class="txPrecio mTop20 mBottom20"><?php echo $row1['precio']?> €</span>
                    <div class="linkNegro"><a href="listaProductos.php">Volver al listado</a></div>
                </div>
            </div>
            <div class="xs100 s40 m30 l25 flex xs_jcCenter xs_aiCenter fondoCian linkAzul"><a href="#">Añadir al carrito</a></div>
        </div>
    </div>

<?php
    }
    include "pie.php";
?>