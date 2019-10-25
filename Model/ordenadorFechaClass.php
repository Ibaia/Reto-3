<?php

class ordenadorFechaClass{
	
	protected $idOrdenadorFecha;
	protected $fechaUso;
	
	//GetterYSetter
	
	//ID
    public function getIdOrdenadorFecha()
    {
        return $this->idOrdenadorFecha;
    }
    
   	public function setIdOrdenadorFecha($idOrdenador)
    {
        $this->idOrdenadorFecha = $idOrdenadorFecha;
    }
    
    //Fecha de uso
    public function getFechaUso()
    {
        return $this->fechaUso;
    }
    
   	public function setFechaUso($fechaUso)
    {
        $this->fechaUso = $fechaUso;
    }
    
}