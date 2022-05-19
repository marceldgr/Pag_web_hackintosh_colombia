<?php

session_start();
require_once (__DIR__.'/../mdb/mdbUsuario.php');
$idUsuario= $_SESSION['ID_USUARIO'];
$Nombre= $_POST['NOMBRE'];
$Apellido= $_POST['APELLIDO'];
$Email= $_POST['EMAIL'];
$Usuario= $_POST['USUARIO'];
$Password= $_POST['PASSWORD'];
$Administrador=0;


<<<<<<< Updated upstream

$usuario = new Usuario($idUsuario,$Nombre,$Apellido,$Email,$Usuario,$Password,$Administrador);



=======
$usuario = new Usuario($idUsuario,$Nombre,$Apellido,$Email,$Usuario,$Password,$Administrador);
>>>>>>> Stashed changes
editarUsuario($usuario);
echo '  <script> alert("Usuario Actualizado  exitosamente"); 
                        window.location="../../vista/paginas/perfil_Usuario.php";
                </script>';
//header("location: ../../vista/paginas/perfil_Usuario.php");