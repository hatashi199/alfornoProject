<?php
    require "includes/dbConnect.php";
    require "includes/cabecera.php";

    $iplat = $_GET['plat'];
    $sql1 = "select c.nombre as categoria, p.* from platos p left join categorias c on p.id_categoria=c.id_categoria
                where id_plato=".$iplat;
    $resul1 = $db->query($sql1);
    if ($row1 = $resul1->fetch_assoc()) {
?>

    <div class="xs100 flex xs_jcCenter pTop60 pBottom60" id="fichaPlato">
        <div class="centrado flex xs_fCol xs_aiCenter m_filaWrap m_jcSpabet m_aiStart">
            <div class="imgPlato" style="background-image: url('images/carta<?php echo $row1['foto']?>')";"></div>
            <div class="xs100 m60 l70 flex xs_fCol xs_aiCenter m_aiStart">
                <h3 class="txNegro mTop40"><?php echo $row1['nombre']?></h3>
                <h5 class="txGris mBottom20"><?php echo $row1['categoria']?></h5>
                <p class="txNegro mBottom20"><?php echo $row1['descripcion']?></p>
                <span class="precio mBottom40"><?php echo $row1['precio']?> €</span>
                <div><a href="carta.php" class="botonRojo">Volver a la Carta</a></div>
            </div>
        </div>
    </div>

<?php
    }
    require "includes/pie.php";
?>