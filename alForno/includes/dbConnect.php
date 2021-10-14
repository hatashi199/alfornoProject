<?php
    session_start();
    //$db = new mysqli("db5000326276.hosting-data.io", "dbu598013", "Villa2016.", "dbs318337");
    //$db = new mysqli("db5000774174.hosting-data.io", "dbu647524", "Villa2016.", "dbs700466");
    $db = new mysqli("localhost", "root", "", "ristorantealforno");
    if ($db->connect_errno) {
        echo "Error al conectar con la base de datos";
        echo $db->connect_errno;
        echo $db->connect_error;
    } else {
        $db->set_charset("utf8");
    }
?>