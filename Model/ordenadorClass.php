<?php
class ordenadorClass{
	
	protected $idOrdenador;
	
	
	//GetterYSetters
	//Id ordenador
	public function getIdOrdenador(){
		return $this->idOrdenador;
	}
	public function setId($idOrdenador){
		$this->idOrdenador = $idOrdenador;
	}
	
}

?>