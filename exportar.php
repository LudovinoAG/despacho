<?php 
header("Pragma: public");
header("Expires: 0");
$filename = "ReporteDSST.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

include_once('dbcon.php');
$Llamadas = new dbLlamadas();
$Llamadas->conectDB();

$fechaStart = $_GET['Inicio'];
$fechaEnd = $_GET['Fin'];

$Datos = $Llamadas->viewReport($fechaStart, $fechaEnd);
$cantidad = $Llamadas->CountRegistros;
$count = 1;
$n = 0;
?>
<table>
<thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Empleado</th>
            <th>Osadia</th>
            <th>Cliente</th>
            <th>Solucion</th>
            <th>Canal</th>
            <th>Fecha</th>
        </tr>
</thead>
<tbody>
    <?php
while($n < $cantidad){
        echo "<tr>
            <td>".$count. "</td>
            <td>".$Datos['Reporte'][$n]['ID']. "</td>
            <td>".$Datos['Reporte'][$n]['Empleado']. "</td>
            <td>".$Datos['Reporte'][$n]['Osadia']. "</td>
            <td>".$Datos['Reporte'][$n]['Cliente']. "</td>
            <td>".$Datos['Reporte'][$n]['Solucion']. "</td>
            <td>".$Datos['Reporte'][$n]['Canal']. "</td>
            <td>".$Datos['Reporte'][$n]['Fecha']. "</td>
        </tr>";
        $n++;
        $count++;
      
    }?>
</tbody>
</table>
