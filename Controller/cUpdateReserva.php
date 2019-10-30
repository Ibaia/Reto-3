<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/"."Reto3Bien/Model/reservaModel.php");
$reserva=new reservaModel();
$idReserva=filter_input(INPUT_GET,"idReserva");
if (isset($idReserva)){
    $reserva->setIdReserva($idReserva);
}
$fechaUso=filter_input(INPUT_GET,"fechaUso");
if (isset($fechaUso)){
    $reserva->setFechaUso($fechaUso);
}
$nombreUsuarioReserva= filter_input(INPUT_GET,"nombreUsuarioReserva");
if (isset($nombreUsuarioReserva)){
    $reserva->setNombreUsuario($nombreUsuarioReserva);
}
$apellidoUsuarioReserva=filter_input(INPUT_GET,"apellidoUsuarioReserva");
if (isset($apellidoUsuarioReserva)){
    $reserva->setApellidoUsuario($apellidoUsuarioReserva);
}
$numTelReserva=filter_input(INPUT_GET,"numTelReserva");
if (isset($numTelReserva)){
    $reserva->setNumTel($numTelReserva);
}
$dniReserva=filter_input(INPUT_GET,"dniReserva");
if (isset($dniReserva)){
    $reserva->setDni($dniReserva);
}
$precioReserva=filter_input(INPUT_GET, "precioReserva");
if (isset($precioReserva)){
    $reserva->setPrecioTotal($precioReserva);
}
//LLama al modelo para ejecutar el update
$resultado=$reserva->update();
echo $resultado;
//header('Location: ../index.php');
?>