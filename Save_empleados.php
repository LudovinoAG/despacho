<?php
    include_once('dbcon.php');
    //CAPTURA DE VARIABLES
    $tarjeta = $_POST['tarjeta'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $puesto = $_POST['idPuesto'];
    $supervisor = $_POST['idSupervisor'];
    $FechaNac = $_POST['fechaNacimiento'];
    $observacion = $_POST['observacion'];
    //INSTANCIA DE LA CLASE
    $empleados = new dbEmpleados();
    //CONECTAR A LA DB
    $empleados->conectDB();
    if($empleados->STATUSDB=='DBOK'){
        //INSERTAR REGISTROS EMPLEADOS
        $empleados->insertEmployer($tarjeta,$nombre,$apellido,
        $puesto, $supervisor,$FechaNac,$observacion);
        echo $empleados->MSG;
    }else{
        echo $empleados->STATUSDB;
    }
?>