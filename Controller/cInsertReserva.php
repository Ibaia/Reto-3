<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/"."Reto3Bien/Model/reservaModel.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/"."Reto3Bien/Model/reservaLineaModel.php");

$reserva=new reservaModel();

//Fecha
$fechaUso=filter_input(INPUT_GET,"fechaUso");
if (isset($fechaUso)){
    $reserva->setFechaUso($fechaUso);
}

//Nombre
$nombreUsuarioReserva= filter_input(INPUT_GET,"nombreUsuario");
if (isset($nombreUsuarioReserva)){
    $reserva->setNombreUsuario($nombreUsuarioReserva);
}

//Apellido
$apellidoUsuarioReserva=filter_input(INPUT_GET,"apellidoUsuario");
if (isset($apellidoUsuarioReserva)){
    $reserva->setApellidoUsuario($apellidoUsuarioReserva);
}

//Numtel
$numTelReserva=filter_input(INPUT_GET,"numTel");
if (isset($numTelReserva)){
    $reserva->setNumTel($numTelReserva);
}
//DNI
$dniReserva=filter_input(INPUT_GET,"dni");
if (isset($dniReserva)){
    $reserva->setDni($dniReserva);
}

//PrecioReserva
$precioReserva=filter_input(INPUT_GET, "precioTotal");
if (isset($precioReserva)){
    $reserva->setPrecioTotal($precioReserva);
}

//LLama al modelo para ejecutar el insert
$resultado=$reserva->insert();

//Local storage (ordenadores)
$reservasLS=filter_input(INPUT_GET, "reservasLS");
if (isset($reservasLS)){
    $reservaLineas=json_decode($reservasLS);
    
   //Insertar los ordenadores por reserva
   /*Hace falta un for para cada Ordenador ordenador se inserte con insertLineaReserva*/
    
    for ($i = 0; $i < count($reservaLineas); $i++) {
        $lineaReserva=new reservaLineaModel();
        
        $lineaReserva->setIdReserva($resultado);
        $lineaReserva->setIdOrdenador($reservaLineas[$i]->ordenadores);
        
        $lineaReserva->insert();
    }
}


echo $resultado;
//header('Location: ../index.php');
?>