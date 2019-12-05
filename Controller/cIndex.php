<?php

include_once ("../Model/Reserva/reservaModel.php");

$reserva= new reservaClass();
$reserva->setList(); 

$listaReservasJson=$reserva->getListJsonString();

echo $listaReservasJson;

unset ($reserva);

?>