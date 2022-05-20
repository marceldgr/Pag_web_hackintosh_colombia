<?php 
session_start();
require_once(__DIR__ ."/../mdb/mdbUsuario.php");
$Email = $_POST['Email'];
$Password = $_POST['Password'];

$user = autenticarUsuario($Email, $Password);

if($user != null){
    //Si el usuario fue encontrado, se guarda su ID en una sesión con $_SESSION
    $_SESSION['ID_USUARIO'] = $user->getId();
    $_SESSION['NOMBRE'] = $user->getNombre(); 
    $_SESSION['APELLIDO'] = $user->getApellido();
    $_SESSION['EMAIL'] = $user->getEmail();
    $_SESSION['USUARIO'] = $user->getUsuario();
    $_SESSION['ADMIN'] = $user->getAdministrador();
    if($user->getAdministrador() == 1){
        header("Location: ../../Vista/paginas/perfil_admin.php");                
    }else{
        header("Location: ../../Vista/paginas/perfil_Usuario.php");
    }

}else{
    //Si el usuario no existe se vuelve a mostrar el login
    header("Location:../../Vista/Login.php");

}