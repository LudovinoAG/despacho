<?php
include_once('dbcon.php');

$empleados = new dbEmpleados();

$razon = $_POST['razon'];

$solucion = $empleados->loadSoluciones($razon);

print_r(json_encode($solucion));

?>