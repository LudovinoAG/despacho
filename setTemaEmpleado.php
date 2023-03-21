<?php
include_once('dbcon.php');
session_start();
$empleados = new dbEmpleados();
$empleados->conectDB();

$tarjeta = $_SESSION['tarjeta'];
$tema = $_POST['tema'];

$Datos = $empleados->UpdateTema($tarjeta,$tema);

print_r($Datos);

?>