<?php
require_once(__DIR__ ."/../../modelo/dao/ProductoDAO.php");

function Registrar_Producto(Producto $Producto){
    $dao =new ProductoDAO();
    $Producto=$dao->Registrar_Producto($Producto);
    return $Producto;
}
function Ver_Productos(){
    $dao=new ProductoDAO();
    $Producto=$dao->Ver_Productos();
    return $Producto;
}
function Eliminar_Producto($idProducto){
    $dao=new ProductoDAO();
    $dao->Eliminar_Producto($idProducto);
}
function Ver_Producto_id($idProducto){
    $dao=new ProductoDAO();
    $Producto=$dao->Ver_Producto_id($idProducto);
    return $Producto;
}
function Editar_Producto($Producto){
    $dao=new ProductoDAO();
    $dao->Editar_Producto($Producto);
}
