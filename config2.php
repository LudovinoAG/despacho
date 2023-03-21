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
    <link rel="stylesheet" href="css/configGold.css" id='linkEstilo_config'>

    <title>Despacho - Configurar</title>
</head>
<body>
<div class='container'>
    <header class='encabezado'>
        <div class='row'>
            <div class='col-1'>
                <img class='logo' src="pics/logo.png" alt="logo">
            </div>

            <div class='col-5 info'>
                <span class='nombre_aplicacion'>DDST Data <span>Despacho</span></span>
                <span class='nombre_company'>SOPORTE A TECNICOS</span>
            </div>

            <div class='col-6'>
                <span class='usuario'><?php include_once('login_partial.php'); ?></span>
                <span class='fecha'><?php include_once('DATE.php'); ?></span>
                <input id='txtTarjeta' type="hidden" value="<?php echo $_SESSION['tarjeta'];?>">
            </div>
        </div>
    </header>

    <nav class='menu_bar'>
        <ul>
        <?php if($_SESSION['puesto']=='Agente'){?>
                <li><a href="index.php">INICIO</a></li>
                <li><a href="llamadas.php">LLAMADA</a></li>
                <li class='activado'><a href="config.php">CONFIGURAR</a></li>
            <?php } elseif($_SESSION['puesto']=='Supervisor' || $_SESSION['puesto']=='Lider'){?>
                <li><a href="index.php">INICIO</a></li>
                <li><a href="llamadas.php">LLAMADA</a></li>
                <li class='activado'><a href="config.php">CONFIGURAR</a></li>
                <li><a href="report.php">REPORTES</a></li>
            <?php } elseif($_SESSION['puesto']=='Administrador'){?>
                <li><a href="index.php">INICIO</a></li>
                <li><a href="llamadas.php">LLAMADA</a></li>
                <li class='activado'><a href="config.php">CONFIGURAR</a></li>
                <li><a href="report.php">REPORTES</a></li>
                <li><a href="admin.php">ADMINISTRAR</a></li>
            <?php } ?>
        </ul>
    </nav>

    <div class='contenido'>
        <div class='row'>
            <div class='col-lg-8'>
        
                <section>
                    <h5><i class="fas fa-cogs"></i> CONFIGURACIÓN</h5>
                    <div class='card config'>
                        <div class='card-header config_title'>
                            Datos Personales
                        </div>
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col-lg-3 col-md-3 col-sm-3'>
                                    <div class='form-group'>
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="txtFechaNac" maxlength='10' >
                                            <label for="txtFechaNac"><i class="fas fa-calendar"></i> Fecha Nacimiento</label>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-lg-3 col-md-3 col-sm-3'>
                                    <div class='form-group'>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="txtTelCel" maxlength='15' >
                                            <label for="txtTelCel"><i class="fas fa-mobile-alt"></i> Tel. Celular</label>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-lg-4 col-md-4 col-sm-4'>
                                    <div class='form-group'>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="txtEmail" maxlength='60' >
                                            <label for="txtEmail"><i class="fas fa-email"></i> Email</label>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-lg-2 col-md-2 col-sm-2'>
                                    <div class='form-group'>
                                        <div class="form-floating">
                                            <input type="hidden" id='txtTarjeta' value="<?php echo $_SESSION['tarjeta']; ?>">
                                            <button name='bth_gurdar_personal' id='bth_gurdar_personal' type="button" class="btn btn-outline-secondary">GUARDAR<i class="far fa-check-circle"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class='card config'>
                        <div class='card-header config_title'>
                            Cambio de contraseña
                        </div>
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col-lg-3 col-md-3 col-sm-3'>
                                    <div class='form-group'>
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="txtPasswordActual" maxlength='50' >
                                            <label for="txtPasswordActual"><i class="fas fa-unlock"></i> Contraseña actual</label>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-lg-3 col-md-3 col-sm-3'>
                                    <div class='form-group'>
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="txtPasswordNew" maxlength='50' >
                                            <label for="txtPasswordNew"><i class="fas fa-key"></i> Contraseña nueva</label>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-lg-4 col-md-4 col-sm-4'>
                                    <div class='form-group'>
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="txtPasswordRepite" maxlength='50' >
                                            <label for="txtPasswordRepite"><i class="fas fa-key"></i> Confirmar nueva contraseña</label>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-lg-2 col-md-2 col-sm-2'>
                                    <div class='form-group'>
                                        <div class="form-floating">
                                            <button name='bth_guardar_clave' id='bth_guardar_clave' type="button" class="btn btn-outline-secondary">GUARDAR<i class="far fa-check-circle"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class='card config'>
                        <div class='card-header config_title'>
                            Apariencia
                        </div>
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col-lg-4 col-md-4 col-sm-4'>
                                    <div class='form-group'>
                                        <div class="form-floating">
                                            <select class="form-select " id="lstApariencia" aria-label="Seleccione">
                                                <option selected>Elegir uno</option>
                                                <option value="1">Predeterminado</option>
                                                <option value="2">Rosado</option>
                                                <option value="3">Azul</option>
                                                <option value="4">Gold</option>
                                            </select>
                                            <label class='control-label' for="lstApariencia"><i class="fas fa-brush"></i> Colores</label>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-lg-4 col-md-4 col-sm-4'>
                                    <div class='form-group'>
                                        <div class="form-floating">
                                            <div class='form-control Color_Preview' id='Color_Preview'></div>
                                            <label class='control-label' for="Color_Preview"><i class="fas fa-palette"></i> Previsualización</label>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-lg-2 offset-lg-2 offset-md-10'>
                                    <div class='form-group'>
                                        <div class="form-floating">
                                            <button name='bth_guardar_Apariencia' id='bth_guardar_Apariencia' type="button" class="btn btn-outline-secondary">APLICAR<i class="far fa-check-circle"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <div class='col-lg-4'>
                <aside>
                    

                </aside>
            </div>

        </div>
        <div class='row'>
            <div class='col-lg-12'>
                <footer>
                    <p>Todos los derechos reservados, Soporte a tecnicos 2022</p>
                    <p class='copy'>Desarrollado por Ludovino Guzmán</p>
                </footer>
            </div>
        </div>
    </div>
</div>








</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</html>