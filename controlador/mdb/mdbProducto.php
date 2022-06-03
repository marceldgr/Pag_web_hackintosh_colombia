<?php
require_once(__DIR__ ."/../../modelo/dao/ProductoDAO.php");

function registrarProducto(Producto $producto){
    $dao =new ProductoDAO();
    $producto=$dao->registrarProducto($producto);
    return $producto;
}
function VerProductos(){
    $dao=new ProductoDAO();
    $producto=$dao->VerProductos();
    return $producto;
}
function eliminarProducto($idProducto){
    $dao=new UsuarioDAO();
    $dao->eliminarProducto($idProducto);
}
function VerProducto_id($idProducto){
    $dao=new UsuarioDAO();
    $producto=$dao->VerProducto_id($idProducto);
    return $producto;
}
function editarProducto($producto){
    $dao=new UsuarioDAO();
    $dao->editarProducto($producto);
}
