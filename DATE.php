<?php
$diaSemana = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
$Meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 
'Septiembre', 'Octubre', 'Nobiembre', 'Diciembre'];

$diaSem = date('N');
$mes = date('n');
$dia = date('j');
$año = date('Y');

echo $diaSemana[$diaSem-1]. " " .$dia. " de " .$Meses[$mes-1]. " del " .$año; 
?>