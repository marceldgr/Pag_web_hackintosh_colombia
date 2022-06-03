<?php

$nombre_imagen=$_FILES["files"]['name'];
$tipo_imagen=$_FILES["files"]['type'];
$tamaño_imagen=$_FILES["files"]['size'];

$destino='../../Vista/img/img_perfil_usuarios/';

move_uploaded_file($_FILES["files"]['tmp_name'],$destino.$nombre_imagen);
echo $nombre_imagen;
?>