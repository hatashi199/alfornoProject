<?php
    require "../includes/dbConnect.php";
    
    function login($name,$pass) {
        global $db;
        $sql1 = "select * from usuarios where usuario='".$name."' and clave='".md5($pass)."'";
        $resul1 = $db->query($sql1);
        if ($row1 = $resul1->fetch_assoc()) {
            $_SESSION['idUsuario']=$row1['id_usuario'];
            $_SESSION['usuario']=$row1['usuario'];
            $_SESSION['nombre']=$row1['nombre'];
            $_SESSION['apellido1']=$row1['apellido1'];
            $_SESSION['apellido2']=$row1['apellido2'];
            return true;
        } else {
            return false;
        }
    }

    if(isset($_POST['nombreUsuario'])) {
        if(login($_POST['nombreUsuario'],$_POST['pass'])) {
            header ("Location: ./index.php");
            die();
        } else {
            $_SESSION['m']="<p>Usuario o Clave Incorrecta</p>";
            header("Location: ./login.php");
        }
    } 


?>