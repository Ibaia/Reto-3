<?php
class usuarioClass{
	
	//Atributos
	protected $idUsuario;
	protected $nombre;
	protected $contrasenia;
	protected $nickName;
	protected $residecia;
	protected $email;
	
	//Getters y setters
	
	//ID
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    
   	public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    
    //Nombre
    public function getNombre()
    {
        return $this->nombre;
    }
    
   	public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    
    
    //Contraseņa
    public function getContrasenia()
    {
        return $this->contrasenia;
    }
    
   	public function setContrasenia ($contrasenia)
    {
        $this->contrasenia = $contrasenia;
    }
    
    
    //NickName
    public function getNickName()
    {
        return $this->nickName;
    }
    
   	public function setNickName ($nickName)
    {
        $this->nickName = $nickName;
    }
    
    
    //Residencia
    public function getResidencia()
    {
        return $this->residecia;
    }
    
   	public function setResidencia ($residencia)
    {
        $this->residecia = $residencia;
    }
    
    
    //Email
    public function getEmail()
    {
        return $this->email;
    }
    
   	public function setEmail ($email)
    {
        $this->email = $email;
    }

}