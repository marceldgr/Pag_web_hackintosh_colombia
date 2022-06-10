<?php
session_start();
require_once(__DIR__ ."/../mdb/mdbProducto.php");
$idProducto=filter_input(INPUT_POST,'idProducto');

$estado=Eliminar_Producto($idProducto);
$msg="Producto eliminado exitosamente";

$result=[
    'estado'=>$estado,
    'msg'=>$msg
];

echo json_encode($result);

