<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Model/reservaLineaModel.php");

$reservaLinea= new reservaLineaModel();
$reservaLinea->setList(); 

$listaReservaLineasJson=$reservaLinea->getListJsonString();

echo $listaReservaLineasJson;

unset ($reservaLinea);