<?php $page_actual=basename($_SERVER['SCRIPT_NAME']); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/clarity-lightbox.min.css">
    <link rel="stylesheet" href="styles/sm-core-css.css">
    <link rel="stylesheet" href="styles/sm-blue/sm-blue.css">
    <link rel="stylesheet" href="styles/estructuraWeb.css">
    <link rel="stylesheet" href="styles/arcanaStyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet"> 
    <title>Arcana Template</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.smartmenus.js"></script>
    <script src="js/clarity-lightbox.min.js"></script>
</head>
<body>

    <!-- HEADER -->

    <script>
        $(function() {
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
        });
	</script>

    <header class="xs100 flex xs_fCol xs_aiCenter fondoNegro">
        <div class="centrado xs100 flex xs_jcSpabet l_fCol wrap posRel">
            <div class="flex xs_jcCenter" id="toogleMenu">
                <button class="toggle"><a href="#"><i class="fas fa-bars"></i></a></button>
            </div>
            <h1 class="txCentrado xs100"><span class="textoBlanco">Arcana</span> by <span class="upper">html5 up</span></h1>
        </div>
    </header>
    <div class="xs100 flex xs_fCol xs_aiCenter fondoNegro" id="menuPrincipal">
        <nav class="centrado flex fondoNegro">
            <ul class="xs100 flex xs_fCol m_filaWrap m_jcSpabet sm sm-blue" id="main-menu">
                <li class="posRel <?php if ($page_actual=="index.php") { echo "activo";}?>"><a href="index.php">Home</a></li>
                <li><a href="#">Dropdown</a>
                    <ul>
                        <li><a href="#">Lorem dolor</a></li>
                        <li><a href="#">Magna phasellus</a></li>
                        <li><a href="#">Etiam sed tempus</a></li>
                        <li><a href="#">Submenu</a>
                            <ul>
                                <li><a href="#">Lorem dolor</a></li>
                                <li><a href="#">Phasellus magna</a></li>
                                <li><a href="#">Magna phasellus</a></li>
                                <li><a href="#">Etiam nisl</a></li>
                                <li><a href="#">Veroeros feugiat</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Veroeros feugiat</a></li>
                    </ul>
                </li>
                <li class="poRel <?php if ($page_actual=="leftSidebar.php") { echo "activo";}?>"><a href="leftSidebar.php">Left Sidebar</a></li>
                <li class="posRel <?php if ($page_actual=="rightSidebar.php") { echo "activo";}?>"><a href="rightSidebar.php">Right Sidebar</a></li>
                <li><a href="#">Two Sidebar</a></li>
                <li class="posRel <?php if ($page_actual=="listaProductos.php") { echo "activo";}?>"><a href="listaProductos.php">Productos</a></li>
            </ul>
        </nav>
    </div>
    <div class="barraCian xs100"></div>