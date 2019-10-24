<?php
class reservaClass{
	
	protected $idReserva;
	protected $fechaReserva;
	protected $fechaUso;
	protected $nombreUsuario;
	protected $apellidoUsuario;
	protected $numTel;
	protected $dni;
	protected $precioTotal;
	
	
	//Getters y setters
	
	//ID
    public function getIdReserva()
    {
        return $this->idReserva;
    } 
   	public function setIdReserva($idReserva)
    {
        $this->idReserva = $idReserva;
    }
  
    //Fecha Reserva
    public function getFechaReserva()
    {
        return $this->fechaReserva;
    }
   	public function setFechaReserva ($fechaReserva)
    {
        $this->fechaReserva = $fechaReserva;
    }
      
    //Fecha uso
    public function getFechaUso()
    {
        return $this->fechaUso;
    }
   	public function setFechaUso ($fechaUso)
    {
        $this->fechaUso = $fechaUso;
    }

    //NombreUsuario
    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }
   	public function setNombreUsuario ($nombreUsuario){
        $this->nombreUsuario = $nombreUsuario;
    }
    
    //ApellidoUsuario
    public function getApellidoUsuario(){
        return $this->apellidoUsuario;
    }
   	public function setApellidoUsuario ($apellidoUsuario){
        $this->apellidoUsuario = $apellidoUsuario;
    }
    
    //NumTel
    public function getNumTel(){
        return $this->numTel;
    }
   	public function setNumTel ($numTel){
        $this->numTel = $numTel;
    }
    
    //DNI
    public function getDni(){
        return $this->dni;
    }
   	public function setDni ($dni){
        $this->dni = $dni;
    }
    
    //PrecioTotal
    public function getPrecioTotal(){
        return $this->precioTotal;
    }
   	public function setPrecioTotal ($precioTotal){
        $this->precioTotal = $precioTotal;
    }
}	
?>