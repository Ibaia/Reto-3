<?php
include_once ("../Model/Reserva/reservaModel.php");
$reserva= new reservaModel();
$reserva->setList();
$listaReservasJson=$reserva->getListJsonString();
echo $listaReservasJson;
unset ($reserva);
?>
