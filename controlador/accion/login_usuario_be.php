<?php 
session_start();
include 'conexion_be.php';
$Email= $_POST['Email'];
$Password= $_POST['Password'];

$validar_login=mysqli_query($conexion, "SELECT * FROM usuario WHERE Email='$Email' AND Password='$Password' ");

if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $Email;
    
    header("Location:../../Vista/paginas/perfil_Usuario.php");
    exit;

}else{
    echo ' 
            <script>
                     alert("Datos son incorrectos verifique los campos");
                     window.location="../../Vista/Login.php";
            </script>
            ';
    exit;
}


?>