<?php
    require "includes/common.php";
    $iprod = $_POST['iprod'];
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

    if ($img=="") {
        $sql1="update productos set nombre='$produc',descripcion='$descrip',precio='$precio',valoracion='$valoracion',id_categoria='$cat',id_marca='$mar'
                where id_producto='$iprod'";
    } else {
        $sql1="update productos set nombre='$produc',descripcion='$descrip',precio='$precio',valoracion='$valoracion',imagen='$img',id_categoria='$cat',id_marca='$mar'
        where id_producto='$iprod'";
    }

    $db->query($sql1);

    header("Location: ./index.php");
?>