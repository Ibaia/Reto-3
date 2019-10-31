<?php
class reservaLineaClass{
	
	protected $idReserva;
	protected $idOrdenador;	
	
	//Getters y setters
	
	//ID RESERVA
    public function getIdReserva()
    {
        return $this->idReserva;
    } 
   	public function setIdReserva($idReserva)
    {
        $this->idReserva = $idReserva;
    }
  
    //ID ORDENADOR
    public function getIdOrdenador()
    {
        return $this->idOrdenador;
    }
    public function setIdOrdenador($idOrdenador)
    {
        $this->idOrdenador = $idOrdenador;
    }
    function getObjectVars()
    {
        $vars = get_object_vars($this);
        return  $vars;
    }
    
}	
?>