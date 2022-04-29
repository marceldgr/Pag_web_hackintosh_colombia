<?php
//if(!isset($_SESSION['ID_USUARIO'])){
  //  header("location:login.php");
//}
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
        <div class="container_header">
            <a class="logo" href="index.html">
                <img src="/Vista/img/logo_hack/logo3.png" alt="">
            </a>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="/Vista/paginas/editarProductos.html">Editar Productos</a></li>
                        <li><a href="/Vista/paginas/perfil_admin.html">Administrad Usuario</a></li>
                    </ul>
                </nav>
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
    <br>
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
                            <th>password</th>
                            <th>Rol</th>
                        </tr>
                        <tr>
                            <td>.</td>
                            <td>.</td>
                            <td>.</td>
                            <td>.</td>
                            <td>.</td>
                            <td>Adminstrador</td>
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