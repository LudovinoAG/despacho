<?php
include_once('dbcon.php');
$Llamadas = new dbLlamadas();
$Llamadas->conectDB();

$fechaStart = $_POST['fechaInicio'];
$fechaEnd = $_POST['fechaFin'];

$Datos = $Llamadas->viewReport($fechaStart, $fechaEnd);
$cantidad = $Llamadas->CountRegistros;
$n = 0;
echo  "<thead>
        <tr class='fila_find'><th colspan='7'>Registros encontrados: $cantidad</th></tr>
        <tr>
            <th>ID</th>
            <th>Empleado</th>
            <th>Osadia</th>
            <th>Cliente</th>
            <th>Solucion</th>
            <th>Canal</th>
            <th>Fecha</th>
        </tr>
      </thead><tbody>";
      while($n < $cantidad){
        echo "<tr>
            <td>".$Datos['Reporte'][$n]['ID']. "</td>
            <td>".$Datos['Reporte'][$n]['Empleado']. "</td>
            <td>".$Datos['Reporte'][$n]['Osadia']. "</td>
            <td>".$Datos['Reporte'][$n]['Cliente']. "</td>
            <td>".$Datos['Reporte'][$n]['Solucion']. "</td>
            <td>".$Datos['Reporte'][$n]['Canal']. "</td>
            <td>".$Datos['Reporte'][$n]['Fecha']. "</td>
        </tr>";
        $n++;
      }
        
      echo "</tbody>";
      

//print_r(json_encode($Datos));

?>