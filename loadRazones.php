<?php
include_once('dbcon.php');

$empleados = new dbEmpleados();

$razon = $empleados->loadRazones();

print_r(json_encode($razon));

?>