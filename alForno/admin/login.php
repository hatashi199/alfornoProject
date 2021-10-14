<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/estructuraWeb.css">
    <link rel="stylesheet" href="styles/controlStyles.css">
    <link rel="stylesheet" href="../styles/alFornoStyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">  
</head>
<body>
    <div class="fondoLogin fondoImgCentrado">
        <div class="posRel fondoNegro_Claro">
            <div class="xs90 m20 flex xs_fCol xs_aiCenter cajaInicio">
                <h1 class="mBottom20 txBlanco">Iniciar Sesión</h1>
                <form action="acceso_usuarios.php" method="post" class="xs100 flex xs_fCol xs_aiCenter">
                    <input type="text" name="nombreUsuario" placeholder="Nombre de Usuario" class="xs100 mBottom20">
                    <input type="password" name="pass" placeholder="Contraseña" class="xs100 mBottom20">
                    <input type="submit" value="Iniciar Sesión" class="botonBlanco"></input>
                </form>
            </div>
            <div class="errorMensaje">
                <?php
                    if (isset($_SESSION['m'])) {
                            echo ($_SESSION['m']);
                            unset($_SESSION['m']);
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>