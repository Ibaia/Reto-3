<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/model/Usuario/reservaModel.php");

$reserva= new reservaClass();
$reserva->setList(); 

$listaUsuariosJson=$usuario->getListJsonString();

echo $listaReservasJson;

unset ($reserva);

?>