<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/"."Reto3Bien/Model/reservaModel.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/"."Reto3Bien/Model/reservaLineaModel.php");

$reserva=new reservaModel();

//Fecha
$fechaUso=filter_input(INPUT_GET,"fechaUso");
print $fechaUso;
if (isset($fechaUso)){
    $reserva->setFechaUso($fechaUso);
}

//Nombre
$nombreUsuarioReserva= filter_input(INPUT_GET,"nombreUsuario");
echo $nombreUsuarioReserva;
if (isset($nombreUsuarioReserva)){
    $reserva->setNombreUsuario($nombreUsuarioReserva);
}

//Apellido
$apellidoUsuarioReserva=filter_input(INPUT_GET,"apellidoUsuario");
echo $apellidoUsuarioReserva;
if (isset($apellidoUsuarioReserva)){
    $reserva->setApellidoUsuario($apellidoUsuarioReserva);
}

//Numtel
$numTelReserva=filter_input(INPUT_GET,"numTel");
echo $numTelReserva;
if (isset($numTelReserva)){
    $reserva->setNumTel($numTelReserva);
}
//DNI
$dniReserva=filter_input(INPUT_GET,"dni");
echo $dniReserva;
if (isset($dniReserva)){
    $reserva->setDni($dniReserva);
}

//PrecioReserva
$precioReserva=filter_input(INPUT_GET, "price");
echo $precioReserva;
if (isset($precioReserva)){
    $reserva->setPrecioTotal($precioReserva);
}


//LLama al modelo para ejecutar el insert
$resultado=$reserva->insert();
echo $resultado;



//Local storage (ordenadores)
$reservasLS=filter_input(INPUT_GET, "reservasLS");

if (isset($reservasLS)){
    echo $reservasLS;
    $reservaLineas=json_decode($reservasLS,true);
    
    /*foreach ($reservaLineas as $value) {
        $cadena = "El nombre de la provincia es: '". $value['ordenadores'] ."', y su puntuación es: ". $value['fecha'] ."},";
        print ($cadena);
    }*/
   
   //Insertar los ordenadores por reserva
   /*Hace falta un for para cada Ordenador ordenador se inserte con insertLineaReserva*/
    

    foreach ($reservaLineas as $value) {
            
           // echo ("AQUI "+ print_r($value));
            
            $lineaReserva=new reservaLineaModel();
            $lineaReserva->setIdReserva($resultado);
            $lineaReserva->setIdOrdenador($value);
            $lineaReserva->insert();
        }

}


echo $resultado;
//header('Location: ../index.php');
?>