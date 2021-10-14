<?php
    include "config.php";

    $db = new mysqli($server, $user, $password, $database);
    if ($db->connect_errno) {
        echo "Ha habido un problema de conexión con la base de datos: \n";
        echo "Código de error: ".$db->connect_errno."\n";
        echo "Error: ".$db->connect_error."\n";
    } else {
        $db->set_charset('utf8');
    }
?>