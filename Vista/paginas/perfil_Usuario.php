<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perfil de usuario</title>
    <link rel="stylesheet" href="../css/style_usuario.css">
 </head>

<body>
    <header>
        <div class="container_header">
            <a class="logo" href="index.html">
                <img src="../img/logo_hack/logo3.png" alt="">
            </a>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="https://dortania.github.io/OpenCore-Install-Guide/">Guia Dortania</a></li>
                        <li><a href="mac_os.html">Mac Os</a></li>
                        <li><a href="Descargas.html">Descargas</a></li>
                        <li><a href="productos.html">Productos</a></li>
                        <li><a href="Tienda.html">Tienda</a></li>
                        <li><a href="Contactos.html">Contactos</a></li>
                        <li><a href="/pica_fija/index_pica_fija.html">pica y fija</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <hr>
    <div class="cuerpo">
        <div class="articles_izq">
            <div class="editar">
                <form action="" class="EDITAR">
                    <h1>Editar</h1>
                    <input type="text" placeholder="Nombre completo" name="nombre_completo">
                    <input type="text" placeholder="Correo Electronico" name="correo_electronico">
                    <input type="text" placeholder="Usuario" name="usuario">
                    <input type="password" placeholder="contraseña" name="contrasena">
                    <input type="password" placeholder="confirmar contraseña" name="contrasena">
                    <button class="Guardar"> Guardar</button>
                    <button class="Deshacer"> Deshacer</button>
                </form>
            </div>
        </div>
        <div class="article_foto">
            <div class="foto_perfil">
                <h2>Foto de perfil</h2>
                <div class="box_img_user">
                    <img src="../img/persona/usurio.png" >
                </div>
            </div>
            <div class="article_datos_usuario">
                <div class="infromacion_perfil">
                    <form action="" class="Informacion">
                        <h1>Datos del usuario</h1>
                        <h5>
                            Nombre Completo
                        </h5>
                        <input type="text" placeholder="Nombre completo" name="nombre_completo">
                        <h5>
                            Emial
                        </h5>
                        <input type="text" placeholder="correo Electronico" name="correo_electronico">
                        <h5>
                            Nombre de usuario
                        </h5>
                        <input type="text" placeholder="Usuario" name="usuario">
                    </form>

                    <div class="perosna">
                        <div class="box_img_per">
                            <img src="../img/persona/per002.png">
                        </div>
                    </div>
                    </div>
                    <br>
                    <hr>
                    <div class="article_tarjeta_pagos">
                        <div class="tarjeta">
                            <form action="" class="DatosTarjeta">
                                <h1>Datos medio de pagos </h1>
                                <h5>
                                    Numero de Tarjeta
                                </h5>
                                <input type="text" placeholder="Numero de Tarjeta" name="NumeroTarjeta">
                                <h5>
                                    Email
                                </h5>
                                <input type="text" placeholder="correo Electronico" name="correo_electronico">
                                <h5>
                                    Nombre de Titular
                                </h5>
                                <input type="text" placeholder="Titular" name="Titular">
                                <h5>
                                    Direccion
                                </h5>
                                <input type="text" placeholder="Direccion" name="Direccion">

                                <button class="ediatr"> Editar</button>
                                <button class="quitar">Quitar</button>
                            </form>
                            <div class="img_tarjeta">
                                <div class="box_tarjeta">
                                    <img src="../img/logo_hack/credit-card.png">
                                </div>
                            </div>
                        </div>

                    </div>

</body>

</html>