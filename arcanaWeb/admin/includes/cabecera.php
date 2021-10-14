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
        <link rel="stylesheet" href="../styles/clarity-lightbox.min.css">
        <link rel="stylesheet" href="../styles/estructuraWeb.css">
        <link rel="stylesheet" href="../styles/controlStyles.css">
        <link rel="stylesheet" href="../styles/arcanaStyles.css">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/tinymce/tinymce.min.js"></script>
        <script src="../js/clarity-lightbox.min.js"></script>
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
        <header class="xs100 flex xs_fCol">
            <div class="xs100 flex xs_jcCenter fondoNegro pTop20 pBottom20">
                <div class="centrado flex xs_jcSpabet">
                    <ul class="xs30 flex xs_fCol xs_aiStart m_filaWrap m_jcSpabet m_aiCenter" id="controlMenu">
                        <li><a href="index.php" <?php if ($page_actual=="index.php") echo "class='controlActivo'"?>>Productos</a></li>
                        <li><a href="marcas.php" <?php if ($page_actual=="marcas.php") echo "class='controlActivo'"?>>Marcas</a></li>
                        <li><a href="categoria.php" <?php if ($page_actual=="categoria.php") echo "class='controlActivo'"?>>Categorias</a></li>
                    </ul>
                    <form action="<?php if ($page_actual=="index.php") {echo "index.php";}
                                    elseif ($page_actual=="marcas.php") {echo "marcas.php";}
                                    elseif ($page_actual=="categoria.php") {echo "categoria.php";}
                                ?>" method="get" class="flex" id="buscadorControl">
                        <input type="text" placeholder="Introduce el nombre" name="palabraControl">
                        <button type="submit" class="botonBuscar"></button>
                    </form>
                    <div class="logOut">
                        <a href="logout.php"><?php echo $_SESSION['usuario']?></a>
                    </div>
                </div>
            </div>
            <div class="xs100 barraCian"></div>
        </header>
    </body>
</html>