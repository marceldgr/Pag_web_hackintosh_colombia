<?php
require_once(__DIR__ ."/../../modelo/dao/UsuarioDAO.php");
function autenticarUsuario($Email,$Password){
    $dao=new UsuarioDAO();
    $usuario=$dao->autenticarUsuario($Email,$Password);
    return $usuario;
}
function registrarUsuario(Usuario $Usuario){
    $dao =new UsuarioDAO();
    $usuario=$dao->registrarUsuario($Usuario);
    return $usuario;
}
function VerUsuario(){
    $dao=new UsuarioDAO();
    $usuario=$dao->VerUsuario();
    return $usuario;
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
function editarUsuario(Usuario $usuario){
    $dao=new UsuarioDAO();
    $dao->editarUsuario($usuario);
}
function VerUsuario_Por_email($Email){
    $dao=new UsuarioDAO();
    $usuario=$dao->VerUsuario_Por_email($Email);
    return $usuario;

}
function Validar_usuario($user){
    $dao=new UsuarioDAO();
    $usuario=$dao->Validar_usuario($user);
    return $usuario;

}
function Actualizar_foto($id_usuario,$img){
    $dao=new UsuarioDAO();
    $dao->Actualizar_foto($id_usuario,$img);
}