<?php
    session_start();

    require_once(__DIR__. '/../mdb/mdbUsuario.php');
    $idUsuario = $_GET['idUsuario'];
    eliminarUsuario($idUsuario);
    header("location:../../Vista/paginas/perfil_admin.php");