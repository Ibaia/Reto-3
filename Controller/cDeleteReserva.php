<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/Model/reservaModel.php");

$reserva=new reservaModel();

$idReserva=filter_input(INPUT_GET,"id");

echo($idReserva);
if (isset($idReserva))
{
    $reserva->setIdReserva($idReserva);
}

$resultado=$reserva->delete();

echo $resultado;

//header('Location: ../index.php');
?>