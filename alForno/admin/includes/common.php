<?php
    session_start();

    date_default_timezone_set('UTC');
    error_reporting(E_ALL & ~E_NOTICE);

    require dirname(__FILE__).("/../../includes/dbConnect.php");

    if (!userValid()) {
        header("Location: ./login.php");
        die();
    }

    function userValid() {
        if (isset($_SESSION['usuWeb'])) {
            return true;
        } else {
            return false;
        }
    }

    function logout() {
        unset($_SESSION['usuario']);
    }

    function fechaSql($fecha){
        return (implode("-",array_reverse(explode("/",$fecha)))); 
    }

    function fechaWeb($fecha){
        if ($fecha=='0000-00-00') return "";
        if ($fecha=='') return "";
        return date_format(date_create($fecha), 'd/m/Y');
    }
?>