<?php
include_once('dbcon.php');

if(isset($_POST['tarjeta'])){
	   
	   $usuario = $_POST["tarjeta"];
   	   $password = $_POST["clave"];

	if($usuario=="" && $password=="" ){
        echo "LOG0";
	}else{
		$empleados = new dbEmpleados();
		$empleados->conectDB();
		
		$sql = "Exec SP_ValidateUser '".$usuario."','".$password."'";
		$LastUpdate = date('Y-m-d h:i:s');
		$Update = "UPDATE Empleados SET ultimoAcceso='$LastUpdate' WHERE tarjeta='$usuario'";

		$stmt = sqlsrv_query($empleados->conection, $sql) or die ('No ejecutado');
		$resultUpdate = sqlsrv_query($empleados->conection, $Update) or die ('No ejecutado');
		
        $fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

		if($fila['idEmpleado']>0){
			session_start();
			$_SESSION["tarjeta"] = $fila['tarjeta'];
			$_SESSION["Nombre"] = $fila['Nombre'];
			$_SESSION["puesto"] = $fila['nombre'];
			$_SESSION["id"] = $fila['idEmpleado'];

			switch($_SESSION["puesto"])
			{
				case 'Supervisor':
                    echo 'LOG4';
				break;
					
				case 'Agente':
                    echo 'LOG3';
				break;

				case 'Administrador':
                    echo 'LOG5';
				break;

				case 'Lider':
                    echo 'LOG6';
				break;
			} 
		}else{
            echo 'LOG1';
		}
		
		sqlsrv_close($empleados->conection);
        }

}else{
    echo 'LOG2';
}


?>
