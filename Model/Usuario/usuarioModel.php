<?php
include_once ("connect_data.php");
include_once("usuarioClass.php");

class usuarioModel extends usuarioClass{
	
	private $link;
	private $list= array();
	
	
	private function getList(){
		return $this->list;
	}
	
	//Cargar los datos
	public function setList(){
		
		$this->OpenConnect(); // Abrir la conexion
		
		$sql= "call spAllUsers()";
		
		$result = $this->link->query($sql); //Almacena los datos recibidos de la llamada a la base de datos
		
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			
			$user= new usuarioClass();
			
			$user->setIdUsuario($row['idUsuario']);
			$user->setNombre($row['nombre']);
			$user->setContrasenia($row['contrasenia']);
			$user->setNickName($row['nickName']);
			$user->setResidencia($row['residencia']);
			$user->setEmail($row['email']);
			$user->setNumTel($row['numTel']);
			
			 array_push($this->list, $nuevo);
		}
		        mysqli_free_result($result);
        	$this->CloseConnect();  //Cerrar la conexion
	}
	
	//Insert Usuarios
	public function insert(){
        
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
        $nombreInsert=$this->getTituloPelicula();
		$contraseniaInsert=$this->getContrasenia();
		$nickNameInsert=$this->getNickName();
		$residenciaInsert=$this->getResidencia();
		$emailInsert=$this->getEmail();
		$numTelInsert=$this->getNumTel();

        $sql="CALL spInsertUser('$nombreInsert','$contraseniaInsert','$nickNameInsert','$residenciaInsert','$emailInsert',$numTelInsert)";
        
        $numFilas=$this->link->query($sql);
        
        if ($numFilas>=1){
            return "insertado";
        } else {
            return "Error al insertar";
        }
        
        $this->CloseConnect();
    }
	
	//Delete Usuarios
   	public function delete(){
        
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión

        $id=$this->getIdUsuario();
        
        $sql="CALL spDeleteUser($id)";
        
        $numFilas=$this->link->query($sql); 
        
        if ($numFilas>=1)
        {
            echo "borrado";
        } else {
            echo "Error al borrar";
        }
        $this->CloseConnect();
        
    }
    
	//Update Usuarios
	public function Update(){
        
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
        
        $nombreUpdate=$this->getNombre();
		$contraseniaUpdate=$this->getContrasenia();
		$nickNameUpdate=$this->getNickName();
		$residenciaUpdate=$this->getResidencia();
		$emailUpdate=$this->getEmail();
		$numTelUpdate=$this->getNumTel();

        $sql="CALL spUpdateUser('$nombreUpdate','$contraseniaUpdate','$nickNameUpdate','$residenciaUpdate','$emailUpdate',$numTelUpdate)";
        
        $numFilas=$this->link->query($sql);
        
        if ($numFilas>=1){
            return "insertado";
        } else {
            return "Error al insertar";
        }
        
        $this->CloseConnect();
    }
}