<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/Model/usuarioModel.php");

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