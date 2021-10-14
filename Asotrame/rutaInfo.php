<?php
    include "includes/dbConnect.php";
    $irut = intval($_GET['irut']);
    $sql1 = "select * from rutas where id_ruta = ".$irut;
    $resul1 = $db->query($sql1);
    if ($row1 = $resul1->fetch_assoc()) {
?>

    <div class="xs100 flex xsjc contenido">
        <div class="centrado flex xsfc xsac mfr msb">
            <div class="xs100 overhide">
                <div class="xs100 flex xssb xsac mb20">
                    <h2 class="upper negrita txPurple"><?php echo $row1['nombre']?></h2>
                    <span class="infoRuta_Texto txGrey"><span class="txPurple">Distancia: </span>
                    <?php 
                        $distancia = $row1['distancia'];
                        $distanciaArray = explode(".",$distancia);
                        if ($distanciaArray[1]==0) {
                            $distancia = round(implode(".",$distanciaArray));
                            echo $distancia;
                        } else {
                            echo $distancia;
                        }
                    ?> km</span>
                </div>
                <div class="xs100 flex xssb xsac mb20" style='text-transform:capitalize;'>
                    <span class="infoRuta_Texto txGrey"><span class="txPurple">Salida: </span><?php echo $row1['lugar_inicio']?></span>
                    <span class="infoRuta_Texto txGrey"><span class="txPurple">Llegada: </span><?php echo $row1['lugar_fin']?></span>
                </div>
                <div class="xs100 mb40">
                    <?php echo $row1['iframe']?>
                </div>
                <div class="xs100 flex xsfr xssa xsac mb20" id="linkMaps">
                    <div class="xs90 m30 textoCentrado mb20">
                        <a href="<?php echo $row1['link_strava']?>" target="_blank" class="purpleButton">Ver en Strava</a>
                    </div>
                    <div class="xs90 m30 textoCentrado">
                        <a href="<?php echo $row1['link_googleMaps']?>" target="_blank" class="purpleButton">Ver en Google Maps</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    }
?>