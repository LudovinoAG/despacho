<?php
include_once('dbcon.php');
session_start();
$empleados = new dbEmpleados();

$Datos = $empleados->loadDatosEmpleados($_SESSION['tarjeta']);

print_r(json_encode($Datos));

?>