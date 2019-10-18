<?php
class reservaClass{
	
	protected $idReserva;
	protected $idOrdenador;
	protected $idUsuario;
	protected $fechaReserva;
	protected $fechaUso;
	
	
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

    
    //ID Ordenador
    public function getIdOrdenador()
    {
        return $this->idOrdenador;
    }
    
   	public function setIdOrdenador($idOrdenador)
    {
        $this->idOrdenador = $idOrdenador;
    }
    
    
    //ID Usuario
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    
   	public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
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
    	
}	
?>