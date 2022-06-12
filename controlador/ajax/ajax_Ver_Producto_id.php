<?php
session_start();
require_once(__DIR__ ."/../mdb/mdbProducto.php");
$idProducto=$_POST["idProducto"];
$Producto= Ver_Producto_id($idProducto);
echo json_encode($Producto);
?>