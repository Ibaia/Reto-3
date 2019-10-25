<?php
include_once ("connect_data.php");  // klase honetan gordetzen dira datu basearen datuak. erabiltzailea...


class ordenadorModel extends ordenadorClass {
	
    private $link;  // datu basera lotura - enlace a la bbdd
    private $list;  // datu basetik ekarritako datuak gordeko diren array-a 
    // protected $ordenadorFecha=array();
      
    //ordenagailuFecha ko datuak gordeko dira hemen objetu bezala
    protected $objectOrdenadorFecha;
         
 public function getList() {
        return $this->list;
    }
    
 public function getObjectOrdenadorFecha() 
 {
        return $this->objectOrdenadorFecha;
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
            $new->setId($row['id']);
            
            require_once ("ordenadorFechaModel.php");
            $datosOrdenadorFecha=new ordenadorFechaModel(); 
            $new->objectOrdenadorFecha=$datosOrdenadorFecha->findIdFechaOrdenador($row['fechaUso']);
                                        // honek itzultzen digu editorialaren datua objetu baten.
            array_push($this->list, $new);  
        }
       mysqli_free_result($result); 
       unset($datoEditorial);
       $this->CloseConnect();
 }
 
 /*
 public function setListByAuthor($author){/*
  * gets from the ddbb all the books from a certain writer
  */
 /*
        $this->OpenConnect();  // konexioa zabaldu  - abrir conexión
                
        $sql = "CALL spBooksByAuthor('".$author."')"; // SQL sententzia - sentencia SQL
      
        $this->list = array(); // objetuaren list atributua array bezala deklaratzen da - 
                    //se declara como array el atributo list del objeto
        
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
                    // se guarda en result toda la información solicitada a la bbdd
        /*
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $new=new self();
            $new->setId($row['id']);
            $new->setTitulo($row['titulo']);
            $new->setAutor($row['autor']);
            $new->setNumPag($row['numPag']);
            $new->setIdEditorial($row['idEditorial']);
            
            require_once ("editorial_model.php");
            /*
             * here we create an object of type editorial so with each book
             * we know also all the information about the editorial 
             */
        /*
            $datoEditorial=new editorial_model(); 
            $new->objectEditorial=$datoEditorial->findIdEditorial($row['idEditorial']);
                                        // honek itzultzen digu editorialaren datua objetu baten.
            array_push($this->list, $new);  
        }
       mysqli_free_result($result); 
       unset($datoEditorial);
       $this->CloseConnect();
 }
 */
 /*
 public function insert()
 {
     
      * inserts a book in the database
     
      $this->OpenConnect();  // konexio zabaldu  - abrir conexión     
      $titulo="'". $this->getTitulo()."'";
      $autor= "'".$this->getAutor()."'";
      $numPag= $this->getNumPag();
      $idEditorial= $this->getIdEditorial();
      $sql = "CALL spInsertLibro($titulo, $autor, $numPag,$idEditorial)";
      //echo $sql;
      $this->link->query($sql);   
      $this->CloseConnect();
 }
  */
 /*
 public function update()
 {/*
  * update
  
      $this->OpenConnect();
      $titulo="'". $this->getTitulo()."'";
      $autor= "'".$this->getAutor()."'";
      $numPag= $this->getNumPag();
      $idEditorial= $this->getIdEditorial();
      $sql="CALL spUpdateBook(".$this->getId().",$titulo,$autor,$numPag,$idEditorial)";
      $this->link->query($sql);
      $this->CloseConnect();
      //var_dump($sql);
 }
 */

/*
 public function fillData(){
     
      * when updating a book first of all, we have to charge a form knowing
      * only the id, so we use this function to get all the information
      * of the selected book.
      
      $this->OpenConnect(); 
      $sql="CALL spLibrosById(".$this->getId().")";
  
      $result=$this->link->query($sql);
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
       {
        $this->setTitulo($row['titulo']);
        $this->setAutor($row['autor']);
        $this->setNumPag($row['numPag']);
        $this->setIdEditorial($row['idEditorial']);     
       }
      mysqli_free_result($result); 
      $this->CloseConnect();
 } */
}