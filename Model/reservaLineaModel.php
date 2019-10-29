<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/Reto3Bien/Model/connect_data.php");
include_once("reservaClass.php");

class reservaLineaModel extends reservaLineaClass{
	
	private $link;
	private $list = array();
	protected $objectOrdenador;
	
	//Getters
	private function getList(){
		return $this->list;
	}
 	public function getObjectOrdenador(){
        return $this->objectOrdenador;
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
     $this->OpenConnect();  // konexioa zabaldu  - abrir conexión
     $sql = "CALL spAllPcs()"; // SQL sententzia - sentencia SQL
     $this->list = array(); // objetuaren list atributua array bezala deklaratzen da -
     //se declara como array el atributo list del objeto
     
     $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
     // se guarda en result toda la información solicitada a la bbdd
     
     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
         
         $new=new self();
         $new->setId($row['idOrdenador']);
         
         require_once ("reservaLineaModel.php");
         $datosReservaLinea = new reservaLineaModel();
         $new->objectReservaFecha=$datosReservaLinea->findIdOrdenador($row['idOrdenador']);
         // honek itzultzen digu editorialaren datua objetu baten.
         array_push($this->list, $new);
     }
     mysqli_free_result($result);
     unset($datosReservaLinea);
     $this->CloseConnect();
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
/*	public function insert(){
        
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
			$reservaFecha->setFechaUso($row['fechaUso']);
			$reservaNombre->setNombreUsuario($row['nombreUsuario']);
			$reservaApellido->setApellidoUsuario($row['apellidoUsuario']);
			$reservaNumTel->setNumTel($row['numTel']);
			$reservaDni->setDni($row['DNI']);
			$reservaPrecio->setPrecioTotal($row['precioTotal']);

        $sql="CALL spInsertUser('$reservaFecha','$reservaNombre','$reservaApellido','$reservaNumTel','$reservaDni',$reservaPrecio)";
        
        $numFilas=$this->link->query($sql);
        
        if ($numFilas>=1){
            return "insertado";
        } else {
            return "Error al insertar";
        }
        
        $this->CloseConnect();
    } */
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