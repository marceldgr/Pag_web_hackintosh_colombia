<?php
session_start();
require_once(__DIR__ ."/../mdb/mdbUsuario.php");
$idUsuario=filter_input(INPUT_POST,'IdUsuario');
$Nombre = filter_input(INPUT_POST,'Nombre');
$Apellido = filter_input(INPUT_POST,'Apellido');
$Email = filter_input(INPUT_POST,'Email');
$Usuario = filter_input(INPUT_POST,'Usuario');
$Password = filter_input(INPUT_POST,'Password');
$Img_perfil= filter_input(INPUT_POST,'Img_perfil');
$Administrador = filter_input(INPUT_POST,'Adm');
$Estado = 1;

$user=new Usuario($idUsuario,$Nombre,$Apellido,$Email,$Usuario,$Password,$Img_perfil,$Administrador,$Estado);
$estado=editarUsuario($user);
$msg="Usuario Editado exitosamente";


$result=[
    'estado'=>$estado,
    'msg'=>$msg
];

echo json_encode($result);

