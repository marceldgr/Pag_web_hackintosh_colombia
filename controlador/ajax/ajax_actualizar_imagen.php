<?php
session_start();
require_once (__DIR__. "/../mdb/mdbUsuario.php");
$id_usuario =$_SESSION['ID_USUARIO'];
$nombre_imagen=$_FILES["files"]['name'];
$tipo_imagen=$_FILES["files"]['type'];
$tamaño_imagen=$_FILES["files"]['size'];

$destino='../../Vista/img/img_perfil_usuarios/';

move_uploaded_file($_FILES["files"]['tmp_name'],$destino.$nombre_imagen);
Actualizar_foto($id_usuario,$nombre_imagen);
echo "../img/img_perfil_usuarios/".$nombre_imagen;
?>