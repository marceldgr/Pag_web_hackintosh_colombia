<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perfil de usuario</title>
    <link rel="stylesheet" href="../../css/style_perfil_admin.css">
</head>

<body>
    <header>
        <div class="container_header">
            <a class="logo" href="../perfil_admin.php"><img src="../../img/logo_hack/logo3.png" alt=""></a>
           
            <div class="menu">
                <nav class="navbar"> 
                    <ul class="nav-items">
                        <li class="nav-item"><a href="editarProductos.php"class="nav-link">Editar Productos</a></li>
                        <li class="nav-item"><a href="../perfil_admin.php"class="nav-link">Administrad Usuario</a></li>
                        <li class="nav-item"><a href="PerfilAdmin.php"class="nav-link">Perfil</a></li>
                    </ul>
                </nav>

            </div>
            <i class="fa-solid fa-bars" id="icon_menu"></i>
            <div class="header_registro">
                <a href="../../../Vista/Login.php">
                    <div class="btn_logins">
                        <input type="button" class="btn_login" value="Salir">
                    </div>
                </a>
            </div>
        </div>
    </header>
    <br>
    <br>
    <hr>
    <!--cuerpo-->
    <div class="CUERPOS">
        <div class="cuerpo1"> 
            <br>
            <input type="checkbox" class="toggle-check" id="toggle" hidden>
            <label class="toggle" for="toggle">Editar perfil</label>
            <div class="containerEditar">
                <div class="editar">
                    <form action="" class="EDITAR" method="POST" id="datos">
                        <h1>Editar</h1>
                        <input type="text" id="Nombre" placeholder="Nombre" name="Nombre" value=<?php echo  $_SESSION['NOMBRE']?> >
                        <input type="text" id="Apellido" placeholder="Apellido" name="Apellido" value=<?php echo  $_SESSION['APELLIDO']?> >
                        <input type="text" id="Email" readOnly = true placeholder="Correo Electronico" name="Email" value=<?php echo  $_SESSION['EMAIL']?> >
                        <input type="text" id="Usuario" placeholder="Usuario" name="Usuario" value=<?php echo  $_SESSION['USUARIO']?>>
                        <input type="password" id="Password" placeholder="contraseña" name="password">
                        <input id="id_usuario" name="prodId" type="hidden" value=<?php echo  $_SESSION['ID_USUARIO']?>>
                        <input id="Adm" name="prodId" type="hidden" value=<?php echo  $_SESSION['ADMIN']?>>
                        <input id="foto_perfil" name="prodId" type="hidden" value=<?php echo  $_SESSION['FOTO']?>>
                        <button class="Guardar"> Guardar</button>
                        <button class="Deshacer"> Deshacer</button>
                    </form>
                </div>
            
            </div>
    
                    <br>
   
                    <!--segundo cuerpo -->
                    <div class="article_foto">
                        <div class="foto_perfil">
                            <h2><?php echo  $_SESSION['NOMBRE']?></h2>
                            <div class="box_img_user">
                                <img src=<?php echo "../../img/img_perfil_usuarios/".$_SESSION['FOTO']?> id="img_perfil">
                                <form id="frm_foto" action="post" enctype="multipart/form-data" action="#">
                                    <input type="file" id="nueva_foto" name="nueva_foto">
                                </form>
                            </div>
                            
                            <div class="infromacion_perfil">
                                
                                <form action="" class="Informacion">
                                    <h1>Datos del usuario</h1>
                                    <h5>Nombre Completo</h5>
                                    <input type="text" placeholder="Nombre" name="nombre_completo" value=<?php echo  $_SESSION['NOMBRE']?>>
                                    <h5>Apellido</h5>
                                    <input type="text" placeholder="Apellido" name="Apelledio" value=<?php echo  $_SESSION['APELLIDO']?>>
                                    <h5>Emial</h5>
                                    <input type="text" placeholder="correo Electronico" name="correo_electronico" value=<?php echo  $_SESSION['EMAIL']?> >
                                    <h5>Nombre de usuario</h5> 
                                    <input type="text" placeholder="Usuario" name="usuario" value=<?php echo  $_SESSION['USUARIO']?>>
                                </form>
                            </div>
                            
                        </div>
                    </div>
            
        </div>
            <div class="container_admin_img">
                <img src="../../img/persona/per0001.png">
            </div>
            <!--**************************************************************-->
    </div>        
       
            

        
    <script src="../../js/librerias/jquery-3.3.1.min.js"></script>
    <script src="../../js/perfil_admin.js"></script>
    <script src="../../js/librerias/sweetalert2.js"></script>
    <script src="../../js/librerias/sweetalert.min.js"></script>   
</body>
</html>