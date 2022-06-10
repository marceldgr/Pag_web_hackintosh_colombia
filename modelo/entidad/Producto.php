<?php
class Producto{
    public $idProducto;
    public $Nombre;
    public $Descripcion;
    public $imagen;
    public $Stock;
    public $Vendidos;
    public $Valor;
       
	public function __construct($idProducto,$Nombre,$Descripcion,$imagen,$Stock,$Vendidos,$Valor) {
        $this->idProducto=$idProducto;
        $this->Nombre=$Nombre;
        $this->Descripcion=$Descripcion;
        $this->imagen=$imagen;
        $this->Stock=$Stock;
        $this->Vendidos=$Vendidos;
        $this->Valor=$Valor;
        
	}
    public function getIdProducto(){
        return $this->idProducto;
    }
    public function getNombre(){
        return $this->Nombre;
    }
    public function getDescripcion(){
        return $this->Descripcion;
    }
    public function getimagen(){
        return $this->imagen;
    }
    public function getStock(){
        return $this->Stock;
    }
    
    public function getVendidos(){
        return $this->Vendidos;
    }
    public function getValor(){
        return $this->Valor;
    }

    public function setId($idProducto){
        $this->idProducto = $idProducto;
        return $this;
    }
    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
        return $this;
    }
    public function setDescripcion($Descripcion){
        $this->Descripcion = $Descripcion;
    }
    public function setimagen($imagen){
        $this->imagen=$imagen;
        return $this;
    }
    public function setStock($Stock){
        $this->Stock=$Stock;
        return $this;
    }
    public function setVendidos($Vendidos){
        $this->Vendidos=$Vendidos;
        return $this;
    }
    public function setValor($Valor){
        $this->Valor=$Valor;
        return $this;
    }
}