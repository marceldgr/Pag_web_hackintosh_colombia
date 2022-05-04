<?php 
session_start();
require_once(__DIR__ ."/../mdb/mdbUsuario.php");
require_once(__DIR__ ."/../modelo/entidad/Usuario.php");

$Nombre=$_POST['Nombre'];
$Apellido=$_POST['Apellido'];
$Email=$_POST['Email'];
$Usuario=$_POST['Usuario'];
$Password=$_POST['Password'];
$Administrador=$_POST['Administrador'];

if(isset($_POST['Administrador'])){
    $Usuario=new Usuario(NULL,$Nombre,$Apellido,$Email,$Usuario,$Password,$Administrador);
    registrarUsuario($usuario);
    header("location:../../Vista/paginas/perfil_admin.php"); 

} else{
    $Usuario=new Usuario(NULL,$Nombre,$Apellido,$Email,$Usuario,$Password,$Administrador,0);
    $registro=registrarUsuario($usuario);
    if($registro)
    header("location:../../Vista/Login.php?msg= Registro exitos");
    else
    header("Location:../../Vista/Login.php?msg= Error de registro verifique datos");   
}
