<?php
session_start();
if(!isset($_SESSION['ID_USUARIO'])){
    header("location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminstrador de usuario </title>
    <script src="https://kit.fontawesome.com/bd0578e771.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../css/style_admin.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/datatables.min.css"/>
    
 </head>

<body>
    <header>
        <div class="company-logo"><a class="logo" href="">
            <img src="../img/logo_hack/logo3.png" alt="">  </a>
        </div>
            <div class="menu">
                    <nav class="navbar"> 
                        <ul class="nav-items">
                            <li class="nav-item"><a href="datos_admin/editarProductos.php"class="nav-link">Editar Productos</a></li>
                            <li class="nav-item"><a href="perfil_admin.php"class="nav-link">Administrad Usuario</a></li>
                            <li class="nav-item"><a href="datos_admin/PerfilAdmin.php"class="nav-link">Perfil</a></li>
                        </ul>
                    </nav>
            </div>
                <div class="fotoPefil">
                    <a class="mostrarU" href="">
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
    </header>
    
    <hr>
    <div class="lista">
        <h1>Administar Usuarios</h1>
      <h1><?php echo  $_SESSION['NOMBRE']?></h1>
       
        <br>
        <hr>
    </div>
                    <!-- Button trigger modal -->
    <div class="container-fluid">
        <div class="justify-content-center row">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_Crear_Usuario">Crear usuario</button>
        </div>                 
            <br>               
     </div>                   
                   
     <!-- Tabla de usuarios -->
    <div class="container-fluid">
        <div class="justify-content-center row">
            <table class="table" id="usuarioRegistrados">
                <thead>
                    <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Password</th>
                    <th scope="col">Administrador</th>
                    </tr>
                </thead>
                <tbody>
                        
                </tbody>
            </table>
            
        </div>   
    </div>

                    <!-- Modal1 -->
    <div class="modal fade" id="modal_Crear_Usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_Crear_Usuario">Registrar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="" method="post" id="modalr">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Nombre" placeholder="Nombre" type="text" class="form-control" name="Nombre"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Apellido" placeholder="Apellido " type="text" class="form-control" name="Apellido"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Email" placeholder="Email" type="email" class="form-control" name="Email"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Usuario" placeholder="Usuario " type="text" class="form-control" name="Usuario"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Password" placeholder="Password" type="password" class="form-control" name="Password"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8">
                                        <select id="Administrador" class="form-control"  name="Administrador">
                                            <option>Elegir rol</option>
                                            <option value="1">Administrador</option>
                                            <option value="0">Usuario</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="justify-content-center row">
                                    <button onclick="limpiar_modal()" type="button" class="mr-4 btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" id="crear">Crear</button>
                                </div>
                    </div>
                </div>
                </form>
                </div>
        </div>
    </div>
                            <!-- end modal -->

                            <!-- Modal2 -->
    <div class="modal fade" id="modal_Editar_Usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Modal_Editar_Usuario">Editar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="modal_e">
                <div class="modal-body">
                            <div class="container-fluid">
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Nombre_e" placeholder="Nombre" type="text" class="form-control" name="Nombre"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Apellido_e" placeholder="Apellido " type="text" class="form-control" name="Apellido"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Email_e" placeholder="Email" type="email" class="form-control" name="Email"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Usuario_e" placeholder="Usuario " type="text" class="form-control" name="Usuario"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Password_e" placeholder="Password" type="password" class="form-control" name="Password"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8">
                                        <select id="Administrador_e" class="form-control"  name="Administrador">
                                            <option>Elegir rol</option>
                                            <option value="1">Administrador</option>
                                            <option value="0">Usuario</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="justify-content-center row">
                                    <button onclick="limpiar_modal()" type="button" class="mr-4 btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" id="Editar">Editar</button>
                                </div>
                    </div>
                </div>
            
            </form>
        </div>
    </div>
    </div>  
                                <!-- end modal -->
                            
    
   
    <script src="../js/librerias/jquery-3.3.1.min.js"></script>
    <script src="../js/logica/admin_Usuario.js"></script>
    <script src="../js/librerias/sweetalert2.js"></script>
    <script src="../js/librerias/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/datatables.min.js"></script>
</body>

</html>