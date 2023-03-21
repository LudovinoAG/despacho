<?php
    include_once('dbcon.php');
    //CAPTURA DE VARIABLES
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $puesto = $_POST['idPuesto'];
    $observacion = $_POST['observacion'];
    //INSTANCIA DE LA CLASE
    $empleados = new dbEmpleados();
    //CONECTAR A LA DB
    $empleados->conectDB();
    if($empleados->STATUSDB=='DBOK'){
        //INSERTAR REGISTROS EMPLEADOS
        $empleados->insertSupervisor($nombre,$apellido,
        $puesto,$observacion);
        echo $empleados->MSG;
    }else{
        echo $empleados->STATUSDB;
    }
?>