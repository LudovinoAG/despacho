<?php
    include_once('dbcon.php');
    //CAPTURA DE VARIABLES
    $empleado = $_POST['idEmpleado'];
    $razon = $_POST['idRazon'];
    $nombre = $_POST['nombreCliente'];
    $codigo = $_POST['codigoCliente'];
    $tel = $_POST['telefono'];
    $osadia = $_POST['osadia'];
    $canal = $_POST['companiaCanal'];
    $m6 = $_POST['m6'];
    $serial = $_POST['serial'];
    $towncode = $_POST['towmcode'];
    $pueblo = $_POST['idpueblo'];
    $solucion = $_POST['solucion'];
    $fechaRegistro = $_POST['fechaRegistro'];

    //INSTANCIA DE LA CLASE
    $Llamadas = new dbLlamadas();
    //CONECTAR A LA DB
    $Llamadas->conectDB();
    if($Llamadas->STATUSDB=='DBOK'){
        //INSERTAR REGISTROS DE LLAMADAS
        $Llamadas->insertLlamada($empleado,$tel,$nombre,$codigo,$canal,$osadia,
        $m6,$serial,$towncode,$pueblo,$razon,$solucion,$fechaRegistro);
        echo $Llamadas->MSG;
    }else{
        echo $Llamadas->STATUSDB;
    }
?>