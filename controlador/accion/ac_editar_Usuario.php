<?php

session_start();
require_once (__DIR__.'/../mdb/mdbUsuario.php');
$idUsuario= $_POST['idUsuario'];
$nombre= $_POST['nombre'];
$Apellido= $_POST['Apellido'];
$usuario= $_POST['usuario'];
$correo= $_POST['correo'];
$contrasena= $_POST['contrasena'];


$usuario = new Usuario($idUsuario,$nombre,$usuario,$correo,$contrasena,$Administrador);
editarUsuario($usuario);

header("location:../../Vista/AdminUsuario.php");