<?php
include_once('dbcon.php');
$empleados = new dbEmpleados();

$Pass = $empleados->RecordarPass($_POST['tarjeta']);

$Tarjeta = json_encode($Pass['INFO']['Tarjeta']);
$Nombre = json_encode($Pass['INFO']['Nombre']);
$Clave = json_encode($Pass['INFO']['Clave']);

print_r(json_encode($Pass['INFO']['Tarjeta']));

if($Tarjeta!="null"){
    $to = "Jeury_Gomez@claro.com.do, Yomary_Rosario@claro.com.do, Yanelys_Santana@claro.com.do, Ludovino_Guzman@claro.com.do";
    $subject = "DDST - Solicitud de contraseña";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    $message = "
    <html>
    <head>
    <title>Solicitud</title>
    </head>
    <body>
    <span>Solicitud de recuepración de contraseña de:<h3> $Tarjeta  $Nombre</h3></span>
    <p>La contraseña recuperada es: $Clave</p>
    </body>
    </html>";
    
    mail($to, $subject, $message, $headers); 
}


?>