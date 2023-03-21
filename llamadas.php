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
    <link rel="stylesheet" href="css/llamadas.css" id="linkEstilo_llamada">

    <title>Despacho - Llamadas</title>
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
                <input id='idEmpleado' type="hidden" value=<?php echo $_SESSION["id"]; ?>>
            </div>
        </div>
    </header>

    <nav class='menu_bar'>
        <ul>
        <?php if($_SESSION['puesto']=='Agente'){?>
                <li><a href="index.php">INICIO</a></li>
                <li class='activado'><a href="llamadas.php">LLAMADA</a></li>
                <li><a href="config.php">CONFIGURAR</a></li>
            <?php } elseif($_SESSION['puesto']=='Supervisor' || $_SESSION['puesto']=='Lider'){?>
                <li><a href="index.php">INICIO</a></li>
                <li class='activado'><a href="llamadas.php">LLAMADA</a></li>
                <li><a href="config.php">CONFIGURAR</a></li>
                <li><a href="report.php">REPORTES</a></li>
            <?php } elseif($_SESSION['puesto']=='Administrador'){?>
                <li><a href="index.php">INICIO</a></li>
                <li class='activado'><a href="llamadas.php">LLAMADA</a></li>
                <li><a href="config.php">CONFIGURAR</a></li>
                <li><a href="report.php">REPORTES</a></li>
                <li><a href="admin.php">ADMINISTRAR</a></li>
            <?php } ?>
        </ul>
    </nav>

    <div class='contenido'>
        <div class='row'>
            <div class='col-lg-8'>
        
                <section>
                    <h6> <i class="far fa-file"></i> REGISTRAR LLAMADA</h6>
                    <form name='frmRegistro' id='frmRegistro' method="post">
                        <div class='row'>
                            <div class='col-lg-4 col-md-4 col-sm-4 contenedor'>
                                <div class='form-group'>
                                    <div class="form-floating">
                                        <select class="form-select " id="lstRazon" aria-label="Seleccione">
                                            <option value='0'>Elegir una</option>

                                        </select>
                                        <label class='control-label' for="lstRazon"><i class="far fa-question-circle"></i> Razón de la Llamada</label>
                                    </div>
                                </div>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-4 contenedor'>
                                <div class='form-group'>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtNombre" maxlength='70' >
                                        <label for="txtNombre"><i class="fas fa-file-signature"></i> Nombre</label>
                                    </div>
                                </div>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-4 contenedor'>
                                <div class='form-group'>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtCodigo" maxlength='10' >
                                        <label for="txtCodigo"><i class="far fa-id-card"></i> Codigo Empleado</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col-lg-4 col-md-4 col-sm-4 contenedor'>
                                <div class='form-group'>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtTelefono" maxlength='15' >
                                        <label for="txtTelefono"><i class="fas fa-phone"></i> Telefono</label>
                                    </div>
                                </div>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-4 contenedor'>
                                <div class='form-group'>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtOsadia" maxlength='7' >
                                        <label for="txtOsadia"><i class="fas fa-tag"></i> Osadia</label>
                                    </div>
                                </div>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-4 contenedor'>
                                <div class='form-group'>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtM6" maxlength='7' >
                                        <label for="txtM6"><i class="fas fa-file-signature"></i> M6</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col-lg-4 col-md-4 col-sm-4 contenedor'>
                                <div class='form-group'>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtSerialModem" maxlength='25' >
                                        <label for="txtSerialModem"><i class="fas fa-barcode"></i> Serial del Modem</label>
                                    </div>
                                </div>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-4 contenedor'>
                                <div class='form-group'>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtTowncode" maxlength='15' >
                                        <label for="txtTowncode"><i class="fas fa-file-signature"></i> Town Code</label>
                                    </div>
                                </div>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-4 contenedor'>
                                <div class='form-group'>
                                    <div class="form-floating">
                                        <select class="form-select " id="LstPueblos" aria-label="Seleccione">
                                            <option value=0>Elegir uno</option>
                                            <option value=1>Adjuntas</option>
                                            <option value=2>Aguada</option>
                                            <option value=3>Aguadilla</option>
                                            <option value=4>Aguas Buenas</option>
                                            <option value=5>Aibonito</option>
                                            <option value=6>Añasco</option>
                                            <option value=7>Arecibo</option>
                                            <option value=8>Arroyo</option>
                                            <option value=9>Barceloneta</option>
                                            <option value=10>Barranquitas</option>
                                            <option value=11>Bayamón</option>
                                            <option value=12>Cabo Rojo</option>
                                            <option value=13>Caguas</option>
                                            <option value=14>Camuy</option>
                                            <option value=15>Canóvanas</option>
                                            <option value=16>Carolina</option>
                                            <option value=17>Cataño</option>
                                            <option value=18>Cayey</option>
                                            <option value=19>Ceiba</option>
                                            <option value=20>Ciales</option>
                                            <option value=21>Cidra</option>
                                            <option value=22>Coamo</option>
                                            <option value=23>Comerío</option>
                                            <option value=24>Corozal</option>
                                            <option value=25>Culebra</option>
                                            <option value=26>Dorado</option>
                                            <option value=27>Fajardo</option>
                                            <option value=28>Florida</option>
                                            <option value=29>Guánica</option>
                                            <option value=30>Guayama</option>
                                            <option value=31>Guayanilla</option>
                                            <option value=32>Guaynabo</option>
                                            <option value=33>Gurabo</option>
                                            <option value=34>Hatillo</option>
                                            <option value=35>Hormigueros</option>
                                            <option value=36>Humacao</option>
                                            <option value=37>Isabela</option>
                                            <option value=38>Jayuya</option>
                                            <option value=39>Juana Díaz</option>
                                            <option value=40>Juncos</option>
                                            <option value=41>Lajas</option>
                                            <option value=42>Lares</option>
                                            <option value=43>Loíza</option>
                                            <option value=44>Luquillo</option>
                                            <option value=45>Manatí</option>
                                            <option value=46>Las Marías</option>
                                            <option value=47>Maricao</option>
                                            <option value=48>Maunabo</option>
                                            <option value=49>Mayagüez</option>
                                            <option value=50>Moca</option>
                                            <option value=51>Morovis</option>
                                            <option value=52>Naguabo</option>
                                            <option value=53>Naranjito</option>
                                            <option value=54>Orocovis</option>
                                            <option value=55>Patillas</option>
                                            <option value=56>Peñuelas</option>
                                            <option value=57>Las Piedras</option>
                                            <option value=58>Ponce</option>
                                            <option value=59>Quebradillas</option>
                                            <option value=60>Rincón</option>
                                            <option value=61>Río Grande</option>
                                            <option value=62>Sabana Grande</option>
                                            <option value=63>Salinas</option>
                                            <option value=64>San Germán</option>
                                            <option value=65>San Juan</option>
                                            <option value=66>San Lorenzo</option>
                                            <option value=67>San Sebastián</option>
                                            <option value=68>Santa Isabel</option>
                                            <option value=69>Toa Alta</option>
                                            <option value=70>Toa Baja</option>
                                            <option value=71>Trujillo Alto</option>
                                            <option value=72>Utuado</option>
                                            <option value=73>Vega Alta</option>
                                            <option value=74>Vega Baja</option>
                                            <option value=75>Vieques</option>
                                            <option value=76>Villalba</option>
                                            <option value=77>Yabucoa</option>
                                            <option value=78>Yauco</option>
                                            <option value=79>N/A</option>
                                        </select>
                                        <label class='control-label' for="LstPueblos"><i class="fas fa-map-marker-alt"></i> Pueblo</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class='row'>
                            

                            <div class='col-lg-6 col-md-4 col-sm-4 contenedor'>
                                <div class='form-group'>
                                   <div class="form-floating">
                                        <input type="text" class="form-control" id="txtCanal" maxlength='10' >
                                        <label for="txtCanal"><i class="fas fa-file-signature"></i> Compañia/Canal</label>
                                    </div>
                                </div>
                            </div>

                            <div class='col-lg-6 col-md-4 col-sm-4 contenedor'>
                                <div class='form-group'>
                                    <div class="form-floating">
                                        <select class="form-select " id="LstSolucion" aria-label="Seleccione">
                                            <option>Elegir una</option>
                                        </select>
                                        <label class='control-label' for="LstSolucion"><i class="far fa-check-square"></i> Solución</label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class='row'>
                            <div class='col-lg-6 col-md-6 col-sm-6 contenedor'>
                                <div class='form-group'>
                                    <button type="button" class="btn btn-outline-dark" id='btn_Registrar'>REGISTRAR<i class="far fa-check-circle"></i></button>
                                    <button type="button" class="btn btn-outline-danger" id='btn_Borrar'>BORRAR<i class="fas fa-broom"></i></button>
                                    
                                </div>
                            </div>
                            <div class='col-lg-6 col-md-6 col-sm-6 contenedor'>
                                <div class='form-group card Contenido_Info'>
                                    <div class="card-body">
                                    <strong>Frase del dia: </strong>
                                    La gente positiva es la que se cae, se levanta, se sacude, 
                                    se cura los raspones, sonríe a la vida y dice: "Allá voy de nuevo"
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>

            </div>

            <div class='col-lg-4'>
                <aside>
                    <h6><i class="far fa-chart-bar"></i> MIS ESTADÍSTICAS DE HOY</h6>
                        <div class='card contenido_estadistica'>
                            <div class='card-header'>
                                <div class='row'>
                                    <div class='col-lg-4 col-md-4 col-sm-4'>
                                        <img src="http://intranet2/fotos/<?php echo $_SESSION['tarjeta'].".jpg";?>">
                                    </div>
                                    <div class='col-lg-8 col-md-8 col-sm-4 info1_Statistics'>
                                        <span class='Statistic_name'><?php echo $_SESSION['Nombre'];?> </span>
                                        <span class='Statistic_id'><?php echo $_SESSION['tarjeta'];?> </span>
                                        <span class='Statistic_puesto'><?php echo $_SESSION['puesto'];?> </span>
                                    </div>
                                </div>
                            </div>
                            <div class='card-body datas_div'>
                                <span>Registradas
                                    <div id='DataRegistrada' class='data'>
                                        0
                                    </div>
                                </span>
                                <span>Portal Comp.
                                    <div id='DataCompletadas' class='data'>
                                        0
                                    </div>
                                </span>
                                <span>Portal Ref.
                                    <div id='DataReferidos' class='data'>
                                        0
                                    </div>
                                </span>
                                <span>Transfers
                                    <div id='DataTransfer' class='data'>
                                        0
                                    </div>
                                </span>
                            </div>

                            <div class='card-body datas_div'>
                                <span>Información
                                    <div id='DataInformacion' class='data'>
                                        0
                                    </div>
                                </span>
                                <span>Citas
                                    <div id='DataCitas' class='data'>
                                        0
                                    </div>
                                </span>
                                <span>Escalados
                                    <div id='DataEscalados' class='data'>
                                        0
                                    </div>
                                </span>
                                <span>Clericals
                                    <div id='DataClericals' class='data'>
                                        0
                                    </div>
                                </span>
                            </div>

                            <div class='card-body datas_div'>
                                <span>Ruta ON
                                    <div id='DataRutaON' class='data'>
                                        0
                                    </div>
                                </span>
                                <span>Ruta OFF
                                    <div id='DataRutaOFF' class='data'>
                                        0
                                    </div>
                                </span>
                                <span>Muda
                                    <div id='DataMuda' class='data'>
                                        0
                                    </div>
                                </span>
                                <span>String
                                    <div id='DataString' class='data'>
                                        0
                                    </div>
                                </span>
                            </div>

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








</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</html>