<?php
    session_start();

    require_once(__DIR__. '/../mdb/mdbProducto.php');
    $idProducto = $_GET['idProducto'];
    Eliminar_Producto($idProducto);
    header("location:../../Vista/paginas/datos_admin/editarProdcutos.php");