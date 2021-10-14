<?php
    $page_actual=basename($_SERVER['SCRIPT_NAME']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/owl.carousel.min.css">
    <link rel="stylesheet" href="styles/owl.theme.default.min.css">
    <link rel="stylesheet" href="styles/sm-core-css.css">
    <link rel="stylesheet" href="styles/sm-blue/sm-blue.css">
    <link rel="stylesheet" href="styles/leaflet.css">
    <link rel="stylesheet" href="styles/magnific-popup.css">
    <link rel="stylesheet" href="styles/estructuraWeb.css">
    <link rel="stylesheet" href="styles/alFornoStyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">  
    <title>Al Forno</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.smartmenus.js"></script>
    <script src="js/jquery-scrolltofixed-min.js"></script>
    <script src="js/leaflet.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>

    <script>
        $(document).ready(function(){

            if($( window ).width()>768) {
                $("nav").scrollToFixed();
            } else {
                $("header").scrollToFixed();
            }
            $('#main-menu').smartmenus({
                subMenusSubOffsetX: 1,
                subMenusSubOffsetY: -8
            });

            $(".toggle a").click(function(){
                if ($("#menuPrincipal").css("display")=="none") {
                    $("#menuPrincipal").slideDown().css({display: "flex"});
                } else {
                    $("#menuPrincipal").slideUp();
                }
            })

            $( window ).resize(function() {
                if($( window ).width()>810){
                    $("#menuPrincipal").css({display: "flex"});
                } else {
                    $("#menuPrincipal").css({display: "none"});
                }
            });
        })
    </script>
</head>
<body>

    <!-- HEADER -->

    <div class="xs100 flex xs_filaWrap">
        <div class="barraVerde"></div>
        <div class="barraBlanca"></div>
        <div class="barraRoja"></div>
    </div>
    <header class="xs100 flex xs_fCol xs_aiCenter fondoRojo pTop20 pBottom20">
        <div class="centrado flex xs_filaWrap">
            <div class="flex xs_jcCenter" id="toogleMenu">
                <button class="toggle"><a href="#"><i class="fas fa-bars"></i></a></button>
            </div>
            <div class="xs100 flex xs_jcCenter m_filaWrap m_jcSpabet m_aiCenter">
                <div class="xs20 s15 overhide">
                    <a href="index.php">
                        <img src="images/restaurante_logo.png" alt="logoAlforno" class="xs100">
                    </a>
                </div>
                <div class="flex m_fCol m_aiEnd datosCabecera">
                    <span class="tel">986541284</span>
                    <span class="ubi">Galicia, España</span>
                    <span class="idioma">Idioma : Español</span>
                </div>
            </div>
        </div>
        <nav class="xs100 flex xs_jcCenter pTop20 pBottom20 fondoRojo" id="menuPrincipal">
            <ul class="centrado flex xs_fCol xs_aiStart m_filaWrap m_jcSpabet sm sm-blue" id="main-menu">
                <li class="flex m_jcCenter"><a href="index.php">quiénes somos</a></li>
                <li><a href="carta.php">carta</a></li>
                <li><a href="galeria.php">galería</a></li>
                <li><a href="contacto.php">contacto</a></li>
            </ul>
        </nav>
    </header>
 


