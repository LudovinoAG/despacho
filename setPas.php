<?php
include_once('dbcon.php');
session_start();
$empleados = new dbEmpleados();
$empleados->conectDB();

$tarjeta = $_SESSION['tarjeta'];
$currentPass = $_POST['clave'];
$newPass = $_POST['NewPass'];
$confirmPass = $_POST['ConfirmPass'];

$Datos = $empleados->changePass($tarjeta,$currentPass,$newPass,$confirmPass);

print_r($Datos);

?>