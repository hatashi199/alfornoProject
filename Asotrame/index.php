<?php
    include "includes/dbConnect.php";
    include "includes/header.php";
?>

<!-- BANNER -->

<div class="xs100 flex xsjc bCenter posRel" id="banner1" style="background-attachment: fixed;">
    <div class="bBlack_trans flex xsjc">
        <div class="centrado flex xsfc xsac xsjc mfc mjfe mafs">
            <div class="flex xsfc xsac mafs txBanner">
                <h1 class="flex xsfc xsac mafs">
                    <span class="txPurple upper negrita">La carrera que nunca para:</span>
                    <span class="txPurple upper negrita">kms de vida.</span>
                </h1>
                <h4 class="txPurple upper negrita">I Carrera Online Solidaria</h4>
                <h6 class="txPurple upper cursiva">Del 11 al 27 de Septiembre de 2020</h6>
            </div>
        </div>
    </div>
</div>

<div class="xs100 flex xsjc bPurple_light2 contenido" id="donar">
    <div class="centrado flex xsjc">
        <h2 class="txWhite upper negrita">Dona médula, Dona Vida</h2>
    </div>
</div>


<!-- INSCRIBETE -->

<div class="xs100 flex xsjc xsac contenido" id="inscripcion">
    <div class="xs80 s60 m40 l30 xl15 flex"><a href="https://www.carreirasgalegas.com/carreira/a-carreira-que-nunca-para-km-vida-carreira-solidaria-online/ec0bd3a2-8137-ed59-4ce7-39f72341c3bd" target="_blank" class="xs100 upper purpleButton textoCentrado">Inscríbete</a></div>
</div>


<!-- QUIENES  SOMOS -->

<div class="xs100 flex xsjc contenido bWhite" id="quienesSomos">
    <div class="centrado flex xsfc xsac lfr lac lsb">
        <div class="xs50 s40 m30 l35 overhide mb40 imgQuienes">
            <img src="images/La_carrera_que_nunca_para.jpg" alt="grupo1" class="xs100">
        </div>
        <div class="xs100 l50 flex xsfc xsac lafs txQuienes">
            <h2 class="upper txPurple negrita mb20 textoCentrado">Quiénes Somos</h2>
            <p class="m80 textoCentrado txGrey mb20"><span class="upper negrita txPurple">Asotrame</span> (Asociación Gallega de Afectados por Transplantes Medulares), es una entidad sin ánimo de lucro, 
                declarada de utilidad pública, que nace en el año <span class="negrita txPurple">2013</span>, con el <span class="negrita txPurple">fundamental de mejorar la calidad de vida de las personas trasplantadas de médula ósea, 
                de aquellas que se encuentran inmersas en un proceso de un cáncer hematológico, de sus familiares, y, por ende, del conjunto de la sociedad.</p>
            <p class="m80 textoCentrado txGrey mb20">Para conseguir los objetivos recogidos en los estatutos, desde la entidad ponemois en marcha diferentes tipos de proyectos, servicios, y actividades, en función de los objetivos.</p>
            <p class="m80 textoCentrado txGrey mb20">Siempre bajo el mismo denominador común: <span class="negrita txPurple">mejorar la calidad de vida de pacientes y de sus familias</span>.</p>
        </div>

    </div>
</div>


<!-- CARRERA_ONLINE -->

<div class="xs100 flex xsjc bCenter contenido" id="carrera" style="background-attachment: fixed;">
    <div class="centrado flex xsjc xsac ljcs">
        <div class="xs90 s85 m50 l40 flex xsfc xsac lafs bPurple_trans bloqueCarrera">
            <h2 class="upper txWhite negrita mb20 textoCentrado">I Carrera Online Solidaria</h2>
            <p class="textoCentrado txWhite mb20">Debido a la situación actual en la que nos encontramos, optamos por organizar un evento con varias rutas en distintos ayuntamientos de Galicia. 
                Se trata de rutas libres de <span class="negrita">5 km</span>, que las personas de forma individual podrán realizar corriendo o caminando.</p>
            <p class="textoCentrado txWhite mb20">Las rutas se realizarán por diferentes ayuntamientos como <span class="negrita">Narón, Culleredo, Sigueiro, Nigrán, Baiona, Noia y Lugo</span>.</p>
            <p class="textoCentrado txWhite mb20">El donativo/inscripción será de <span class="negrita">3€</span> para la cada ruta.</p>
        </div>
    </div>
</div>


<!-- BENEFICIOS -->

<div class="xs100 flex xsjc contenido bWhite">
    <div class="centrado flex xsjc">
        <div class="xs100 flex xsfc xsac txBeneficios">
            <h2 class="upper negrita txPurple mb20 textoCentrado">Beneficios: ¿A Dónde van los fondos?</h2>
            <p class="m85 l80 xl70 textoCentrado txGrey">Todo lo recaudado en el evento <span class="upper negrita txPurple">"La carrera que nunca para: km de vida"</span> irá destinado a los proyectos <span class="upper txPurple negrita">como en casa</span>, 
                que se ocupa de proporcionar vivienda de estancia temporal para familiares de personas con diagnóstico oncohematológico ingresadas en el <span class="txPurple negrita upper">chuac</span> (Complejo Hospitalario Universitario A Coruña), 
                y al <span class="upper negrita txPurple">Servicio de Atención Psicosocial</span>, el cúal presta atención psicológica y social a personas con cáncer hematológico y familiares.</p>
        </div>
    </div>
</div>


<!-- RUTAS -->

<div class="xs100 flex xsjc contenido bCenter" id="rutas" style="background-attachment: fixed;">
    <div class="centrado flex xsfc xsac lafs">
        <h2 class="upper negrita txPurple textoCentrado mb20">Rutas:</h2>
        <div class="xs100 s75 l100 flex xsfc xsac mfr msb mafs">
            <?php
                $sql1 = "select * from rutas";
                $resul1 = $db->query($sql1);
                while ($row1 = $resul1->fetch_assoc()) {
            ?>

            <div class="xs75 m45 l23 flex xsfc xsac lafs bPurple_trans bloqueRuta">
                <h3 class="mb20"><span class="txWhite upper negrita">Ruta <?php echo $row1['nombre']?>:</span></h3>
                <p class="textoCentrado txWhite upper"><span class="upper negrita">Distancia:</span>       
                    <?php 
                        $distancia = $row1['distancia'];
                        $distanciaArray = explode(".",$distancia);
                        if ($distanciaArray[1]==0) {
                            $distancia = round(implode(".",$distanciaArray));
                            echo $distancia;
                        } else {
                            echo $distancia;
                        }
                    ?> km</p>
                <p class="textoCentrado txWhite"><span class="upper negrita">Fecha:</span> del 11 al 27  sept 2020</p>
                <p class="textoCentrado txWhite"><span class="upper negrita">Salida:</span> <span class="upper"><?php echo $row1['lugar_inicio']?>.</span></p>
                <p class="textoCentrado txWhite"><span class="upper negrita">Llegada:</span> <span class="upper"><?php echo $row1['lugar_fin']?>.</span></p>
                <div class="xs100 flex xsjc"><a href="javascript:cargarRuta(<?php echo $row1['id_ruta']?>)" class="xs100 textoCentrado whiteButton">Más Detalles</a></div>
            </div>

            <?php
                }
            ?>
        </div>
    </div>
</div>

<div class="popup_background" id="popup">
    <div class="popup_window">
        <a href='javascript:cerrarPopup()'><i class="fas fa-times"></i></a>
        <div class="xs100" id="popup_contenido">
        </div>
    </div>
</div>

<?php
    include "includes/footer.php";
?>