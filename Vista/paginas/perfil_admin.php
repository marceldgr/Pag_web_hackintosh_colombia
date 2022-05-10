<?php
session_start();
if(!isset($_SESSION['ID_USUARIO'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminstrador de usuario </title>
    <link rel="stylesheet" href="../css/style_admin.css">
 </head>

<body>
    <header>
    <div class="company-logo"><a class="logo" href="../../index.html">
        <img src="../img/logo_hack/logo3.png" alt="">
         </a>
        </div>
    <nav class="navbar">
            <ul class="nav-items">
                <li class="nav-item"><a href="editarProductos.php"class="nav-link">Editar Productos</a></li>
                <li class="nav-item"><a href="perfil_admin.php"class="nav-link">Administrad Usuario</a></li>
            </ul>
        </nav>
        <div class="menu-toggle">
             <i class="bx bx-menu"></i>
             <i class="bx bx-x"></i>
    </div> 
    <h1><?php echo  $_SESSION['NOMBRE']?></h1>
            </div>
            <i class="fa-solid fa-bars" id="icon_menu"></i>
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
</body>

</html>