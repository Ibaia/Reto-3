<?php
include_once($_SERVER['DOCUMENT_ROOT']."/"."Reto3/Model/reservaLineaModel.php");

$reservaLinea= new reservaLineaModel();
$reservaLinea->setList(); 

$listaReservaLineasJson=$reservaLinea->getListJsonString();

echo $listaReservaLineasJson;

unset ($reservaLinea);