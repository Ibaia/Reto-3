<?php
if ($_SERVER['SERVER_NAME'] == "uno.fpz1920.com") {
    include_once ($_SERVER['DOCUMENT_ROOT']."/Model/connect_data_server.php");
}else {
    include_once ($_SERVER['DOCUMENT_ROOT']."/Model/connect_data.php");
}
include_once($_SERVER['DOCUMENT_ROOT']."/Model/reservaClass.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/Model/reservaLineaClass.php");

class reservaLineaModel extends reservaLineaClass{
	
	private $link;
	private $list = array();
	private $objectReserva;
	
	//Getters
	private function getList(){
		return $this->list;
	}
	public function getObjectReserva(){
	    return $this->objectReserva;
	}
 
	public function OpenConnect(){
    $konDat=new connect_data();
    try
    {
         $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
         // mysqli klaseko link objetua sortzen da dagokion konexio datuekin
         // se crea un nuevo objeto llamado link de la clase mysqli con los datos de conexión. 
    }
    catch(Exception $e)
    {
    echo $e->getMessage();
    }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta 
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
	}                   
 
 public function CloseConnect()
 {
     mysqli_close ($this->link);
 }
 
 public function setList()
 {
     /*
      * gets from the ddbb all the books in the table
      */
     $this->OpenConnect();  // konexioa zabaldu  - abrir conexion
     $sql = "CALL spAllReservedPcs()"; // SQL sententzia - sentencia SQL
     // $sql = "CALL spPcsByIdReserva()";
     $this->list = array(); // objetuaren list atributua array bezala deklaratzen da -
     //se declara como array el atributo list del objeto
     
     $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
     // se guarda en result toda la información solicitada a la bbdd
     
     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
         
         $new=new self();
         $new->setIdOrdenador($row['idOrdenador']);
         $new->setIdReserva($row['idReserva']);
         
         require_once ($_SERVER['DOCUMENT_ROOT']."/Model/reservaModel.php");
         $reserva = new reservaModel();
         $reserva->setIdReserva($row['idReserva']);
         $new->objectReserva=$reserva->findFechaReserva();
         
         array_push($this->list, $new);
     }
     mysqli_free_result($result);
     unset($reserva);
     $this->CloseConnect();
 }
 
 public function findOrdenadoresPorReserva()
 {
     $idReserva=$this->getIdReserva();
     $this->OpenConnect();
     $sql = "CALL spPcsByIdReserva($idReserva)";
     
     echo "ID_RESERVA "+ $idReserva;
     
     $result = $this->link->query($sql);
     if  ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
         
         $new=new self();
         $new->setIdOrdenador($row['idOrdenador']);
     }
     mysqli_free_result($result);
     $this->CloseConnect();
     
     return $new;
 } 
	//Cargar los datos
/*	public function setList(){
		
		$this->OpenConnect(); // Abrir la conexion
		
		$sql= "call spAllReservas()";
		
		$result = $this->link->query($sql); //Almacena los datos recibidos de la llamada a la base de datos
		
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			
			$reserva= new reservaClass();
			
			$reserva->setIdReserva($row['id']);
			$reserva->setFechaReserva($row['fechaReserva']);
			$reserva->setFechaUso($row['fechaUso']);
			$reserva->setNombreUsuario($row['nombreUsuario']);
			$reserva->setApellidoUsuario($row['apellidoUsuario']);
			$reserva->setNumTel($row['numTel']);
			$reserva->setDni($row['DNI']);
			$reserva->setPrecioTotal($row['precioTotal']);
					
			array_push($this->list, $reserva);
		}
		
		    mysqli_free_result($result);
		    unset($reserva);
        	$this->CloseConnect();  //Cerrar la conexion
	} */
	
	
	//Insert Reserva
	public function insert(){
        
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
        $idReserva=$this->getIdReserva();
        $idOrdenador=$this->getIdOrdenador();
        //echo "Antesd del insert";
        $sql="CALL spInsertLineasReserva( $idOrdenador, $idReserva)";
        //echo "Despues del insert";
        $status=$this->link->query($sql);
        
        if ($this->link->affected_rows  >=1){
            return "Insertado";
        } else {
            return "error";
        }
        
        $this->CloseConnect();
    }
    
	/*
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
    }*/
	
    function getListJsonStringReservas() {//if Class attributes PROTECTED
        
        // returns the list of objects in a srting with JSON format
        // Atributtes don't must be PUBLICs, they can be PRIVATE or PROTECTED
        $arr=array();
        
        foreach ($this->list as $objectReserva)
        {
            $vars = get_object_vars($objectReserva);
            
            array_push($arr, $vars);
        }
        return json_encode($arr);
    }
    
    function getListJsonString() {//if Class attributes PROTECTED
        
        // returns the list of objects in a srting with JSON format
        // Atributtes don't must be PUBLICs, they can be PRIVATE or PROTECTED
        
        // returns the list of objects in a srting with JSON format
        $arr=array();
        foreach ($this->list as $object)
        {
            $vars = $object->getObjectVars();
            
            $objectReserva=$object->objectReserva->getObjectVars();
            $vars['objectReserva']=$objectReserva;
            
            array_push($arr, $vars);
        }
        return json_encode($arr);
    }
}
?>