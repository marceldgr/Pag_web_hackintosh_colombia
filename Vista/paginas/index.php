<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hackintosh_Colombia</title>
    <script src="https://kit.fontawesome.com/bd0578e771.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style_index.css" >
</head>

<body>
    <header>
        <div class="container_header">
            <a class="logo" href="../paginas/index.php">
                <img src="../img/logo_hack/logo3.png" alt="">
            </a>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="https://dortania.github.io/OpenCore-Install-Guide/">GUIA DORTANIA</a></li>
                        <li><a href="../paginas/mac_os.html">Mac Os</a></li>
                        <li><a href="../paginas/Descargas.html">DESCARGAS</a></li>
                        <li><a href="../paginas/shop.php">SHOP</a></li>
                        <li><a href="../paginas/Contactos.html">CONTACTOS</a></li>
                        <li><a href="pica_fija/index_pica_fija.html">GAME</a>
                        </li>
                        <li><a href="../paginas/perfil_Usuario.php">PEFIL</a></li>
                    </ul>
                </nav>
              </div>
            <i class="fa-solid fa-bars" id="icon_menu"></i>
            <div class="fotoPefil">
                <?php echo  $_SESSION['NOMBRE']?>
            <a class="mostrarU" href="Vista/Login.php">
                <img src="../img/logo_hack/logo2.png" alt="fotoPefil">
            </a>
            <div class="header_registro">
                <a href="../../Vista/Login.php">
                    <div class="btn_logins">
                        <input type="button" class="btn_login" value="Salir">
                    </div>
                </a>
            </div>
            
    </div>
    </header>
    <br>
    <hr>
    <main>
          
        <div class="container">
            <h1>Hackitosh Colombia</h1>
            <div class="laptop">
                <img src="../img/Laptos/img0.png" alt="">
            </div>
        </div>
<br>
  
<!-- banner-->
        <div class="nostros">
         
            <h2>
                Bienvenidos
            </h2>
         
            <div class="container_baner">
                <div class="img_grupo">
                    <img src="../img/persona/img02.png" id="grupo_persona" alt="">
                </div>

                <div class="lapfondo">
                    <img src="../img/Laptos/laptop_fondo01.png" id="FondoLaptos" alt="">
                </div>

                <div class="texto_baner">
                    <h3>
                        En el 2022 iniciamos un proyecto para dar una guía en español para aquellas personas curiosa
                        que le gusta el mundo de la informática. Donde puede transforma tu equipo que usa windows a un
                        equipo que use el sistema operativo Mac OS como si fuera una Mac real en todo los aspecto de
                        trabajo
                        multimedia
                    </h3>
                </div>

            </div>
        </div>
    
    
</main>
    <script src="../js/Script.js"></script>
</body>

</html>