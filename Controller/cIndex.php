<?php

include_once ("../model/Usuario/reservaModel.php");

$reserva= new reservaClass();
$reserva->setList(); 

$listaUsuariosJson=$usuario->getListJsonString();

echo $listaReservasJson;

unset ($reserva);

?>