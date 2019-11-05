<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/Model/reservaModel.php");

$reserva= new reservaModel();
$reserva->setList(); 

$listaReservasJson=$reserva->getListJsonString();

echo $listaReservasJson;

unset ($reserva);

?>