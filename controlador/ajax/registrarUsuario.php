<?php
session_start();
require_once(__DIR__ ."/../../mdb/mdbUsuario.php");
require_once(__DIR__ ."/../../../modelo/entidad/Usuario.php");
$Nombre=filter_input(INPUT_POST,'Nombre');
$Apellido=filter_input(INPUT_POST,'Apellido');
$Email=filter_input(INPUT_POST,'Email');
$Usuario=filter_input(INPUT_POST,'Usuario');
$Password=filter_input(INPUT_POST,'Password');
$Administrador=filter_input(INPUT_POST,'Administrador');

$usuario=new Usuario(NULL,$Nombre,$Apellido,$Email,$Usuario,$Password,$Administrador);
$estado= registrarUsuario($usuario);
$msg="RESGISTRADO EL USUARIO";

$resultado=['estado'=>$estado,'msg'=>$msg];

echo json_encode($resultado);

?>