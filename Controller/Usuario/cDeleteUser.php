<?php

include_once ("../../Model/Usuario/usuarioModel.php");

$usuario=new usuarioModel();

$id=filter_input(INPUT_GET,"id");
echo($id);
if (isset($id))
{
    $usuario->setIdUsuario($id);
}

$resultado=$usuario->delete();
echo $resultado;

//header('Location: ../index.php');
?>