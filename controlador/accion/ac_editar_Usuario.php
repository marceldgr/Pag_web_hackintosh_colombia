<?php

session_start();
require_once (__DIR__.'/../mdb/mdbUsuario.php');
$idUsuario= $_POST['idUsuario'];
$nombre= $_POST['nombre'];
$Apellido= $_POST['Apellido'];
$usuario= $_POST['usuario'];
$correo= $_POST['correo'];
$password= $_POST['Password'];


$usuario = new Usuario($idUsuario,$nombre,$Apellido,$usuario,$correo,$contrasena,$Administrador);
editarUsuario($usuario);

header("location:../../Vista/AdminUsuario.php");