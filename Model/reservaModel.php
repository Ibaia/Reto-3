<?php
if ($_SERVER['SERVER_NAME'] == "uno.fpz1920.com") {
    include_once ($_SERVER['DOCUMENT_ROOT']."/Reto3Bien/Model/connect_data_server.php");
}else {
    include_once ($_SERVER['DOCUMENT_ROOT']."/Reto3Bien/Model/connect_data.php");
}
include_once($_SERVER['DOCUMENT_ROOT']."/Reto3Bien/Model/reservaClass.php");

class reservaModel extends reservaClass{
	
	private $link;
	private $list = array();
	//protected $objectOrdenador;
	
	//Getters
	private function getList(){
		return $this->list;
	}
	/*
 	public function getObjectOrdenador(){
        return $this->objectOrdenador;
 	}*/
 
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
 
	//Cargar los datos
	public function setList(){
		
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
	}
	//Devuelve las fechas por id de reserva
	public function findFechaReserva()
	{
	    $idReserva=$this->idReserva;
	    $this->OpenConnect();
	    $sql = "CALL spFindFechaUsoByIdReserva($idReserva)";
	    
	    $result = $this->link->query($sql);
	    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	        
	        $new=new self();
	        $new->setFechaUso($row['fechaUso']);
	    }
	    mysqli_free_result($result);
	    $this->CloseConnect();
	    
	    return $new;
	} 
	
	//Insert Reserva
	public function insert(){
        
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
			$reservaFecha=$this->getFechaUso();
			$reservaNombre=$this->getNombreUsuario();
			$reservaApellido=$this->getApellidoUsuario();
			$reservaNumTel=$this->getNumTel();
			$reservaDni=$this->getDni();
			$reservaPrecio=$this->getPrecioTotal();
			
        
        $sql="CALL spInsertReserva('$reservaFecha','$reservaNombre','$reservaApellido','$reservaNumTel','$reservaDni', '$reservaPrecio')";
        echo $sql;
        $result=$this->link->query($sql);
       
        if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $lastId=$row['idReserva'];
        }
        
        if ($lastId>=1){
            return $lastId;
        } else {
            return 0;
        }
        
        $this->CloseConnect();
    }
	
	//Delete Usuarios
   	public function delete(){
        
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión

        $id=$this->getIdReserva();
        
        $sql="CALL spDeleteReserva($id)";
        
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
	public function update(){
        
        $this->OpenConnect();  // konexio zabaldu  - abrir conexi�n
        
        
        $idReserva=$this->getIdReserva();
		$fechaUso=$this->getFechaUso();
		$nombreUser=$this->getNombreUsuario();
		$apellidoUser=$this->getApellidoUsuario();
		$numTelReserva=$this->getNumTel();
		$dniReserva=$this->getDni();
		$precioTotalReserva=$this->getPrecioTotal();

        $sql="CALL spUpdateReserva('$idReserva','$fechaUso','$nombreUser','$apellidoUser','$numTelReserva','$dniReserva','$precioTotalReserva')";
        
        $numFilas=$this->link->query($sql);
        
        if ($numFilas>=1){
            return "Modificado";
        } else {
            return "Error al insertar";
        }

        $this->CloseConnect();
    }
	
    function getListJsonString() {//if Class attributes PROTECTED
        
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
}

?>