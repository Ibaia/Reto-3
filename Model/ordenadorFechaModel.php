<?php

include_once("connect_data.php");

class ordenadorFechaModel extends ordenadorFechaclass{
	
    private $link;
    private $list;
    protected $objectOrdenador=array();
    private $objectOrdenadorFecha; 
    
    
    public function OpenConnect(){
    	
    $konDat=new connect_data();
    
    try{
         $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
         // mysqli klaseko link objetua sortzen da dagokion konexio datuekin
         // se crea un nuevo objeto llamado link de la clase mysqli con los datos de conexión. 
    }
    catch(Exception $e){
    	
    echo $e->getMessage();
    }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta 
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }                   
 
    public function CloseConnect(){
         mysqli_close ($this->link);
    }
 
    //Encuentra y devuelve los datos de las editoriales
 	public function findIdOrdenadorFechaOrdenador($idOrdenadorFecha){
      /*
       * returns an object with all the information about a certain editorial
       */
        $this->OpenConnect();  
        $sql = "CALL spFindIdOrdenadorPorFecha($idOrdenadorFecha)";
               
        $result = $this->link->query($sql);    
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                
            $this->setIdOrdenador($row['idOrdenador']);
 
         
        }
       mysqli_free_result($result); 
       $this->CloseConnect();
     
       return $this;
    }   
    
    //Rellena los datos
    public function setList(){
        /*
         * fills a list with all the editorials in the database
         */
        $this->OpenConnect();  // konexioa zabaldu  - abrir conexión
        $sql = "CALL spAllOrdenadoresFecha()"; // SQL sententzia - sentencia SQL
        $this->list = array(); // objetuaren list atributua array bezala deklaratzen da - 
                    //se declara como array el atributo list del objeto
        
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
                    // se guarda en result toda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $new=new self();
            $this->setIdOrdenador($row['idOrdenador']);
         
            require_once ("ordenadorModel.php");
            /*
             * here we fill an array with all the books edited by the editorial,
             */
            $listaOrdenadoresFecha=new ordenadorModel(); 
           
            $new->objectLibros=$listaOrdenadoresFecha->findIdOrdenadorFechaOrdenador($row['idOrdenador']);
            
                                        // honek itzultzen digu editorial bateko liburu guztien zerrenda
                                        // elementu bakoitza "libro objetu bat da"
          
            array_push($this->list, $new);  
        }
       mysqli_free_result($result); 
       unset($listaOrdenadoresFecha);
       $this->CloseConnect();
    }

    public function getObjectOrdenadoresFecha() {
        return $this->objectOrdenador;
    }

    public function getList() {
        return $this->list;
    }
}