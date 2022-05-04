<?php
class UserSeccion{
    public function __construct() {

    session_start();    
}

public function setCurrentUser($Nombre){
    $_SESSION['Nombre']=$Nombre;

}
public function getCurrentUser(){
    return $_SESSION['Nombre'];
}
public function closeSession(){
    session_unset();
    session_destroy();
}

}
?>