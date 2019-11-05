<?php
if ($_SERVER['SERVER_NAME'] == "uno.fpz1920.com") {
    include_once ($_SERVER['DOCUMENT_ROOT']."/Model/connect_data_server.php"); 
}else {
    include_once ($_SERVER['DOCUMENT_ROOT']."reto3Bien/Model/connect_data.php"); 
}


include_once ($_SERVER['DOCUMENT_ROOT']."/Model/ordenadorClass.php");

class ordenadorModel extends ordenadorClass {
	
    private $link;  // datu basera lotura - enlace a la bbdd
    private $list=array();  // datu basetik ekarritako datuak gordeko diren array-a 
    // protected $ordenadorFecha=array();
         
 public function getList() {
        return $this->list;
    }

 public function OpenConnect()
    {
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
     //mysqli_close ($this->link);
     $this->link->close();
 }
 
 public function setList()
 {
     $this->OpenConnect();
     
     $sql = "CALL spAllPcs()"; // SQL sententzia - sentencia SQL
     
     $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
     // se guarda en result toda la informacion solicitada a la bbdd
     
     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
         
         $nuevo=new ordenadorClass();
         $nuevo->setIdOrdenador($row['id']);
         
         array_push($this->list, $nuevo);
     }
     mysqli_free_result($result);
     $this->CloseConnect();
 }

 function getListJsonString() {//if Class attributes PROTECTED
     
     // returns the list of objects in a srting with JSON format
     // Atributtes don't must be PUBLICs, they can be PRIVATE or PROTECTED
     $arr=array();
     
     foreach ($this->list as $object)
     {
         $vars = get_object_vars($object);
         
         array_push($arr, $vars);
     }
     return json_encode($arr);
 }
}