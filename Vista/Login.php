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
                    <p>Registrarse para que puedas inicar sesión.</p>
                    <button id="btn_registrar">Registarse</button>
                </div>
            </div>

            <!--formulario_login-->

            <div class="container_logins-registers">
            <form action="../controlador/accion/ac_login.php" method="POST" class="formulario_login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Email" name="Email">
                    <input type="password" placeholder="Password" name="Password">
                    <p class ="forget">
                        ¿Has olvidado tu password?
                        <a href="recuperar_password.html">recuperar password</a>
                    </p>
                    <button>Entrer</button>
                </form>
                <!--formulario_register-->

                <form action="../controlador/accion/ac_registroUsuario.php"  method="POST"
                 class="formulario_register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre" name="Nombre">
                    <input type="text" placeholder="Apellido" name="Apellido">
                    <input type="text" placeholder="Email" name="Email">
                    <input type="text" placeholder="Usuario" name="Usuario">
                    <input type="password" placeholder="Password" name="Password">
                    <button>Registrarse</button>
                  
                </form>
            </div>
        </div>
    </main>
    <script src="js/script_login.js"></script>
</body>

</html>