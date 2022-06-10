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
                    <th scope="col">NOMBRE</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">IMAGEN</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">VENDIDOS</th>
                    <th scope="col">VALOR</th>
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
                    <form action="" method="post" id="modalr">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Nombre" placeholder="Nombre" type="text" class="form-control" name="Marca"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Descripcion" placeholder="Descripcion" type="text" class="form-control" name="Modelo"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="imagen" placeholder="imagen" type="datetime" class="form-control" name="Fecha_Ingreso"></div>
                                </div>
                                
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Stock" placeholder="Stock" type="text" class="form-control" name="Cantidad"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Vendidos" placeholder="Vendidos" type="integer" class="form-control" name="Precio"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Valor" placeholder="Valor" type="integer" class="form-control" name="Codigo"></div>
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
                <form action="" method="POST" id="modal_e">
                    <div class="modal-body">
                        <div class="container-fluid">
                        <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Nombre_e" placeholder="Nombre" type="text" class="form-control" name="Marca"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Descripcion_e" placeholder="Descripcion" type="text" class="form-control" name="Modelo"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="imagen_e" placeholder="imagen" type="datetime" class="form-control" name="Fecha_Ingreso"></div>
                                </div>
                                
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Stock_e" placeholder="Stock" type="text" class="form-control" name="Cantidad"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Vendidos_e" placeholder="Vendidos" type="integer" class="form-control" name="Precio"></div>
                                </div>
                                <div style="padding:7px 0;" class="justify-content-center row">
                                <div class="col-md-8"><input id="Valor_e" placeholder="Valor" type="integer" class="form-control" name="Codigo"></div>
                                </div>
                            
                            <br>
                        </div>
                        <input hidden type="number" class="form-control" name="idProducto">
                            <div class="justify-content-center row">
                                <button type="button" class="mr-4 btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Editar</button>
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