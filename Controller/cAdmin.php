<?php

include_once ("../model/Usuario/usuarioModel.php");

$usuario= new usuarioModel();
$usuario->setList(); 

$listaUsuariosJson=$usuario->getListJsonString();

echo $listaUsuariosJson;

unset ($usuario);

?>