<?php
include_once('dbcon.php');
$empleados = new dbEmpleados();

$fecha = $_POST['fechaRegistro'];

$Datos = $empleados->loadTipificacionGeneral($fecha);

print_r(json_encode($Datos));

?>