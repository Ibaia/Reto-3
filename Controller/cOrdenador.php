<?php
include_once($_SERVER['DOCUMENT_ROOT']."/"."Reto3/Model/ordenadorModel.php");

$ordenador= new ordenadorModel();
$ordenador->setList(); 

$listaOrdenadoresJson=$ordenador->getListJsonString();

echo $listaOrdenadoresJson;

unset ($ordenador);