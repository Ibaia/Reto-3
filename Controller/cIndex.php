<?php

include_once ("../model/Usuario/reservaoModel.php");

$reserva= new reservaClass();
$reserva->setList(); 

$listaUsuariosJson=$usuario->getListJsonString();

echo $listaReservasJson;

unset ($reserva);

?>