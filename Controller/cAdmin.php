<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/"."Reto3/Model/usuarioModel.php");

$usuario= new usuarioModel();
$usuario->setList(); 

$listaUsuariosJson=$usuario->getListJsonString();

echo $listaUsuariosJson;

unset ($usuario);

?>