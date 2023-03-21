<?php
include_once('dbcon.php');

$empleados = new dbEmpleados();

$puesto = $empleados->loadPuesto();

print_r(json_encode($puesto));

?>