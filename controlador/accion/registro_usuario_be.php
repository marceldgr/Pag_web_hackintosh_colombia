<?php
   session_start();
    require_once(__DIR__ . "/../mdb/mdbUsuario.php");
    require_once(__DIR__."/../../modelo/entidad/Usuario.php");

    include 'conexion_be.php';
  
    $Nombre= $_POST['Nombre'];
    $Apellido=$_POST['Apellido'];
    $Email= $_POST['Email'];
    $Usuario= $_POST['Usuario'];
    $Password= $_POST['Password'];
    $Administrador=0;
 

    $query= "INSERT INTO usuario(Nombre,Apellido,Email,Usuario, Password,Administrador ) VALUES('$Nombre','$Apellido','$Email','$Usuario','$Password','$Administrador')";

    $verificarEmail = mysqli_query($conexion," SELECT * FROM usuario WHERE Email= '$Email' ");
    if(mysqli_num_rows($verificarEmail)>0){
        echo' <script> alert("Email se encuentrar en la base de datos");
        widows.location="../../Vista/login.php";
        </script>';
        exit();
    }
    $verificarUsuario = mysqli_query($conexion," SELECT * FROM usuario WHERE Usuario= '$Usuario'");
    if(mysqli_num_rows($verificarUsuario)>0){
        echo' <script> alert("Usuario se encuentrar en la base de datos");
        widows.location="../../Vista/login.php";
        </script>';
        exit();
    }
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '  <script> alert("Usuario creado exitosamente"); 
                        window.location="../../Vista/login.php";
                </script>';
    }else{
        echo '  <script> alert("Usuario no creado o error de datos "); 
        window.location="../../Vista/login.php";
</script>';
    }
mysqli_close($conexion);

  
