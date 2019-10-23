<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/"."Reto3/Model/reservaModel.php");

$reserva= new reservaModel();
$reserva->setList(); 

$listaReservasJson=$reserva->getListJsonString();

echo $listaReservasJson;

unset ($reserva);

?>