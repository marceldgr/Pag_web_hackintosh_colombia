<?php 
class DataSource{
     private $cadena_Conexion;
     private $conexion;

     public function __construct(){
         try{
             $this->cadena_Conexion="mysql:host=localhost;dbname=hackintosh_colombia;charset=utf8";
             $this->conexion=new PDO($this->cadena_Conexion,"root","");
         }catch (PDOException $ex) {
             echo $ex->getMessage();
         }
     }
     public function ejecutarConsulta($sql="",$values=array()){
         if($sql != ""){
             $consulta=$this->conexion->prepare($sql);
             $consulta->execute($values);
             $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
             $this->conexion=null;
             return $tabla_datos;

         }
     }
    
     public function ejecutarActulizacion($sql="",$values=array()){
         if($sql != ""){
             $consulta=$this->conexion->prepare($sql);
             $consulta->execute($values);
             $numero_filas_afectadas = $consulta -> rowCount();
             return $this->conexion->lastInsertId();
             $this->conexion = null;
         }else{
             return 0;
         }
     }
}
