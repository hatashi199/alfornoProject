<?php
    require "includes/common.php";
    $mar = $_POST['marca'];
    $sql1 = "insert into marcas(nombre) values ('".$mar."')";
    $resul1 = $db->query($sql1);
    header("Location: ./marcas.php");
?>