<?php
    require "includes/common.php";
    $iplat = $_GET['iplat'];
    $sql1 = "delete from platos where id_plato=".$iplat;
    $db->query($sql1);
    header("Location: ./index.php")
?>