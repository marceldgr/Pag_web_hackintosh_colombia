<?php 
session_start();
require_once(__DIR__ ."/../mdb/mdbUsuario.php");
require_once(__DIR__ ."/../../modelo/entidad/Usuario.php");

$Nombre=$_POST['Nombre'];
$Apellido=$_POST['Apellido'];
$Email=$_POST['Email'];
$Usuario=$_POST['Usuario'];
$Password=$_POST['Password'];
$Img_perfil=$_POST['Img_perfil'];
$Administrador=$_POST['Administrador'];
$Estado=$_POST['Estado'];


if(isset($_POST['Administrador'])){
    $Usuario= new usuario(NULL,$Nombre,$Apellido,$Email,$Usuario,$Password,$Img_perfil,1,$Estado);
    registrarUsuario($Usuario);
    header("location:../../Vista/paginas/perfil_admin.php"); 

} else{
    $Usuario= new usuario(NULL,$Nombre,$Apellido,$Email,$Usuario,$Password,$Img_perfil,0,$Estado);
    $registro=registrarUsuario($Usuario);
   
   
      if($registro){
        echo '  <script> alert("Usuario creado exitosamente"); 
                        window.location="../../Vista/Login.php";
                </script>';


      }
    
    else{
        echo '  <script> alert("Usuario no creado o error de datos "); 
                         window.location="../../Vista/Login.php";
                </script>';
    }
    

}


?>