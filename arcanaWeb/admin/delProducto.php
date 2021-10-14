<?php
    require "includes/common.php";
    $iprod = $_GET['iprod'];
    $sql1 = "delete from productos where id_producto=".$iprod;
    $db->query($sql1);
    header("Location: ./index.php")
?>