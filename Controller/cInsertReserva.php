<?php

$reserva=new reservaModel();

$reserva->setFechaUso($row['fechaUso']);
$reserva->setNombreUsuario($row['nombreUsuario']);
$reserva->setApellidoUsuario($row['apellidoUsuario']);
$reserva->setNumTel($row['numTel']);
$reserva->setDni($row['dni']);
$reserva->setPrecioTotal($row['precioTotal']);

$reserva->insert();

echo 
?>