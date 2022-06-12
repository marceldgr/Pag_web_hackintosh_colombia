<?php
require_once("dataSource.php");
require_once(__DIR__."/../entidad/Producto.php");

class ProductoDAO{
   
    public function Registrar_Producto(Producto $producto){
        $data_Source= new DataSource();
        $stmt1="INSERT INTO productos VALUES (NULL,:Nombre,:Descripcion,:imagen,:Stock,:Vendidos,:Valor)";

        $Resultado=$data_Source->ejecutarActulizacion($stmt1, array(
        ':Nombre'=>$producto->getNombre(),  
        ':Descripcion'=>$producto->getDescripcion(), 
        ':imagen'=>$producto->getimagen(),
        ':Stock'=>$producto->getStock(),
        ':Vendidos'=>$producto->getVendidos(),
        ':Valor'=>$producto->getValor()));
        return $Resultado;
    }
    public function Ver_Productos(){
        $data_Source=new DataSource();
        $data_Table=$data_Source->ejecutarConsulta("SELECT * FROM productos ",NULL);
        $producto=null;
        $productos=array();

        foreach($data_Table as $indice => $valor){
            $producto=new Producto(
                $data_Table[$indice]["idproducto"],
                $data_Table[$indice]["Nombre"],
                $data_Table[$indice]["Descripcion"],
                $data_Table[$indice]["Imagen"],
                $data_Table[$indice]["Stock"],  
                $data_Table[$indice]["Vendidos"],
                $data_Table[$indice]["Valor"]);
                array_push($productos,$producto);            
        }
        return $productos;
    }
    public function Eliminar_Producto($idProducto){
        $data_Source=new DataSource();
        $stmt1 = "DELETE FROM productos WHERE idProducto = :idProducto";
        $Resultado=$data_Source->ejecutarActulizacion($stmt1,array(':idProducto'=>$idProducto));
        return $Resultado;
    }
    public function Ver_Producto_id($idProducto){
        $data_Source=new DataSource();
        $data_Table=$data_Source->ejecutarConsulta("SELECT * FROM productos WHERE idProducto = :idProducto",array(':idProducto'=>$idProducto));
        $Producto=null;
        if(count($data_Table)==1){
            $Producto=new Producto(
                $data_Table[0]["idproducto"],
                $data_Table[0]["Nombre"],
                $data_Table[0]["Descripcion"],
                $data_Table[0]["Imagen"],
                $data_Table[0]["Stock"],  
                $data_Table[0]["Vendidos"],
                $data_Table[0]["Valor"]);
        }
        return $Producto;
    }
    public function Editar_Producto($producto){
        $data_Source=new DataSource();
        $stmt1="UPDATE productos SET Nombre=:Nombre,Descripcion=:Descripcion,imagen=:imagen,Stock=:Stock,Vendidos=:Vendidos,Valor=:Valor
        WHERE idProducto=:idProducto";
        $Resultado=$data_Source->ejecutarActulizacion($stmt1, array(
            ':idProducto'=>$producto->getIdProducto(),
            ':Nombre'=>$producto->getNombre(),  
            ':Descripcion'=>$producto->getDescripcion(), 
            ':imagen'=>$producto->getimagen(),
            ':Stock'=>$producto->getStock(),
            ':Vendidos'=>$producto->getVendidos(),
            ':Valor'=>$producto->getValor()));
        return $Resultado;

    }
    
}
?>