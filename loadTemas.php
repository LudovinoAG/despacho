<?php
include_once('dbcon.php');
$empleados = new dbEmpleados();
$Tema = $empleados->loadTemas($_POST['tarjeta']);
print_r($Tema);
?>