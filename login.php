<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <link rel="stylesheet" href="css/login.css">
    <title>Iniciar Sesión</title>
</head>
<body>
<div class='container div_contenido'>
    <div class='div_logo'>
        <div class='row'>
            <div class='col-lg-12'>
                <img src="pics/logo.png" alt="">
            </div>
        </div>

        <div class='row'>
            <div class='col-lg-12'>
                <span class='name_app'>DDST</span>
            </div>
        </div>
    </div>

    <div class='card div_login'>

        <div class='card-header'>
            <span class='title_login'><i class="far fa-id-card"></i> INICIAR SESION</span>
        </div>

        <div class='card-body'>

            <div class='row div_usuario'>
                <div class='col-lg-12'>
                    <div class='form-group'>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="txtUser" maxlength='6' onkeypress='return validarTeclado(event,1);'>
                            <label for="txtUser"><i class="fas fa-user"></i> ID de Usuario</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class='row div_clave'>
                <div class='col-lg-12'>
                    <div class='form-group'>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="txtPass" maxlength='30' >
                            <label for="txtPass"><i class="fas fa-key"></i> Contraseña</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class='row fila_msg'>
                <div class='col-lg-12 div_msg'>
                    <span class='msg' id='msg'>Bienvenid@</span>
                </div>
            </div>
        </div>

        <div class='card-footer div_botones'>
            <button id='bth_Acceder' class='btn btn-dark'>Acceder</button>
            <button id='bth_Recordar' class='btn btn-default'>Olvide Contraseña</button>
        </div>

    </div>

</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</html>