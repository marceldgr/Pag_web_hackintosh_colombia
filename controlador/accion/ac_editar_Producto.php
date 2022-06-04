<?php

session_start();
require_once (__DIR__.'/../mdb/mdbProducto.php');
$idProducto= $_SESSION['idProducto'];
$Marca= $_POST['Marca'];
$Modelo= $_POST['Modelo'];
$Fecha_Ingreso= $_POST['Fecha_Ingreso'];
$Cantidad= $_POST['Cantidad'];
$Precio= $_POST['Precio'];
$Codigo=$_POST['Codigo'];
$imagen= $_POST['imagen'];



$Producto = new Producto ($idProducto,$Marca,$Modelo,$Fecha_Ingreso,$Cantidad,$Precio,$Codigo,$idProducto);



Editar_Producto($Producto);
echo '  <script> alert("Producto Actualizado  exitosamente"); 
                        window.location="../../vista/paginas/datos_admin/editarProdctos.php";
                </script>';
header("location: ../../vista/paginas/datos_admin/editarProducto.php");