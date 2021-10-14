<?php
    require "includes/common.php";
    $igal = $_GET['igal'];
    $sql1 = "delete from galeria where id_foto=".$igal;
    $db->query($sql1);
    header ("Location: ./galeria.php");
?>