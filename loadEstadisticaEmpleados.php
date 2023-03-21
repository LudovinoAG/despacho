<?php
include_once('dbcon.php');
$empleados = new dbEmpleados();

$id = $_POST['idEmpleado'];
$fecha = $_POST['fechaRegistro'];

$Datos = $empleados->loadTipificacionEmpleados($id, $fecha);

print_r(json_encode($Datos));

?>