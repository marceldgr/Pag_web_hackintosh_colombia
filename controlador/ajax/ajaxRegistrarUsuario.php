<?php
session_start();
require_once(__DIR__ ."/../mdb/mdbUsuario.php");
//require_once(__DIR__ ."/../../modelo/entidad/Usuario.php");

$Nombre = filter_input(INPUT_POST,'Nombre');
$Apellido = filter_input(INPUT_POST,'Apellido');
$Email = filter_input(INPUT_POST,'Email');
$Usuario = filter_input(INPUT_POST,'Usuario');
$Password = filter_input(INPUT_POST,'Password');
//$Img_perfil= filter_input(INPUT_POST,'Img_perfil');
$Img_perfil= " ";
$Administrador = filter_input(INPUT_POST,'Adm');
$Estado = 1;

$user = VerUsuario_Por_email($Email);
if($user==null){
    $user=Validar_usuario($Usuario);
    if($user==null){
        $user=new Usuario(NULL,$Nombre,$Apellido,$Email,$Usuario,$Password,$Img_perfil,$Administrador,$Estado);
        $estado= registrarUsuario($user);
        $msg="Usuario registrado exitosamente";
    }else{
        $estado=2;
        $msg="Usuario en uso";
    }
    
}else{
    $estado=3;
    $msg="Email en uso";
}

$result=[
    'estado'=>$estado,
    'msg'=>$msg/*,
    'user'=>$user*/
];

echo json_encode($result);

