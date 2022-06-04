<?php
session_start();
require_once (__DIR__. "/../mdb/mdbProducto.php");
$Producto = Ver_Productos();

echo json_encode($Producto);

?>