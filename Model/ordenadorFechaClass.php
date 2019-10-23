<?php

class ordenadorFechaClass{
	
	protected $idOrdenadorFecha;
	protected $fechaUso;
	
	//GetterYSetter
	
	//ID
    public function getIdOrdenador()
    {
        return $this->idOrdenador;
    }
    
   	public function setIdOrdenador($idOrdenador)
    {
        $this->idOrdenador = $idOrdenador;
    }
    
    //Fecha de uso
    public function getFechaUso()
    {
        return $this->fechaUso;
    }
    
   	public function setIdOrdenador($fechaUso)
    {
        $this->fechaUso = $fechaUso;
    }
    
}