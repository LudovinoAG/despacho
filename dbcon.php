<?php

class dbEmpleados {

    public $data;
    public $server;
    public $conection;
    public $MSG;
    public $STATUSDB;
    public $tarjeta;
    public $nombre;
    public $apellido;
    public $puesto;
    public $supervisor;
    public $fechaNac;
    public $telefono;
    public $email;
    public $observacion;
    public $temas;

    public function conectDB(){

        $servidor = '989J4V1\SQLAGENTS';
        $database = 'saDespacho';
        $this->data = $database;
        $this->server = $servidor;

        $connectionInfo = array("Database"=>$this->data);
        $conn = sqlsrv_connect($this->server, $connectionInfo);

        if($conn) {
            $this->conection = $conn;
            $this->STATUSDB="DBOK";
        }else{
            $this->STATUSDB="DBERROR";;
        }
    }

    public function insertEmployer($id,$name,$lastname,$position,
    $super,$birthdate,$comment){

            $this->tarjeta = $id;
            $this->nombre = $name;
            $this->apellido = $lastname;
            $this->puesto = $position;
            $this->supervisor = $super;
            $this->fechaNac = $birthdate;
            $this->observacion = $comment;

            //LLAMADO A PROCEDIMIENTO ALMACENADO
             $PROC = "EXEC InsertarEmpleados '".$this->tarjeta."'," . "''," . 
            "'" .$this->nombre. "','" .$this->apellido. "','" .$this->puesto. "','" 
            .$this->supervisor. "','" .$this->fechaNac. "',".  "''," . "'',". "'" 
            .$this->observacion. "','" . "'"; 

            $consul = sqlsrv_query($this->conection, $PROC);
            if($consul==false){
                $this->MSG="QUERYERROR";  
            }else{
                $this->MSG="QUERYOK";
            }
        
            //LIBERAR Y CERRAR LA CONEXION
            //sqlsrv_free_stmt($consul);
            sqlsrv_close($this->conection);  
 
    }


    public function insertSupervisor($name,$lastname,$position,
    $comment){

            $this->nombre = $name;
            $this->apellido = $lastname;
            $this->puesto = $position;
            $this->observacion = $comment;

            //LLAMADO A PROCEDIMIENTO ALMACENADO
             $PROC = "EXEC SP_InsertarSupervisor '" .$this->nombre. "','" 
            .$this->apellido. "','" .$this->puesto. "','".$this->observacion. "'"; 
    
            $consul = sqlsrv_query($this->conection, $PROC);
            if($consul==false){
                $this->MSG="QUERYERROR";  
            }else{
                $this->MSG="QUERYOK";
            }
        
            //LIBERAR Y CERRAR LA CONEXION
            //sqlsrv_free_stmt($consul);
            sqlsrv_close($this->conection);  
 
    }


    public function UpdateEmployer($id,$birthdate,$tel,$mail){
            $this->fechaNac = $birthdate;
            $this->telefono = $tel;
            $this->email = $mail;

            //LLAMADO A PROCEDIMIENTO ALMACENADO
             $PROC = "EXEC SP_ActualizarDatos '".$this->fechaNac."','" .$this->telefono. "','"
                .$this->email. "','" .$id. "'";

            $consul = sqlsrv_query($this->conection, $PROC);
            if($consul==false){
                $this->MSG="QUERYERROR";  
            }else{
                $this->MSG="UPDATEOK";
            }
        
            //LIBERAR Y CERRAR LA CONEXION
            sqlsrv_free_stmt($consul);
            sqlsrv_close($this->conection);  

            return $this->MSG;

    }

    public function changePass($id,$CurrentPass, $NewPass, $ConfirmationPass){

        //LLAMADO A PROCEDIMIENTO ALMACENADO
         $PROC = "EXEC SP_CambioClave '".$id."','" .$CurrentPass. "','"
            .$NewPass. "','" .$ConfirmationPass. "'";

        $consul = sqlsrv_query($this->conection, $PROC);
        if($consul==false){
            $this->MSG="PASS_ERROR";  
        }else{
            $this->MSG="QUERYOK";
        }
    
        //LIBERAR Y CERRAR LA CONEXION
        ///sqlsrv_free_stmt($consul);
        sqlsrv_close($this->conection);  

        return $this->MSG;

    }

    public function UpdateTema($id,$tema){
        $this->tarjeta = $id;
        $this->temas = $tema;


        //LLAMADO A PROCEDIMIENTO ALMACENADO
         $PROC = "EXEC SP_AplicarTemas '".$this->tarjeta."','" .$this->temas. "'";

        $consul = sqlsrv_query($this->conection, $PROC);
        if($consul==false){
            $this->MSG="QUERYERROR";  
        }else{
            $this->MSG="TEMAOK";
        }
    
        //LIBERAR Y CERRAR LA CONEXION
        sqlsrv_free_stmt($consul);
        sqlsrv_close($this->conection);  

        return $this->MSG;

    }

    public function RecordarPass($id){
        $this->tarjeta = $id;

        //LLAMADO A PROCEDIMIENTO ALMACENADO
         $PROC = "EXEC SP_RecordarPass '".$this->tarjeta. "'";
         $this->conectDB();
 
         $consul = sqlsrv_query($this->conection, $PROC);
             if($consul==false){
                 $this->MSG="RECORDARERROR";  
             }else{
                 while( $row = sqlsrv_fetch_array($consul, SQLSRV_FETCH_ASSOC) ) {
                     $Razones['INFO']['Tarjeta'] = $row['tarjeta']; 
                     $Razones['INFO']['Nombre'] = $row['Nombre']; 
                     $Razones['INFO']['Clave'] = $row['clave']; 
                 }
 
                 return $Razones;
             }
 
             //LIBERAR Y CERRAR LA CONEXION
             sqlsrv_free_stmt($consul);
             sqlsrv_close($this->conection);   

    }

    public function loadSuper(){
 
        $PROC = 'SELECT * FROM vw_Supervisores';
        //$Supervisores = array();
        $this->conectDB();

        $consul = sqlsrv_query($this->conection, $PROC);
            if($consul==false){
                $this->MSG="QUERYERROR";  
            }else{
                while( $row = sqlsrv_fetch_array($consul, SQLSRV_FETCH_ASSOC) ) {
                    $Supervisores[] = $row['Nombre_Completo']; 
                   
                }
                

                return $Supervisores;
            }

            //LIBERAR Y CERRAR LA CONEXION
            sqlsrv_free_stmt($consul);
            sqlsrv_close($this->conection);   
    }

    public function loadPuesto(){
 
        $PROC = 'SELECT * FROM vw_Puestos';
        $this->conectDB();

        $consul = sqlsrv_query($this->conection, $PROC);
            if($consul==false){
                $this->MSG="QUERYERROR";  
            }else{
                while( $row = sqlsrv_fetch_array($consul, SQLSRV_FETCH_ASSOC) ) {
                    $Puestos[] = $row['nombre']; 
                   
                }

                return $Puestos;
            }

            //LIBERAR Y CERRAR LA CONEXION
            sqlsrv_free_stmt($consul);
            sqlsrv_close($this->conection);   
    }

    public function loadEmpleados(){
 
        $PROC = 'SELECT * FROM vw_Empleados';
        $this->conectDB();

        $consul = sqlsrv_query($this->conection, $PROC);
            if($consul==false){
                $this->MSG="QUERYERROR";  
            }else{
                
                    
                    echo "
                    <table class='table table-condensed table-dark'>
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Tarjeta</th>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Accion</th>
                            </tr>
                        </thead><tbody>";
                        
                    while( $row = sqlsrv_fetch_array($consul, SQLSRV_FETCH_ASSOC) ) {
                            echo "<tr>
                                <td>".$row['idEmpleado']."</td>
                                <td>".$row['tarjeta']."</td>
                                <td>".$row['Nombre']."</td>
                                <td>".$row['Puesto']."</td>
                                <td><button class='btn btn-info'></button></td>
                            </tr>";
                        }

                    echo "</tbody></table>";
                   
                
            }

            //LIBERAR Y CERRAR LA CONEXION
            sqlsrv_free_stmt($consul);
            sqlsrv_close($this->conection);   
    }

    public function loadRazones(){
 
        $PROC = 'SELECT * FROM vw_Razones';
        $this->conectDB();

        $consul = sqlsrv_query($this->conection, $PROC);
            if($consul==false){
                $this->MSG="QUERYERROR";  
            }else{
                while( $row = sqlsrv_fetch_array($consul, SQLSRV_FETCH_ASSOC) ) {
                    //$ID[] = 
                    //$Razones[] = 
                    //$NuevasRazones['id'][] = $row['idRazon'];
                    $Razones['RAZON']['NOMBRE'][] = $row['nombreRazon']; 
                    $Razones['RAZON']['ID'][] = $row['idSolucion']; 
                   
                }

                return $Razones;
            }

            //LIBERAR Y CERRAR LA CONEXION
            sqlsrv_free_stmt($consul);
            sqlsrv_close($this->conection);   
    }

    public function loadTemas($tarjeta){
        $PROC = "Exec SP_CargarTemas '".$tarjeta."'";
        $this->conectDB();
        
        $consul = sqlsrv_query($this->conection, $PROC);
            if($consul==false){
                $this->MSG="QUERYERROR";  
            }else{
                while( $row = sqlsrv_fetch_array($consul, SQLSRV_FETCH_ASSOC) ) {

                    $this->temas = $row['Tema']; 
                   
                }

                return $this->temas;
            }

            //LIBERAR Y CERRAR LA CONEXION
            sqlsrv_free_stmt($consul);
            sqlsrv_close($this->conection);   
    }

    public function loadSoluciones($razon){
 
        $PROC = "exec SP_Razones '" .$razon. "'";
        $this->conectDB();
        //echo $PROC;
        $consul = sqlsrv_query($this->conection, $PROC);
            if($consul==false){
                $this->MSG="QUERYERROR";  
            }else{
                while( $row = sqlsrv_fetch_array($consul, SQLSRV_FETCH_ASSOC) ) {
                    $Solucion[] = $row['nombreSolucion'];
                   
                }

                return $Solucion;
            }

            //LIBERAR Y CERRAR LA CONEXION
            //sqlsrv_free_stmt($consul);
            sqlsrv_close($this->conection);   
    }


    public function loadDatosEmpleados($tarjeta){
 
        $PROC = "Exec SP_VerDatosEmpleados '".$tarjeta. "'";
        $this->conectDB();

        $consul = sqlsrv_query($this->conection, $PROC);
            if($consul==false){
                $this->MSG="QUERYERROR";  
            }else{
                while( $row = sqlsrv_fetch_array($consul, SQLSRV_FETCH_ASSOC) ) {
                    $Empleados['Empleados']['FechaNacimiento'] = $row['fechaNacimiento']; 
                    $Empleados['Empleados']['Telefono'] = $row['telefono']; 
                    $Empleados['Empleados']['Email'] = $row['email']; 
                   
                }

                return $Empleados;
            }

            //LIBERAR Y CERRAR LA CONEXION
            sqlsrv_free_stmt($consul);
            sqlsrv_close($this->conection);   
    }

    public function loadTipificacionEmpleados($idEmpleado, $date){
 
        $PROC = "Exec SP_ObtenerTipificacion '".$idEmpleado. "','" .$date. "'";
        $this->conectDB();
        $totalRegistro = 0;
        $consul = sqlsrv_query($this->conection, $PROC);
        //Matrix de categorias de tipificacion
        $Tipificacion['Tipificacion']['Nombre']['Registradas'] = 0;

        $Tipificacion['Tipificacion']['Nombre']['Completadas'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Referidas'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Transferidas'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Informacion'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Citas'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Escalados'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['RutasON'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['RutasOFF'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Clericals'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Muda'] = 0;
        $Tipificacion['Tipificacion']['TotalRegistro'] = 0;

            if($consul==false){
                $this->MSG="QUERYERROR";
            }else{
                while($row = sqlsrv_fetch_array($consul, SQLSRV_FETCH_ASSOC)) {
                    if($row['Solucion']=="Orden Completada"){
                        $Tipificacion['Tipificacion']['Nombre']['Completadas'] = $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Referido"){
                        $Tipificacion['Tipificacion']['Nombre']['Referidas'] = $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Referencias" || $row['Solucion']=="Facilidades"){
                        $Tipificacion['Tipificacion']['Nombre']['Informacion'] += $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Supervisor" || $row['Solucion']=="Otro Departamento"){
                        $Tipificacion['Tipificacion']['Nombre']['Transferidas'] += $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Asignada" || $row['Solucion']=="Confirmada" ||
                    $row['Solucion']=="Cambiada" || $row['Solucion']=="No Contacto")
                    {
                        $Tipificacion['Tipificacion']['Nombre']['Citas'] += $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Supervisor PR"){
                        $Tipificacion['Tipificacion']['Nombre']['Escalados'] = $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Encender"){
                        $Tipificacion['Tipificacion']['Nombre']['RutasON'] = $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Apagar"){
                        $Tipificacion['Tipificacion']['Nombre']['RutasOFF'] = $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Confirmacion de Cita" || $row['Solucion']=="No Contacto"){
                        $Tipificacion['Tipificacion']['Nombre']['Clericals'] += $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Llamada Muda"){
                        $Tipificacion['Tipificacion']['Nombre']['Muda'] = $row['Cantidad'];
                    }
                    
                    $totalRegistro = $totalRegistro + $row['Cantidad'];
                    $Tipificacion['Tipificacion']['TotalRegistro'] = $totalRegistro;
                }

                
                return $Tipificacion;
            }

            //LIBERAR Y CERRAR LA CONEXION
            //sqlsrv_free_stmt($consul);
            sqlsrv_close($this->conection);   
    }

    public function loadTipificacionGeneral($date){
 
        $PROC = "Exec SP_ObtenerTipificacionGeneral '".$date. "'";
        $this->conectDB();
        $totalRegistro = 0;
        $consul = sqlsrv_query($this->conection, $PROC);
        //Matrix de categorias de tipificacion
        $Tipificacion['Tipificacion']['Nombre']['Registradas'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Completadas'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Referidas'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Transferidas'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Informacion'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Citas'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Escalados'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['RutasON'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['RutasOFF'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Clericals'] = 0;
        $Tipificacion['Tipificacion']['Nombre']['Muda'] = 0;
        $Tipificacion['Tipificacion']['TotalRegistro'] = 0;

            if($consul==false){
                $this->MSG="QUERYERROR";
            }else{
                while($row = sqlsrv_fetch_array($consul, SQLSRV_FETCH_ASSOC)) {
                    if($row['Solucion']=="Orden Completada"){
                        $Tipificacion['Tipificacion']['Nombre']['Completadas'] = $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Referido"){
                        $Tipificacion['Tipificacion']['Nombre']['Referidas'] = $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Referencias" || $row['Solucion']=="Facilidades"){
                        $Tipificacion['Tipificacion']['Nombre']['Informacion'] += $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Supervisor" || $row['Solucion']=="Otro Departamento"){
                        $Tipificacion['Tipificacion']['Nombre']['Transferidas'] += $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Asignada" || $row['Solucion']=="Confirmada" ||
                    $row['Solucion']=="Cambiada" || $row['Solucion']=="No Contacto")
                    {
                        $Tipificacion['Tipificacion']['Nombre']['Citas'] += $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Supervisor PR"){
                        $Tipificacion['Tipificacion']['Nombre']['Escalados'] = $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Encender"){
                        $Tipificacion['Tipificacion']['Nombre']['RutasON'] = $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Apagar"){
                        $Tipificacion['Tipificacion']['Nombre']['RutasOFF'] = $row['Cantidad'];
                    }
                    elseif($row['Solucion']=="Confirmacion de Cita" || $row['Solucion']=="No Contacto"){
                        $Tipificacion['Tipificacion']['Nombre']['Clericals'] += $row['Solucion'];
                    }
                    elseif($row['Solucion']=="Llamada Muda"){
                        $Tipificacion['Tipificacion']['Nombre']['Muda'] = $row['Cantidad'];
                    }
                    
                    $totalRegistro = $totalRegistro + $row['Cantidad'];
                    $Tipificacion['Tipificacion']['TotalRegistro'] = $totalRegistro;
                }

                
                return $Tipificacion;
            }

            //LIBERAR Y CERRAR LA CONEXION
            //sqlsrv_free_stmt($consul);
            sqlsrv_close($this->conection);   
    }
    
    
    
}

class dbLlamadas {
  
    public  $idEmpleado;
    public  $Telefono;
    public  $Nombre_Cliente;
    public  $Codigo_Cliente;
    public  $Canal;
    public  $Osadia;
    public  $m6;
    public  $Serial;
    public  $TownCode;
    public  $idPueblo;
    public  $idRazon;
    public  $Solucion;
    public  $Fecha_Registro;
    public $conection;
    public $STATUSDB;
    public $MSG;
    public $dateStart;
    public $dateEnd;
    public $CountRegistros = 0;

    public function conectDB(){

        $servidor = '989J4V1\SQLAGENTS';
        $database = 'saDespacho';
        $this->data = $database;
        $this->server = $servidor;

        $connectionInfo = array("Database"=>$this->data);
        $conn = sqlsrv_connect($this->server, $connectionInfo);

        if($conn) {
            $this->conection = $conn;
            $this->STATUSDB="DBOK";
        }else{
            $this->STATUSDB="DBERROR";;
        }
    }

    public function insertLlamada($idEmployer,$tel,$name,$code,
    $channel,$osadia,$m6,$serial,$towncode,$idcity,$idRazon,
    $solution,$datetop){

            $this->idEmpleado = $idEmployer;
            $this->Telefono = $tel;
            $this->Nombre_Cliente = $name;
            $this->Codigo_Cliente = $code;
            $this->Canal = $channel;
            $this->Osadia = $osadia;
            $this->m6 = $m6;
            $this->Serial = $serial;
            $this->TownCode = $towncode;
            $this->idPueblo = $idcity;
            $this->idRazon = $idRazon;
            $this->Solucion = $solution;
            $this->Fecha_Registro = $datetop;

            //LLAMADO A PROCEDIMIENTO ALMACENADO
             $PROC = "EXEC SP_InsertarRegistro '".$this->idEmpleado. "','" .$this->Telefono. "','"
                    .$this->Nombre_Cliente. "','" .$this->Codigo_Cliente. "','" .$this->Canal. "','"
                    .$this->Osadia. "','" .$this->m6. "','" .$this->Serial. "','" .$this->TownCode. "','"
                    .$this->idPueblo. "','" .$this->idRazon. "','" .$this->Solucion. "','" 
                    .$this->Fecha_Registro. "'";

            $consul = sqlsrv_query($this->conection, $PROC);
            if($consul==false){
                $this->MSG="QUERYERROR";
            }else{
                $this->MSG="QUERYOK";
            }
        
            //LIBERAR Y CERRAR LA CONEXION
            //sqlsrv_free_stmt($consul);
            sqlsrv_close($this->conection);  
 
    }

    public function viewReport($dateStart, $dateEnd){
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;

        //LLAMADO A PROCEDIMIENTO ALMACENADO
         $PROC = "EXEC SP_Reporte '".$this->dateStart. "','" .$this->dateEnd. "'";

        $consul = sqlsrv_query($this->conection, $PROC);
        if($consul==false){
            $this->MSG="REPORTERROR";
        }else{
            $Reporte = array();
            while( $row = sqlsrv_fetch_array($consul, SQLSRV_FETCH_ASSOC) ) {
                $Reporte['Reporte'][] = array(
                    "ID" => $row['ID'],
                    "Empleado" => $row['Empleado'],
                    "Osadia" => $row['Osadia'],
                    "Cliente" => $row['Cliente'],
                    "Razon" => $row['Razon'],
                    "Solucion" => $row['Solucion'],
                    "Canal" => $row['Canal'],
                    "Codigo" => $row['Codigo'],
                    "Fecha" => $row['Fecha']
                );
                
                $this->CountRegistros++;
            }
            
            return $Reporte;
        }
    
        //LIBERAR Y CERRAR LA CONEXION
        sqlsrv_free_stmt($consul);
        sqlsrv_close($this->conection);  
    }
}
?>