<?php

require "includes/common.php";
$imar = $_POST['imar'];
$mar = $_POST['marca'];
$sql1 = "update marcas set nombre='".$mar."' where id_marca=".$imar;  //Las cadenas de caracteres entre comillas siempre.
$db->query($sql1);
header("Location: ./marcas.php")
?>