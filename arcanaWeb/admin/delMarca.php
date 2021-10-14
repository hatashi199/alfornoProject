<?php
    require "includes/common.php";
    $imar = $_GET['imar'];
    $sql1 = "delete from marcas where id_marca=".$imar;
    $db->query($sql1);
    header ("Location: ./marcas.php");
?>