<?php
session_start();
if(isset($_SESSION['Nombre'])){

    echo $_SESSION["tarjeta"]." - ".$_SESSION["Nombre"]." [".$_SESSION["puesto"]."] - [<a href=Cerrar.php>Cerrar Sesión</a>]";
    
}else{
        header('location: login.php');
}
?>
