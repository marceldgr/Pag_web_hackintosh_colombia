<?php 
session_start();
require_once(__DIR__ ."/../mdb/mdbProducto.php");
require_once(__DIR__ ."/../../modelo/entidad/Producto.php");

$Marca=$_POST['Marca'];
$Modelo=$_POST['Modelo'];
$Fecha_Ingreso=$_POST['Fecha_Ingreso'];
$Cantidad=$_POST['Cantidad'];
$Precio=$_POST['Precio'];
$Codigo=$_POST['Codigo'];
$imagen=$_POST['imagen'];

if(isset($_POST['codigo'])){
    $Productos=new Producto(NULL,$Marca,$Modelo,$Fecha_Codigo,$Cantidad,$Precio,$Codigo,$imagen);
    Registrar_Producto($Productos);
    header("location:../../Vista/paginas/datos_admin/editarProductos.php"); 

} else{
    $Productos=new Producto(NULL,$Marca,$Modelo,$Fecha_Codigo,$Cantidad,$Precio,$Codigo,$imagen);
    $Registro=Registrar_Producto($Productos);
   
   
      if($Registro){
        echo '  <script> alert("Productos creado exitosamente"); 
                        window.location="../../Vista/paginas/datos_admin/pefilProductos.php";
                </script>';


      }
    
    else{
        echo '  <script> alert("Productos no creado o error de datos "); 
                         window.location="../../Vista/paginas/datos_admin/pefilProductos.php";
                </script>';
    }
    

}


?>