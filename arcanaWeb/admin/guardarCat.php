<?php
    require "includes/common.php";
    $cat = $_POST['categoria'];
    $sql1 = "insert into categorias(nombre) values ('".$cat."')";
    $resul1 = $db->query($sql1);
    header("Location: ./categoria.php");
?>