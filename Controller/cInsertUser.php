<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/Model/usuarioModel.php");;


$usuario=new usuarioModel();

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

$resultado=$usuario->insert();

echo $resultado;   // pasar a AJAX el resultado

/*
$password = document.getElementById("password").value;
$confirm_password = document.getElementById("confirm_password").value;


if(password != confirm_password) {
    alert("Las contraseñas no coinciden");
    
    return false;
} else {
    
    alert("bien");
    return true;
}
*/


//header('Location: ../index.php');
?>