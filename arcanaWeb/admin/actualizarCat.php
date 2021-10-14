<?php

require "includes/common.php";
$icat = $_POST['icat'];
$cat = $_POST['categoria'];
$sql1 = "update categorias set nombre='".$cat."' where id_categoria=".$icat;  //Las cadenas de caracteres entre comillas siempre.
$db->query($sql1);
header("Location: ./categoria.php")
?>