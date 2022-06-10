
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvidado_Password</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../css/EstiloLogin.css">
</head>

<body class ="text center">
    
    <div class="form-signin"><img src="../img/logo_hack/logo3.png" width="410">
        <h1 class="h3 mb-3 font-weight-normal">¿olvido Password?</h1>
        <input name="Email" type="text" id="Email" class="form-control" placeholder="">

        <div class="row">
            <button id="btn_Enviar" class="btn btn-lg btn-primary btn-block">
                <h8>ENVIAR</h8>
            </button>
            <div class="col-ms">
                <button id="btn_Cancelar" class="btn btn-lg btn-primary btn">
                    <h8>CANCELAR</h8>
                </button>
            </div>
        </div>

    <script src="../js/librerias/jquery-3.3.1.min.js"></script>
    <script src="../js/librerias/bootstrap.min.js"></script>
    <script src="../js/librerias/bootstrap.bundle.min.js"></script>
    <script src="../js/librerias/sweetalert2.js"></script>
    <script src="../js/logica/olvidocontrasena.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</body>
</html>