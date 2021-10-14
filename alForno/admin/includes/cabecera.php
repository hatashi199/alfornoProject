<?php
    $page_actual=basename($_SERVER['SCRIPT_NAME']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel de Control</title>
        <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="../styles/reset.css">
        <link rel="stylesheet" href="../styles/estructuraWeb.css">
        <link rel="stylesheet" href="styles/controlStyles.css">
        <link rel="stylesheet" href="../styles/alFornoStyles.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">  
        <script src="../js/jquery.min.js"></script>
        <script src="../js/tinymce/tinymce.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".delElemento").click(function(){
                    confirm("Está seguro de que desae eliminar este elemento?");
                    return;
                });
            })
        </script>
    </head>
    <body>

    <?php
        if (isset($_GET['palabraControl'])) {
            $_SESSION['palabraControl']=$_GET['palabraControl'];
            if  ($_SESSION['palabraControl']=="") {
                unset($_SESSION['palabraControl']);
            }
        }
        

    ?>
        <header class="xs100 flex xs_fCol" id="cabeceraCtrl">
            <div class="xs100 flex xs_jcCenter fondoRojo pTop20 pBottom20">
                <div class="centrado flex xs_jcSpabet xs_aiCenter">
                    <ul class="xs30 flex xs_fCol xs_aiStart m_filaWrap m_jcSpabet m_aiCenter" id="controlMenu">
                        <li><a href="index.php" <?php if ($page_actual=="index.php") echo "class='controlActivo'"?>>Carta</a></li>
                        <li><a href="categorias.php" <?php if ($page_actual=="categorias.php") echo "class='controlActivo'"?>>Categorías</a></li>
                        <li><a href="galeria.php" <?php if ($page_actual=="galeria.php") echo "class='controlActivo'"?>>Galería</a></li>
                    </ul>
                    <form action="<?php if ($page_actual=="index.php") {echo "index.php";}
                                    elseif ($page_actual=="marcas.php") {echo "categorias.php";}
                                    elseif ($page_actual=="categoria.php") {echo "galeria.php";}
                                ?>" method="get" class="flex xs_aiCenter" id="buscadorControl">
                        <input type="text" placeholder="Introduce el nombre" name="palabraControl">
                        <button type="submit" class="botonBuscar"></button>
                    </form>
                    <div class="logOut flex xs_aiCenter">
                        <a href="logout.php"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido1']." ".$_SESSION['apellido2']?></a>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>