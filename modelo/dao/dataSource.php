<?php 
class DataSource{
     private $cadena_Conexion;
     private $conexion;
//base de dastos 

     
     public function __construct(){
         try{
             $this->cadena_Conexion=sqlsrv:server = tcp:vacasvaqueras.database.windows.net,1433; Database = dev_DB_Vacas_Vaqueras", "root1", "{Admin123}");
             //revisar esta conexion
             $this->conexion=new PDO($this->cadena_Conexion,"id18809376_hackintosh_colombia_","IL0t@0B#/FXD}1XX");
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
?>
