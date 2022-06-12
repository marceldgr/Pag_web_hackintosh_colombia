<?php
require_once(__DIR__ ."/../../modelo/dao/ProductoDAO.php");

function Registrar_Producto(Producto $producto){
    $dao =new ProductoDAO();
    $producto=$dao->Registrar_Producto($producto);
    return $producto;
}
function Ver_Productos(){
    $dao=new ProductoDAO();
    $producto=$dao->Ver_Productos();
    return $producto;
}
function Eliminar_Producto($idProducto){
    $dao=new ProductoDAO();
    $dao->Eliminar_Producto($idProducto);
}
function Ver_Producto_id($idProducto){
    $dao=new ProductoDAO();
    $producto=$dao->Ver_Producto_id($idProducto);
    return $producto;
}
function Editar_Producto($producto){
    $dao=new ProductoDAO();
    $dao->Editar_Producto($producto);
}
