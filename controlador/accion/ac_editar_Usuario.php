<?php

session_start();
require_once (__DIR__.'/../mdb/mdbUsuario.php');
$idUsuario= $_SESSION['ID_USUARIO'];
$Nombre= $_POST['NOMBRE'];
$Apellido= $_POST['APELLIDO'];
$Email= $_POST['EMAIL'];
$Usuario= $_POST['USUARIO'];
$Password= $_POST['PASSWORD'];
$Img_perfil=$_POST['IMG_PERFIL'];
$Administrador=0;
$Estado=$_POST['Estado'];



$usuario = new usuario($idUsuario,$Nombre,$Apellido,$Email,$Usuario,$Password,$Img_perfil,$Administrador,$Estado);



editarUsuario($usuario);
echo '  <script> alert("Usuario Actualizado  exitosamente"); 
                        window.location="../../vista/paginas/perfil_Usuario.php";
                </script>';
header("location: ../../vista/paginas/perfil_Usuario.php");