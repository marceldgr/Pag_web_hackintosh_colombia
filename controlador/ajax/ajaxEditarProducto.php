<?php
session_start();
require_once(__DIR__ ."/../mdb/mdbProducto.php");
$IdUsuario=filter_input(INPUT_POST,'IdUsuario');
$Nombre = filter_input(INPUT_POST,'Nombre');
$Descripcion = filter_input(INPUT_POST,'Descripcion');
$imagen = filter_input(INPUT_POST,'imagen');
$Stock = filter_input(INPUT_POST,'Stock');
$Vendidos = filter_input(INPUT_POST,'Vendidos');
$Valor= filter_input(INPUT_POST,'Valor');


$Producto=new Producto($IdUsuario,$Nombre,$Descripcion,$imagen,$Stock,$Vendidos,$Valor);
$estado= Editar_Producto($Producto);
$msg="Producto editado exitosamente";


$result=[
    'estado'=>$estado,
    'msg'=>$msg
];

echo json_encode($result);

