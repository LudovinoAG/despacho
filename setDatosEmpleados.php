<?php
include_once('dbcon.php');
session_start();
$empleados = new dbEmpleados();
$empleados->conectDB();

$tarjeta = $_SESSION['tarjeta'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

$Datos = $empleados->UpdateEmployer($tarjeta,$fechaNacimiento,$telefono,$email);

print_r($Datos);

?>