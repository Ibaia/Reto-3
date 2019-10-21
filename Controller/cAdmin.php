<?php

include_once ("../Model/Usuario/usuarioModel.php");

$usuario= new usuarioModel();
$usuario->setList(); 

$listaUsuariosJson=$usuario->getListJsonString();

echo $listaUsuariosJson;

unset ($usuario);

?>