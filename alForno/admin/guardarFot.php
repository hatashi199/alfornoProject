<?php
    require "includes/common.php";
    $img = "";
    $txAlt = $_POST['alternativo'];

    if((isset($_FILES['imgGaleria'])) && ($_FILES['imgGaleria']['error'] === UPLOAD_ERR_OK)) {
        $dirTemp = $_FILES['imgGaleria']['tmp_name'];
        $nombFich = $_FILES['imgGaleria']['name'];
        $tamFich = $_FILES['imgGaleria']['size'];
        $tipoFich = $_FILES['imgGaleria']['type'];

        $nombFich_Comp = explode('.',$nombFich);
        $extFich = strtolower(end($nombFich_Comp));

        $nuevoNombFich = "/galeria/".time()."_".$nombFich;

        $extPermit = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc','pdf','svg','jpeg','webp');

        if (in_array($extFich,$extPermit)) {
            $dirSubida = "../images";
            $dirDest = $dirSubida.$nuevoNombFich;
            
            if (move_uploaded_file($dirTemp,$dirDest)) {
                $img = $nuevoNombFich;
            }
        } else {
            echo "Subida errónea. Tipos soportados: ".implode(",",$extPermit);
        }
    }

    $sql1 = "insert into galeria(foto,tx_alternativo) 
                values ('$img','$txAlt')";
    $db->query($sql1);
    header("Location: ./galeria.php");
?>