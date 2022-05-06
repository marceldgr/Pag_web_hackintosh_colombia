<?php

session_start();
require_once (__DIR__.'/../mdb/mdbUsuario.php');
$idUsuario= $_SESSION['ID_USUARIO'];
$nombre= $_POST['nombre'];
$Apellido= "";
//$Apellido= $_POST['Apellido'];
$usuario= $_POST['usuario'];
$correo= $_POST['email'];
$password= $_POST['password'];
$Administrador=0;


$usuario = new Usuario($idUsuario,$nombre,$Apellido,$usuario,$correo,$password,$Administrador);
editarUsuario($usuario);
echo '  <script> alert("Usuario Actualizado  exitosamente"); 
                        window.location="../../vista/paginas/perfil_Usuario.php";
                </script>';
//header("location: ../../vista/paginas/perfil_Usuario.php");