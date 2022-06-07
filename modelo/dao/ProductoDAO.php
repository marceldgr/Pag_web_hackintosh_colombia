<?php
require_once("dataSource.php");
require_once(__DIR__."/../entidad/Producto.php");

class ProductoDAO{
   
    public function Registrar_Producto(Producto $Producto){
        $data_Source= new DataSource();
        $stmt1="INSERT INTO productos VALUES (NULL,:Marca,:Modelo,:Fecha_Ingreso,:Cantidad,:Precio,:Codigo,:imagen)";

        $Resultado=$data_Source->ejecutarActulizacion($stmt1, array(
        ':Marca'=>$Producto->getMarca(),  
        ':Modelo'=>$Producto->getModelo(), 
        ':Fecha_Ingreso'=>$Producto->getFecha_Ingreso(),
        ':Cantidad'=>$Producto->getCantidad(),
        ':Precio'=>$Producto->getPrecio(),
        ':Codigo'=>$Producto->getCodigo(),
        ':imagen'=>$Producto->getimagen()));
        return $Resultado;
    }
    public function Ver_Productos(){
        $data_Source=new DataSource();
        $data_Table=$data_Source->ejecutarConsulta("SELECT * FROM productos",NULL);
        $Producto=null;
        $productos=array();

        foreach($data_Table as $indice => $valor){
            $Producto=new Producto(
                $data_Table[$indice]["id"],
                $data_Table[$indice]["Marca"],
                $data_Table[$indice]["Modelo"],
                $data_Table[$indice]["Fecha_Ingreso"],
                $data_Table[$indice]["Cantidad"],  
                $data_Table[$indice]["Precio"],
                $data_Table[$indice]["Codigo"],
                $data_Table[$indice]["imagen"]);
                array_push($productos,$Producto);            
        }
        return $Producto;
    }
    public function eliminar_Producto($idProducto){
        $data_Source=new DataSource();
        $stmt1 = "DELETE FROM Productos WHERE idProducto = :idProducto";
        $Resultado=$data_Source->ejecutarActulizacion($stmt1,array(':idProducto'=>$idProducto));
        return $Resultado;
    }
    public function Ver_Producto_id($idProducto){
        $data_Source=new DataSource();
        $data_Table=$data_Source->ejecutarConsulta("SELECT * FROM productos WHERE idProducto = :idProducto",array(':idProducto'=>$idProducto));
        $Producto=null;
        if(count($data_Table)==1){
            $Producto=new Producto(
                $data_Table[0]["idProducto"],
                $data_Table[0]["Marca"],
                $data_Table[0]["Modelo"],
                $data_Table[0]["Fecha_Ingreso"],
                $data_Table[0]["Cantidad"],  
                $data_Table[0]["Precio"],
                $data_Table[0]["Codigo"],
                $data_Table[0]["imagen"]);
        }
        return $Producto;
    }
    public function Editar_Producto($Producto){
        $data_Source=new DataSource();
        $stmt1="UPDATE productos SET Marca=:Marca,Modelo=:Modelo,Fecha_Ingreso=:Fecha_Ingreso,Cantidad=:Cantidad,Precio=:Precio,Codigo=:Codigo,imagen=:imagen
        WHERE id=:idProducto";
        $Resultado=$data_Source->ejecutarActulizacion($stmt1, array(
            ':Marca'=>$Producto->getMarca(),  
            ':Modelo'=>$Producto->getModelo(), 
            ':Fecha_Ingreso'=>$Producto->getFecha_Ingreso(),
            ':Cantidad'=>$Producto->getCantidad(),
            ':Precio'=>$Producto->getPrecio(),
            ':Codigo'=>$Producto->getCodigo(),
            'imagen'=>$Producto->getimagen()));
        return $Resultado;

    }
    
}
?>