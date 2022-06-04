<?php
session_start();
require_once(__DIR__ ."/../mdb/mdbProducto.php");
require_once(__DIR__ ."/../../modelo/entidad/Producto.php");

$Marca = filter_input(INPUT_POST,'Marca');
$Modulo = filter_input(INPUT_POST,'Modelo');
$Fecha_Ingreso = filter_input(INPUT_POST,'Fecha_Ingreso');
$Cantidad = filter_input(INPUT_POST,'Cantidad');
$Precio = filter_input(INPUT_POST,'Precio');
$Codigo = filter_input(INPUT_POST,'Codigo');

$Producto=new Producto(NULL,$Marca,$Modulo,$Fecha_Ingreso,$Cantidad,$Precio,$Codigo);
$estado= Registrar_Producto($Producto);
$msg="PRODUCTO INGREADO";

$result=[
    'estado'=>$estado,
    'msg'=>$msg
];

echo json_encode($result);

