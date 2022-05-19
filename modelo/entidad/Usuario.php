<?php
class Usuario{
    public $id;
    public $Nombre;
    public $Apellido;
    public $Email;
    public $Usuario;
    public $Password;
    public $Administrador;
	/**
	 */
	public function __construct($id,$Nombre,$Apellido,$Email,$Usuario,$Password,$Administrador) {
        $this->id=$id;
        $this->Nombre=$Nombre;
        $this->Apellido=$Apellido;
        $this->Email=$Email;
        $this->Usuario=$Usuario;
        $this->Password=$Password;
        $this->Administrador=$Administrador;
	}
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->Nombre;
    }
    public function getApellido(){
        return $this->Apellido;
    }
    public function getEmail(){
        return $this->Email;
    }
    public function getUsuario(){
        return $this->Usuario;
    }
    
    public function getPassword(){
        return $this->Password;
    }
    public function getAdministrador(){
        return $this->Administrador;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function setNombre($Nombre){
        $this->nombre = $Nombre;
        return $this;
    }
    public function setApellidos($Apellidos){
        $this->Apellidos = $Apellidos;
    }
    public function setUsuario($Usuario){
        $this->Usuario=$Usuario;
        return $this;
    }
    public function setEmail($Email){
        $this->Email=$Email;
        return $this;
    }
    public function setPassword($Password){
        $this->Password=$Password;
        return $this;
    }
    public function setAdministrador($Administrador){
        $this->Administrador=$Administrador;
        return $this;
    }
}