<?php
include_once('dbcon.php');

$empleados = new dbEmpleados();

$super = $empleados->loadSuper();

print_r(json_encode($super));

?>