<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/"."Reto3/model/Usuario/reservaModel.php");

$reserva= new reservaClass();
$reserva->setList(); 

$listaUsuariosJson=$usuario->getListJsonString();

echo $listaReservasJson;

unset ($reserva);

?>