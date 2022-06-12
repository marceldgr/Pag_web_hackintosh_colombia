<?php

session_start();

require_once (__DIR__. "/../mdb/mdbUsuario.php");

$Email=filter_input(INPUT_POST, 'Email');
$Password=filter_input(INPUT_POST,'Password');
/*$Email=$_GET['Email'];
$Password=$_GET['Password'];*/

$user = autenticarUsuario($Email,$Password);
$Admin=0;
$ruta="#";
$msg="Usuario o contraseña no válido. Intente con otros datos";


if($user != null){
    //Si el usuario fue encontrado, se guarda su ID en una sesión con $_SESSION
    $msg="logeado";
    $_SESSION['ID_USUARIO'] = $user->getId();
    $_SESSION['NOMBRE'] = $user->getNombre(); 
    $_SESSION['APELLIDO'] = $user->getApellido();
    $_SESSION['EMAIL'] = $user->getEmail();
    $_SESSION['USUARIO'] = $user->getUsuario();
    $_SESSION['ADMIN'] = $user->getAdministrador();
    $_SESSION['FOTO'] = $user->getImg_perfil();
    $Administrador=$user->getAdministrador();
    if($_SESSION['FOTO']==" "){
        $_SESSION['FOTO']="usuario.png";
    }
    if($user->getAdministrador() == 1){
        $ruta ="../Vista/paginas/perfil_admin.php";                
    }else{
        $ruta="../Vista/paginas/perfil_usuario.php";
    }
}


$resultado = [
'msg' => $msg,
"type" => ($user)?"success":"error",
"ruta" => $ruta,
"user"=>$user
]; //Vector PHP
//echo $resultado;
//ECHO $Email;
$r=json_encode($resultado);
//echo '  <script> alert("entro a ajax")</script>';
//echo '  <script> console.log('.$r.'); </script>';b
echo $r; // Convirtiendo en jSon*/

