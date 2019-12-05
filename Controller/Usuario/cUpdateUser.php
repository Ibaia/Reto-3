<?php

include_once ("../../Model/Usuario/usuarioModel.php");

$usuario=new usuarioModel();

$id=filter_input(INPUT_GET,"id");
if (isset($id))
{
    $usuario->setIdUsuario($id);
}

$nombre=filter_input(INPUT_GET,"nombre");
if (isset($nombre))
{
    $usuario->setNombre($nombre);
}
$contrasenia= filter_input(INPUT_GET,"contrasenia");
if (isset($contrasenia))
{
    $usuario->setContrasenia($contrasenia);
}
$nickName=filter_input(INPUT_GET,"nickName");
if (isset($nickName))
{
    $usuario->setNickName($nickName);
}
$residencia=filter_input(INPUT_GET,"residencia");
if (isset($residencia))
{
    $usuario->setResidencia($residencia);
}

$email=filter_input(INPUT_GET,"email");
if (isset($email))
{
    $usuario->setEmail($email);
}

$resultado=$usuario->Update();

echo $resultado;

//header('Location: ../index.php');
?>