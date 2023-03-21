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
    <link rel="stylesheet" href="css/admin.css" id='linkEstilo_admin'>
    <title>Despacho - Admin</title>
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
            <?php
                if($_SESSION["puesto"]=='Administrador'){
            ?>
        </div>
    </header>

    <nav class='menu_bar'>
        <ul>
        <?php if($_SESSION['puesto']=='Agente'){?>
                <li><a href="index.php">INICIO</a></li>
                <li><a href="llamadas.php">LLAMADA</a></li>
                <li><a href="config.php">CONFIGURAR</a></li>
            <?php } elseif($_SESSION['puesto']=='Supervisor' || $_SESSION['puesto']=='Lider'){?>
                <li><a href="index.php">INICIO</a></li>
                <li><a href="llamadas.php">LLAMADA</a></li>
                <li><a href="config.php">CONFIGURAR</a></li>
                <li><a href="report.php">REPORTES</a></li>
            <?php } elseif($_SESSION['puesto']=='Administrador'){?>
                <li><a href="index.php">INICIO</a></li>
                <li><a href="llamadas.php">LLAMADA</a></li>
                <li><a href="config.php">CONFIGURAR</a></li>
                <li><a href="report.php">REPORTES</a></li>
                <li class='activado'><a href="admin.php">ADMINISTRAR</a></li>
            <?php } ?>
        </ul>
    </nav>

    <div class='contenido'>
        <div class='row'>
            <div class='col-lg-8'>
        
                <section>
                    <h5><i class="fas fa-users"></i> EMPLEADOS</h5>
                    <div id='form_empleados'>
                        <div class='row'>
                            <div class='col-lg-4 cont_employer'>
                                <div class='form-group'>
                                    <div class='form-floating'>
                                        <input type="text" class="form-control" id="txtTarjetaAdm" maxlength='6' onkeypress='return validarTeclado(event,1);' >
                                        <label for="txtTarjetaAdm"><i class="fas fa-id-card-alt"></i> Tarjeta</label>
                                    </div>
                                </div>
                            </div>

                            <div class='col-lg-4 cont_employer'>
                                <div class='form-group'>
                                    <div class='form-floating'>
                                        <input type="text" class="form-control" id="txtNombre" maxlength='25' onkeypress='return validarTeclado(event,2);' >
                                        <label for="txtNombre"><i class="fas fa-id-card-alt"></i> Nombre</label>
                                    </div>
                                </div>
                            </div>

                            <div class='col-lg-4 cont_employer'>
                                <div class='form-group'>
                                    <div class='form-floating'>
                                        <input type="text" class="form-control" id="txtApellido" maxlength='25' onkeypress='return validarTeclado(event,2);' >
                                        <label for="txtApellido"><i class="fas fa-id-card-alt"></i> Apellido</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col-lg-4 cont_employer'>
                                <div class='form-group'>
                                    <div class='form-floating'>
                                        <select class='form-select' name="lstSupervisor" id="lstSupervisor">
                                            <option value='0'>Elegir uno</option>
                                        </select>
                                        <label for="lstSupervisor"><i class="fas fa-user-shield"></i> Supervisor</label>
                                    </div>
                                </div>
                            </div>

                            <div class='col-lg-4 cont_employer'>
                                <div class='form-group'>
                                    <div class='form-floating'>
                                        <select class='form-select' name="lstPuesto" id="lstPuesto">
                                            <option value="0">Elegir uno</option>
                                        </select>
                                        <label for="lstPuesto"><i class="fas fa-user-tag"></i> Puesto</label>
                                    </div>
                                </div>
                            </div>

                            <div class='col-lg-4 cont_employer'>
                                <div class='form-group'>
                                    <div class='form-floating'>
                                        <input type="date" class="form-control" id="txtFechaNac" maxlength='50' >
                                        <label for="txtFechaNac"><i class="fas fa-calendar"></i> Fecha Nacimiento</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class='row'>
                            <div class='col-lg-6 cont_employer'>
                                <div class='form-group'>
                                    <div class='form-floating'>
                                        <textarea class='form-control' name="txtObservacion" id="txtObservacion" maxlength='100px'></textarea>
                                        <label for="lstSupervisor"><i class="fas fa-sticky-note"></i> Observación</label>
                                    </div>
                                </div>
                            </div>

                            <div class='col-lg-3 cont_employer'>
                                <div class='form-group'>
                                    <div class='form-floating'>
                                        <button id='btn_Add_Employer' class='btn btn-outline-secondary'><i class="fas fa-user-plus"></i> AGREGAR</button>
                                    </div>
                                </div>
                            </div>

                            <div class='col-lg-3 cont_employer'>
                                <div class='form-group'>
                                    <div class='form-floating'>
                                        <button class='btn btn-outline-secondary'><i class="fas fa-chalkboard"></i> LIMPIAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id='form_Supervisor'>
                        <div class='row'>
                            <h5 class='title_super'><i class="fas fa-users"></i> SUPERVISORES</h5>
                                <div class='col-lg-4 cont_employer'>
                                    <div class='form-group'>
                                    
                                        <div class='form-floating'>
                                            <input type="text" class="form-control" name='txtSuper_Nombre' id="txtSuper_Nombre" maxlength='25' >
                                            <label for="txtSuper_Nombre"><i class="fas fa-id-card-alt"></i> Nombre</label>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-lg-4'>
                                    <div class='form-group'>
                                        <div class='form-floating'>
                                            <input type="text" class="form-control" name='txtSuper_Apellido' id="txtSuper_Apellido" maxlength='25' >
                                            <label for="txtSuper_Apellido"><i class="fas fa-id-card-alt"></i> Apellido</label>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-lg-4 cont_employer'>
                                    <div class='form-group'>
                                        <div class='form-floating'>
                                            <select class='form-select' name="lstPuestoSuper" id="lstPuestoSuper">
                                                <option value="0">Elegir uno</option>
                                            </select>
                                        <label for="lstPuestoSuper"><i class="fas fa-user-tag"></i> Puesto</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col-lg-6 cont_employer'>
                                <div class='form-group'>
                                    <div class='form-floating'>
                                        <textarea class='form-control' name="txtSuper_Observacion" id="txtSuper_Observacion" maxlength='100px'></textarea>
                                        <label for="txtSuper_Observacion"><i class="fas fa-sticky-note"></i> Observación</label>
                                    </div>
                                </div>
                            </div>

                            <div class='col-lg-3 cont_employer'>
                                <div class='form-group'>
                                    <div class='form-floating'>
                                        <button id='btn_AgregarSupervisor' class='btn btn-outline-secondary'><i class="fas fa-user-plus"></i> AGREGAR</button>
                                    </div>
                                </div>
                            </div>

                            <div class='col-lg-3 cont_employer'>
                                <div class='form-group'>
                                    <div class='form-floating'>
                                        <button class='btn btn-outline-secondary'><i class="fas fa-chalkboard"></i> LIMPIAR</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                
                </section>

            </div>

            <div class='col-lg-4'>
                <aside>
                    <h6><i class="fas fa-users"></i> LISTA DE EMPLEADOS</h6>
                    <div class='listado_empleados'>
                        <?php 
                        include_once('dbcon.php');
                        $empleados = new dbEmpleados();
                        $empleados->loadEmpleados(); 
                        ?>
                    </div>
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

<?php }else{ ?>

    <h2 class='text-center'>NO TIENE PERMISO PARA VER ESTA SECCION</h2>

<?php }?>


</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</html>