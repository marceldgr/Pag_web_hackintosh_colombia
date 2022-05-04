<?php 
session_start();
require_once(__DIR__ ."/../mdb/mdbUsuario.php");
require_once(__DIR__ ."/../../modelo/entidad/Usuario.php");

$Nombre=$_POST['Nombre'];
$Apellido=$_POST['Apellido'];
$Email=$_POST['Email'];
$Usuario=$_POST['Usuario'];
$Password=$_POST['Password'];
$Administrador=$_POST['Administrador'];

if(isset($_POST['Administrador'])){
    $Usuario=new Usuario(NULL,$Nombre,$Apellido,$Email,$Usuario,$Password,1);
    registrarUsuario($Usuario);
    header("location:../../Vista/paginas/perfil_admin.php"); 

} else{
    $Usuario=new Usuario(NULL,$Nombre,$Apellido,$Email,$Usuario,$Password,0);
    $registro=registrarUsuario($Usuario);

    if($registro)
    header("Location:../../Vista/Login.php?msg= Se Registro exitos");
    else
    header("Location:../../Vista/Login.php?msg= Error de registro verifique datos");   
}
?>