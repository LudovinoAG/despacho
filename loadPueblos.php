<?php
include_once('dbcon.php');

$empleados = new dbEmpleados();

$pueblos = $empleados->loadPueblos();

print_r(json_encode($pueblos));

?>