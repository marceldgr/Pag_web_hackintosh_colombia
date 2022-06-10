
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registo</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style_login.css">
   

</head>
<body>
    <main>
        <div class="container_all">
             <div class="box_trasera">
                <div class="box_logins">
                    <h3>¿ya tienes una cuenta?</h3>
                    <p>Inicar sesión para entrar.</p>
                    <button id="btn_iniciar_sesion">Iniciar Sesion</button>
                    <div class="red_social_buttons">
                        <button class="facebook"> facebook</button>   
                        <button class="google"> google</button>
                    </div>
                </div>
                <div class="box_registros">
                    <h3>¿Aún no tiene una cuenta?</h3>
                    <p>Registrate para que puedas inicar sesión.</p>
                    <button id="btn_registrar">Registarse</button>
                </div>
            </div>

            <!--"../controlador/ajax/ajaxLogin.php" method="POST" class="formulario_login" id="formulario_login"-->

            <div class="container_logins-registers">
            <form action=""  class="formulario_login" id="formlg">
                    <h2>Iniciar Sesión</h2>
                    <input name="Email" type="text" id="Email_log" class="from-controlador" placeholder=" Email" >

                    <input name="Password" type="password" id="password_log"  class ="form-control" placeholder="Password" >
                    
                    <p class ="forget">
                        ¿Has olvidado tu password?
                        <a href="paginas/olvidocontrasena.php" >recuperar password</a>
                    </p>
                    <input type="submit" value="Iniciar Sesion">
                   <!-- <button id="btnEntrar">Entrar</button>-->
                </form>
                
            
                <!--formulario_register-->

                <form action=""  method="POST" class="formulario_register" id="formrg">
                    <h2>Registrarse</h2>
                    <input name="Nombre" type="text" id="Nombre" class="form-control" placeholder="Nombre" >
                    <input name="Apellido" type="text" id="Apellido" class="form-control" placeholder="Apellido">
                    <input name="Email" type="Email" id="Email" class="form-control" placeholder="Email" >
                    <input name="Usuario" type="text" id="Usuario" class="form-control" placeholder="Usuario" >
                    <input name="Password" type="password" id="Password" class="form-control" placeholder="Password" >
                    <button>Registrarse</button>
                  
                </form>
            </div>
        </div>
    </main>
    <script src="js/librerias/jquery-3.3.1.min.js"></script>
    <script src="js/logica/login.js"></script>
    <script src="js/script_login.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="js/librerias/sweetalert2.js"></script>
    <script src="js/librerias/sweetalert.min.js"></script>
</body>

</html>