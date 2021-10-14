<?php
    $page_actual=basename($_SERVER['SCRIPT_NAME']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asotrame</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon_logo.ico">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/hamburgers.css">
    <link rel="stylesheet" href="styles/estructura.css">
    <link rel="stylesheet" href="styles/asotrameStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/jquery-scrolltofixed-min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
</head>
<body>

    <!-- HEADER -->

    <script>
        $(document).ready(function(){
            $("header").scrollToFixed();
            $(".toggle").click(function(){
                if ($("#mainMenu").css("display")=="none") {
                    $("#mainMenu").slideDown().css({display: "flex"});
                    $(".toggle").addClass("is-active");
                } else {
                    $("#mainMenu").slideUp();
                    $(".toggle").removeClass("is-active");
                }
            })
            
            $("#botonContacto").click(enviarContacto);

            $( window ).resize(function() {
                if($( window ).width()>1024){
                    $("#mainMenu").css({display: "flex"});
                } else {
                    $("#mainMenu").css({display: "none"});
                }
            });

            $('#mainMenu').onePageNav({
                currentClass: "menuActive"            
                });
                $.scrollUp({
                    scrollName: 'flechaSubir',        // Element ID
                    scrollDistance: 100,              // Distance from top/bottom before showing element (px)
                    scrollFrom: 'top',                // 'top' or 'bottom'
                    scrollSpeed: 500,                 // Speed back to top (ms)
                    easingType: 'linear',             // Scroll to top easing (see http://easings.net/)
                    animation: 'fade',                // Fade, slide, none
                    animationSpeed: 800,              // Animation speed (ms)
                    scrollTrigger: false,             // Set a custom triggering element. Can be an HTML string or jQuery object
                    scrollTarget: false,              // Set a custom target element for scrolling to. Can be element or number
                    scrollText: false,                // Text for element, can contain HTML
                    scrollTitle: false,               // Set a custom <a> title if required.
                    scrollImg: false,                 // Set true to use image
                    activeOverlay: true,              // Set CSS color to display scrollUp active point, e.g '#00FFFF'
                    zIndex: 2147483647                // Z-Index for the overlay
                });

        });
        
        function abrirPopup(){
            $("#popup").css("display","flex");
        }
        function cerrarPopup(){
            $("#popup").css("display","none");
        }
        
        function cargarRuta(idRuta){
            $("#popup_contenido").load("rutaInfo.php?irut="+idRuta,function(){
                abrirPopup();
            });
        }

        $("#popup_background").click(function(){
            console.log("click");
            cerrarPopup();
        });
        
        function enviarContacto(){
            var data = new FormData($("#formularioContacto").get(0));

            $.ajax({
                url: "envia_datos.php",
                type: "POST",
                data: data,
                dataType: "html",
                processData: false,
                contentType: false,
                success: function(html) {
                    $("#resultadoContacto").html(html);
                }
            });
        }
    </script>

    <header class="xs100 flex xsjc bWhite">
        <div class="centrado flex xsfr xsac lsb">
            <div class="flex xsjc" id="toogleMenu">
                <div class="toggle hamburguer hamburger--stand" type="button">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </div>
            <div class="xs80 m90 l15 flex xsjc xsac">
                <div class="xs35 s25 m20 l100 overhide">
                    <a href="index.php">
                        <img src="images/logo.png" alt="logoAsotrame" class="xs100">
                    </a>
                </div>
            </div>
            <nav class="xs100 l70 xl60 flex xsjc" id="mainMenu">
                <ul class="xs100 flex xsfc xsafs lfr lsb lac">
                    <li class="upper"><a href="index.php" <?php if ($page_actual=="index.php") echo "class='menuActive'"?>>Inicio</a></li>
                    <li class="upper"><a href="#inscripcion">Inscripción</a></li>
                    <li class="upper"><a href="#quienesSomos">Quienes Somos</a></li>
                    <li class="upper"><a href="#rutas">Rutas</a></li>
                    <li class="upper"><a href="#contacto">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>
