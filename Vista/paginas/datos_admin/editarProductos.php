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
    <title>Adminstrador de productos </title>
    <script src="https://kit.fontawesome.com/bd0578e771.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style_admin_Prodcuto.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="../../css/bootstrap-reboot.min.css">

</head>

<body>
    <header>
       
            <div class="company-logo"><a class="logo" href="../pefil_admin.php">
                <img src="../../img/logo_hack/logo3.png" alt="">
                 </a>
                </div>
            <nav class="navbar">
                    <ul class="nav-items">
                        <li class="nav-item"><a href="editarProductos.php"class="nav-link">Editar Productos</a></li>
                        <li class="nav-item"><a href="../perfil_admin.php"class="nav-link">Administrad Usuario</a></li>
                    </ul>
                    <h1>
                        <a href="perfilAdmin.php" class="nav-link"><?php echo $_SESSION['NOMBRE']?></a></h1>
                <div class="fotoPefil">
                    <a class="mostrarU" href="">
                        <img src="../../img/logo_hack/logo2.png" alt="fotoPefil">
                    </a>
                </div>
                
                        <div>
                
                    
                    <div class="header_registro">
                        <a href="../../login.php">
                            <div class="btn_cerrar">
                                <input type="button" class="btn_close_login" value="Salir">
                            </div>
                        </a>
                    </div>
                </div>
                </nav>
               
                <div class="menu-toggle">
                     <i class="bx bx-menu"></i>
                     <i class="bx bx-x"></i>
               
            
                    
    </header>
   
    <hr>
    <div class="lista">
        <h1>Datos de Productos</h1>
        <div class="table">
        <div class="container-fluid">
        <div class="justify-content-center row">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_Crear_Producto">CREAR PRODUCTO</button>
        </div>                 
            <br>               
     </div>                   
                   
    <div class="container-fluid">
        <div class="justify-content-center row">
            <table class="table" id="Producto_Registrado">
                <thead>
                    <tr>
                    <th scope="col">MARCA</th>
                    <th scope="col">MODELO</th>
                    <th scope="col">FECHA DE INGRESO</th>
                    <th scope="col">CANTIDAD DISPONIBLE</th>
                    <th scope="col">PRECIO</th>
                    <th scope="col">CODIGO</th>
                    </tr>
                </thead>
                <tbody>
                        
                </tbody>
            </table>
            
        </div>   
    </div>

                    <!-- Modal1 crear productos-->
    <div class="modal fade" id="modal_Crear_Producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_Crear_Producto">Registrar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="../../../controlador/accion/ac_Registro_Productos.php" method="post">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Marca" placeholder="Marca" type="text" class="form-control" name="Marca"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Modelo" placeholder="Modelo" type="text" class="form-control" name="Modelo"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Fecha_Ingreso" placeholder="Fecha_Ingreso" type="datetime" class="form-control" name="Fecha_Ingreso"></div>
                                </div>
                                
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Cantidad" placeholder="Cantidad" type="text" class="form-control" name="Cantidad"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Precio" placeholder="Precio" type="integer" class="form-control" name="Precio"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="codigo" placeholder="Codigo" type="integer" class="form-control" name="Codigo"></div>
                                </div>
                                
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8">
                                        
                                    </div>
                                </div>

                                <div class="justify-content-center row">
                                    <button type="button" class="mr-4 btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" id="crear">Ingresar</button>
                                </div>
                    </div>
                </div>
                </form>
                </div>
        </div>
    </div>
                            <!-- end modal -->

                            <!-- Modal2 editar productos -->
    <div class="modal fade" id="modal_Editar_Producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Modal_Editar_Producto">Editar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../../controlador/accion/ac_editar_Productos.php" method="POST">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div style="padding:7px 0;" class="justify-content-center row">
                            <div class="col-md-8"><input placeholder="Marca" type="text" class="form-control" name="Marca"></div>
                            </div>
                            <div style="padding:7px 0;" class="justify-content-center row">
                            <div class="col-md-8"><input placeholder="Modelo" type="text" class="form-control" name="Modelo"></div>
                            </div>
                            <div style="padding:7px 0;" class="justify-content-center row">
                            <div class="col-md-8"><input placeholder="Fecha_Ingreso" type="datetime" class="form-control" name="Fecha_Ingreso"></div>
                            </div>
                            <div style="padding:7px 0;" class="justify-content-center row">
                            <div class="col-md-8"><input placeholder="Cantidad" type="text" class="form-control" name="Cantidad"></div>
                            </div>
                            <div style="padding:7px 0;" class="justify-content-center row">
                            <div class="col-md-8"><input placeholder="Precio" type="integer" class="form-control" name="Precio"></div>
                            </div>
                            <div style="padding:7px 0;" class="justify-content-center row">
                            <div class="col-md-8"><input placeholder="Codigo" type="text" class="form-control" name="Codigo"></div>
                            </div>
                            
                            <br>
                        </div>
                        <input hidden type="number" class="form-control" name="idProducto">
                            <div class="justify-content-center row">
                                <button type="button" class="mr-4 btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            </div>
            
            </form>
        </div>
    </div>
    </div>  

        </div>

    </div>
    <script src="../../js/librerias/jquery-3.3.1.min.js"></script>
    <script src="../../js/logica/admin_Productos.js"></script>
    <script src="../../js/librerias/sweetalert2.js"></script>
    <script src="../../js/librerias/bootstrap.bundle.min.js"></script>
</body>

</html>