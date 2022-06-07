<?php
session_start();
require_once(__DIR__ ."/../mdb/mdbUsuario.php");
require_once(__DIR__ ."/../../modelo/entidad/Usuario.php");

$Nombre = filter_input(INPUT_POST,'Nombre');
$Apellido = filter_input(INPUT_POST,'Apellido');
$Email = filter_input(INPUT_POST,'Email');
$Usuario = filter_input(INPUT_POST,'Usuario');
$Password = filter_input(INPUT_POST,'Password');
$Img_perfil= filter_input(INPUT_POST,'Img_perfil');
$Administrador = filter_input(INPUT_POST,'Administrador');
$Estado = filter_input(INPUT_POST,'Estado');

$user = VerUsuario_Por_email($Email,$Usuario);
if($user==null){
    $usuario=new Usuario(NULL,$Nombre,$Apellido,$Email,$Usuario,$Password,$Img_perfil,$Administrador,$Estado);
    $estado= registrarUsuario($usuario);
    $msg="RESGISTRADO EL USUARIO";
}

$result=[
    'estado'=>$estado,
    'msg'=>$msg
];

echo json_encode($result);

