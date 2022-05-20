<?php

session_start();

<<<<<<< HEAD
require_once (__DIR__. "/../mdb/mdbUsuario.php");

=======
require_once (__DIR__."../mdb/mdbUsuario.php");
>>>>>>> 159eed4193ef3bc980880d60deed445098270990
$Email=filter_input(INPUT_POST, 'Email');
$Password=filter_input(INPUT_POST,'Password');
/*$Email=$_GET['Email'];
$Password=$_GET['Password'];*/

$user = autenticarUsuario($Email,$Password);
$Admin=0;
$ruta="#";
$msg="Usuario o contraseña no válido. Intente con otros datos";


<<<<<<< HEAD
if($user != null){
    //Si el usuario fue encontrado, se guarda su ID en una sesión con $_SESSION
    $msg="logeado";
=======
>>>>>>> 159eed4193ef3bc980880d60deed445098270990
    $_SESSION['ID_USUARIO'] = $user->getId();
    $_SESSION['NOMBRE'] = $user->getNombre(); 
    $_SESSION['APELLIDO'] = $user->getApellido();
    $_SESSION['EMAIL'] = $user->getEmail();
    $_SESSION['USUARIO'] = $user->getUsuario();
    $_SESSION['ADMIN'] = $user->getAdministrador();
<<<<<<< HEAD
    $Administrador=$user->getAdministrador();
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
=======


if($user->getAdministrador() == 1){
    $ruta ="../../Vista/paginas/perfil_admin.php";                
}else{
    $ruta="../../Vista/paginas/perfil_usuario.php";
}

$msg = "Puede iniciar satisfatoriamente";

}

$resultado = [
'msg' => $msg,
"type" => ($user)?"success":"error",
"ruta" => $ruta
>>>>>>> 159eed4193ef3bc980880d60deed445098270990
]; //Vector PHP
//echo $resultado;
//ECHO $Email;
$r=json_encode($resultado);
//echo '  <script> alert("entro a ajax")</script>';
echo '  <script> console.log('.$r.'); </script>';
echo $r; // Convirtiendo en jSon*/

