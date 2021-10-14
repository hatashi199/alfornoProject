<?php
    require "includes/common.php";
    $produc = $_POST['producto'];
    $descrip = $_POST['descripProducto'];
    $precio = $_POST['precio'];
    $valoracion = $_POST['valoracion'];
    $img = "";
    $cat = $_POST['selectCat'];
    $mar = $_POST['selectMar'];

    if((isset($_FILES['imgProducto'])) && ($_FILES['imgProducto']['error'] === UPLOAD_ERR_OK)) {
        $dirTemp = $_FILES['imgProducto']['tmp_name'];
        $nombFich = $_FILES['imgProducto']['name'];
        $tamFich = $_FILES['imgProducto']['size'];
        $tipoFich = $_FILES['imgProducto']['type'];

        $nombFich_Comp = explode('.',$nombFich);
        $extFich = strtolower(end($nombFich_Comp));

        $nuevoNombFich = time()."_".$nombFich;

        $extPermit = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc','pdf','svg','jpeg','webp');

        if (in_array($extFich,$extPermit)) {
            $dirSubida = "../images/productosImg";
            $dirDest = $dirSubida.$nuevoNombFich;
            
            if (move_uploaded_file($dirTemp,$dirDest)) {
                $img = $nuevoNombFich;
            }
        } else {
            echo "Subida errónea. Tipos soportados: ".implode(",",$extPermit);
        }
    }

    $sql1 = "insert into productos(nombre,descripcion,precio,valoracion,imagen,id_categoria,id_marca) 
                values ('$produc','$descrip','$precio','$valoracion','$img','$cat','$mar')";
    $db->query($sql1);
    header("Location: ./index.php");
?>