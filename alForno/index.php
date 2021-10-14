<?php
    require "includes/cabecera.php";
?>

    <!-- BANNER -->

    <script>
        $(document).ready(function(){
            $(".carousel1").owlCarousel({
                items: 1,
                autoplay: true,
                loop: true
            });
        })
    </script>

    <div class="xs100 flex xs_fCol xs_aiCenter pBottom60" id="banner">
        <div class="xs100 flex xs_filaWrap owl-carousel owl-theme carousel1">
            <div class="xs100">
                <div id="banner_1" class="xs100 fondoImgCentrado"></div>
            </div>
            <div class="xs100">
                <div id="banner_2" class="xs100 fondoImgCentrado"></div>
            </div>
            <div class="xs100">
                <div id="banner_3" class="xs100 fondoImgCentrado"></div>
            </div>
        </div>
        <div class="centrado flex xs_fCol xs_aiCenter pTop40">
            <h2 class="mBottom20 txNegro">Restaurante al Forno</h2>
            <div class="xs100 flex xs_fCol xs_aiCenter m_filaWrap m_jcSpabet">
                <p class="m45 txGris txCentrado">Autenticidad y calidad son pilares esenciales de nuestra manera de entender la gastronomía. Recorremos cada rincón de la geografía de Italia en busca de los mejores ingredientes, sabores y texturas para trasladarlos a España, a cada restaurante italiano Al Forno. Viajamos a Italia para llevar a la mesa de cada restaurante italiano lo mejor; desde el queso Parmigiano Reggiano DOP, hasta la masa de nuestras deliciosas y crujientes pizzas. Cada año elaboramos nuestra carta con materias primas de primera calidad, para que puedas disfrutar con los tuyos de raciones generosas perfectas para compartir.</p>
                <p class="m45 txGris txCentrado">En cada restaurante italiano Al Forno puedes disfrutar de auténticas pizzas elaboradas en el tradicional forno italiano y de carpaccios acompañados de genuina mozzarella di bufala. Puedes también elegir distintas ensaladas, risottos y gratinados. Elige entre más de 400 combinaciones de pastas y salsas en cada restaurante italiano de La Tagliatella. No olvides pedir alguno de nuestros exquisitos postres; tiramisú casero, helados artesanales… Todo ello conforma una amplia oferta materializada en generosas raciones que te trasladarán a las regiones italianas de del Piamonte, Liguria y Emilia Romagna.</p>
            </div>
        </div>
    </div>


    <!-- PERSONAL -->

    <div class="xs100 flex xs_jcCenter pTop60 pBottom60">
        <div class="centrado flex xs_jcStart">
            <div class="xs100 flex xs_fCol xs_aiCenter s_filaWrap s_jcSpabet s_aiCenter m_filaWrap m_jcSpabet m_aiCenter" id="personal">
                <div class="xs50 s40 m20 flex xs_fCol xs_aiCenter mBottom40">
                    <div class="imgPersonal fondoImgCentrado mBottom20" style="background-image: url(images/personal/chef.jpg);"></div>
                    <h3 class="txNegro">paolo conte</h3>
                    <h5 class="txGris">chef</h5>
                    <div class="xs50 flex xs_jcSpabet iconosRRSS">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="xs50 s40 m20 flex xs_fCol xs_aiCenter mBottom40">
                    <div class="imgPersonal fondoImgCentrado mBottom20" style="background-image: url(images/personal/camarero1.jpg);"></div>
                    <h3 class="txNegro">andrea de luca</h3>
                    <h5 class="txGris">camarero</h5>
                    <div class="xs50 flex xs_jcSpabet iconosRRSS">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="xs50 s40 m20 flex xs_fCol xs_aiCenter mBottom40">
                    <div class="imgPersonal fondoImgCentrado mBottom20" style="background-image: url(images/personal/camarera2.jpg);"></div>
                    <h3 class="txNegro">bianca rossi</h3>
                    <h5 class="txGris">camarera</h5>
                    <div class="xs50 flex xs_jcSpabet iconosRRSS">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="xs50 s40 m20 flex xs_fCol xs_aiCenter mBottom40">
                    <div class="imgPersonal fondoImgCentrado mBottom20" style="background-image: url(images/personal/dueño.jpg);"></div>
                    <h3 class="txNegro">carlo mancini</h3>
                    <h5 class="txGris">dueño del local</h5>
                    <div class="xs50 flex xs_jcSpabet iconosRRSS">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- GALERIA_PRIN-->

    <script>
        $(document).ready(function(){
            $(".carousel2").owlCarousel({
                center: true,
                items: 3,
                loop: true,
                dots: false,
                nav: true
            });
        })
    </script>

    <div class="m100 flex m_jcCenter pTop60 pBottom60" id="galeria">
        <div class="centrado flex m_jcCenter posRel">
            <div class="m80 flex m_jcSpabet owl-carousel owl-theme carousel2">
                <div class="fondoImgCentrado imgGaleria" style="background-image: url(images/galeria/galeria1.jpg);"></div>
                <div class="fondoImgCentrado imgGaleria" style="background-image: url(images/galeria/galeria2.jpg);"></div>
                <div class="fondoImgCentrado imgGaleria" style="background-image: url(images/galeria/galeria3.jpg);"></div>
                <div class="fondoImgCentrado imgGaleria" style="background-image: url(images/galeria/galeria4.jpg);"></div>
                <div class="fondoImgCentrado imgGaleria" style="background-image: url(images/galeria/galeria5.jpg);"></div>
                <div class="fondoImgCentrado imgGaleria" style="background-image: url(images/galeria/galeria6.jpg);"></div>
                <div class="fondoImgCentrado imgGaleria" style="background-image: url(images/galeria/galeria7.jpg);"></div>
                <div class="fondoImgCentrado imgGaleria" style="background-image: url(images/galeria/galeria8.jpg);"></div>
                <div class="fondoImgCentrado imgGaleria" style="background-image: url(images/galeria/galeria9.jpg);"></div>
            </div>
        </div>
    </div>

<?php
    require "includes/pie.php";
?>