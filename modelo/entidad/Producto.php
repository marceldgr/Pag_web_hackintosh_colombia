<?php
class Producto{
    public $id;
    public $Marca;
    public $Modelo;
    public $Fecha_Ingreso;
    public $Cantidad;
    public $Precio;
    public $Codigo;
	/**
	 */
	public function __construct($id,$Marca,$Modelo,$Fecha_Ingreso,$Cantidad,$Precio,$Codigo) {
        $this->idproducto=$id;
        $this->Marca=$Marca;
        $this->Modelo=$Modelo;
        $this->Fecha_Ingreso=$Fecha_Ingreso;
        $this->Cantidad=$Cantidad;
        $this->Precio=$Precio;
        $this->Codigo=$Codigo;
        
	}
    public function getId(){
        return $this->id;
    }
    public function getMarca(){
        return $this->Marca;
    }
    public function getModelo(){
        return $this->Modelo;
    }
    public function getFecha_Ingreso(){
        return $this->Fecha_Ingreso;
    }
    public function getCantidad(){
        return $this->Cantidad;
    }
    
    public function getPrecio(){
        return $this->Precio;
    }
    public function getCodigo(){
        return $this->Codigo;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function setMarca($Marca){
        $this->Marca = $Marca;
        return $this;
    }
    public function setModelo($Modelo){
        $this->Modelo = $Modelo;
    }
    public function setFecha_Ingreso($Fecha_Ingreso){
        $this->Fecha_Ingreso=$Fecha_Ingreso;
        return $this;
    }
    public function setCantidad($Cantidad){
        $this->Cantidad=$Cantidad;
        return $this;
    }
    public function setPrecio($Precio){
        $this->Precio=$Precio;
        return $this;
    }
    public function setCodigo($Codigo){
        $this->Codigo=$Codigo;
        return $this;
    }
}