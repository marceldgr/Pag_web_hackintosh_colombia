<?php
class Usuario{
    public $id;
    public $Nombre_completo;
    public $Usuario;
    public $Email;
    public $Password;
    public $Administrador;
	/**
	 */
	public function __construct($id, $Nombre_completo, $Usuario,$Email,$Password,$Administrador) {
        $this->id=$id;
        $this->Nombre_completo=$Nombre_completo;
        $this->Usuario=$Usuario;
        $this->Email=$Email;
        $this->Password=$Password;
        $this->Administrador=$Administrador;
	}
    public function getId(){
        return $this->id;
    }
    public function getNombre_completo(){
        return $this->Nombre_completo;
    }
    public function getUsuario(){
        return $this->Nsuario;
    }
    public function getEmail(){
        return $this->Email;
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
    public function setNombre_completo($Nombre_completo){
        $this->nombre_completo = $Nombre_completo;
        return $this;
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