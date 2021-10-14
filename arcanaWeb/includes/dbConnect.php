<?php
    //$db = new mysqli("db5000326276.hosting-data.io", "dbu598013", "Villa2016.", "dbs318335");
    $db = new mysqli ("localhost", "root", "", "ej1");
    if ($db->connect_errno) {
        echo "No se ha podido conectar a la base de datos".$db->connect_errno.$db->connect_error;
    } else {
        $db->set_charset("utf8");
    }    
?>