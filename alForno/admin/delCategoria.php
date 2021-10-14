<?php
    require "includes/common.php";
    $icat = $_GET['icat'];
    $sql1 = "delete from categorias where id_categoria=".$icat;
    $db->query($sql1);
    header ("Location: ./categorias.php");
?>