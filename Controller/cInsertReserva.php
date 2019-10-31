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
    
   /* $reservasLS='[{"ordenadores":1,"fecha":"2019-10-24"},{"ordenadores":2,"fecha":"3000-10-23"},{"ordenadores":3,"fecha":"2019-10-24"},{"ordenadores":4,"fecha":"2019-10-24"},{"ordenadores":5,"fecha":"2019-10-24"},{"ordenadores":6,"fecha":"2019-10-24"},{"ordenadores":7,"fecha":"2019-10-24"},{"ordenadores":8,"fecha":"2019-10-24"},{"ordenadores":9,"fecha":"2019-10-24"},{"ordenadores":10,"fecha":"2019-10-24"},{"ordenadores":11,"fecha":"2019-10-24"},{"ordenadores":12,"fecha":"2019-10-24"},{"ordenadores":13,"fecha":"2019-10-24"},{"ordenadores":14,"fecha":"2019-10-24"},{"ordenadores":15,"fecha":"2019-10-24"},{"ordenadores":16,"fecha":"2019-10-24"},{"ordenadores":17,"fecha":"2019-10-24"},{"ordenadores":18,"fecha":"2019-10-24"},{"ordenadores":19,"fecha":"2019-10-24"}
    ,{"ordenadores":20,"fecha":"2019-10-24"}]';*/
    //echo $reservasLS;
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
            $lineaReserva->setIdOrdenador($value['ordenadores']);
            
            $lineaReserva->insert();
        }

}


echo $resultado;
//header('Location: ../index.php');
?>