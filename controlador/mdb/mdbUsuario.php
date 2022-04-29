<?php
require_once(__DIR__ ."/../../modelo/dao/UsuarioDAO.php");
function autenticarUsuario($Email,$Password){
    $dao=new UsuarioDAO();
    $usuario=$dao->autenticarUsuario($Email,$Password);
    return $usuario;
}
function registrarUsuario(Usuario $usuario){
    $dao =new UsuarioDAO();
    $usuario=$dao->registrarUsuario($usuario);
    return $usuario;
}
function VerUsuarios(){
    $dao=new UsuarioDAO();
    $usuarios=$dao->VerUsuario();
    return $usuarios;
}
function eliminarUsuario($idUsuario){
    $dao=new UsuarioDAO();
    $dao->eliminarUsuario($idUsuario);
}
function VerUsuarios_id($idUsuario){
    $dao=new UsuarioDAO();
    $usuario=$dao->VerUsuarios_id($idUsuario);
    return $usuario;
}
function editarUsuario($usuario){
    $dao=new UsuarioDAO();
    $dao->editarUsuario($usuario);
}