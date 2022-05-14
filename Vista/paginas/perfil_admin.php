<?php
session_start();
if(!isset($_SESSION['ID_USUARIO'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminstrador de usuario </title>
    <script src="https://kit.fontawesome.com/bd0578e771.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style_admin.css">
 </head>

<body>
    <header>
    <div class="company-logo"><a class="logo" href="../../index.html">
        <img src="../img/logo_hack/logo3.png" alt="">
         </a>
        </div>
        <div class="menu">
            <nav class="navbar"> 
                <ul class="nav-items">
                    <li class="nav-item"><a href="datos_admin/editarProductos.php"class="nav-link">Editar Productos</a></li>
                    <li class="nav-item"><a href="perfil_admin.php"class="nav-link">Administrad Usuario</a></li>
                    <li class="nav-item"><a href="../datos_adimn/PerfilAdmin.html"class="nav-link">Perfil</a></li>
                </ul>
            </nav>
        </div>
        

          
            <div class="fotoPefil">
                <a class="mostrarU" href="Vista/Login.php">
                    <img src="../img/logo_hack/logo2.png" alt="fotoPefil">
                </a>
            </div>
            <div class="header_registro">
                <a href="../login.php">
                    <div class="btn_cerrar">
                        <input type="button" class="btn_close_login" value="Salir">
                    </div>
                </a>
            </div>
        </div>
       
    </header>
    
    <hr>
    <div class="lista">
        <h1>Administar Usuarios</h1>
      <h1><?php echo  $_SESSION['NOMBRE']?></h1>
        <div class="table">
            <form action="" class="table">
                <table class="tableUsuario">
                    <table style="width:100%">
                        <tr>
                            <th>id</th>
                            <th>nombre completo</th>
                            <th>usuario</th>
                            <th>correo</th>
                            
                        </tr>
                        
                            <tr>
                            <td><?php echo  $_SESSION['ID_USUARIO']?></td>
                            <td><?php echo  $_SESSION['NOMBRE']?></td>
                            <td><?php echo  $_SESSION['USUARIO']?></td>
                            <td><?php echo  $_SESSION['EMAIL']?></td>
                           
                    
                            <td>
                                <input type="button" class="btn_editarUser" value="Editar" </input>

                            </td>
                            <td>
                                <input type="button" class="Eliminar_user" value="Eliminar" </input>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>.</td>
                            <td>.</td>
                            <td>.</td>
                            <td>.</td>
                            
                            <td>
                                <input type="button" class="btn_editarUser" value="Editar" </input>

                            </td>
                            <td>
                                <input type="button" class="Eliminar_user" value="Eliminar" </input>
                            </td>
                        </tr>
                    </table>
            </form>

        </div>

    </div>
    <script src="../js/perfil_admin.js"></script>
</body>

</html>