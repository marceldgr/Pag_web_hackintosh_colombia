<?php
session_start();

require_once (__DIR__. "/../mdb/mdbUsuario.php");
$Email=filter_input(INPUT_POST, 'Email');
$Password=filter_input(INPUT_POST,'Password');

$user = autenticarUsuario($Email, $Password);
$Administrador=0;
$ruta="#";
$msg="Usuario o contraseña no válido. Intente con otros datos";

if($user!=null){

//require_once(__DIR__ ."/../mdb/mdbUsuario.php");

$Email=filter_input(INPUT_POST,'user');
$Password=filter_input(INPUT_POST,'pass');
/*$Email = $_POST['user'];
$Password = $_POST['pass'];*/

$user = autenticarUsuario($Email, $Password);
$ruta="";
$msg="algo";
if($user != null){
    //Si el usuario fue encontrado, se guarda su ID en una sesión con $_SESSION


    $_SESSION['ID_USUARIO'] = $user->getId();
    $_SESSION['NOMBRE'] = $user->getNombre(); 
    $_SESSION['APELLIDO'] = $user->getApellido();
    $_SESSION['EMAIL'] = $user->getEmail();
    $_SESSION['USUARIO'] = $user->getUsuario();
    $_SESSION['ADMIN'] = $user->getAdministrador();

}
if($user->getAdministrador() == 1){
    $ruta =" ../../Vista/paginas/perfil_admin.php";                
}else{
    $ruta="../../Vista/paginas/perfil_usuario.php";
}

/*$msg = "Puede iniciar satisfatoriamente";
*/

}
$resultado = [
'msg' => $msg,
"type" => ($user)?"success":"error",
'ruta' => $ruta
]; //Vector PHP

echo json_encode($resultado); // Convirtiendo en jSon
