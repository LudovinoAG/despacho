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
    <link rel="stylesheet" href="css/reportGold.css" id='linkEstilo_report'>
    <title>Despacho - Reportes</title>
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
                if($_SESSION["puesto"]=='Administrador' || $_SESSION["puesto"]=='Supervisor' || $_SESSION["puesto"]=='Lider') {
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
                <li class='activado'><a href="report.php">REPORTES</a></li>
            <?php } elseif($_SESSION['puesto']=='Administrador'){?>
                <li><a href="index.php">INICIO</a></li>
                <li><a href="llamadas.php">LLAMADA</a></li>
                <li><a href="config.php">CONFIGURAR</a></li>
                <li class='activado'><a href="report.php">REPORTES</a></li>
                <li><a href="admin.php">ADMINISTRAR</a></li>
            <?php } ?>
        </ul>
    </nav>

    <div class='contenido'>
        <div class='row'>
            <div class='col-lg-8'>
        
                <section>
                    <h5><i class="fas fa-file-invoice"></i> VER REPORTE</h5>
                    <div class='row'>
                        <div class='col-lg-3'>
                            <div class='form-group'>
                                <div class='form-floating'>
                                    <select class='form-select' name="lstReportFilter" id="lstReportFilter">
                                        <option value="0">Todo</option>
                                    </select>
                                    <label  for="lstReportFilter"><i class="fas fa-filter"></i> Filtrar por</label>
                                </div>
                            </div>
                        </div>

                        <div class='col-lg-3'>
                            <div class='form-group'>
                                <div class='form-floating'>
                                    <input type="date" class='form-control' id='TxtReportDateStart'>
                                    <label for="TxtReportDateStart"><i class="far fa-calendar-alt"></i> Fecha Inicio</label>
                                </div>
                            </div>
                        </div>

                        <div class='col-lg-3'>
                            <div class='form-group'>
                                <div class='form-floating'>
                                    <input type="date" class='form-control' id='TxtReportDateEnd'>
                                    <label for="TxtReportDateEnd"><i class="far fa-calendar-alt"></i> Fecha Fin</label>
                                </div>
                            </div>
                        </div>

                        <div class='col-lg-3'>
                            <div class='form-group'>
                                <button ID='btn_Buscar_Reporte' type='button' class='btn btn-outline-secondary'><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class='row fila_reporte'>
                        <div class='col-lg12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <button type='button' class='btn btn-outline-primary' id='bth_exportar'>EXPORTAR</button>
                                </div>

                                <div class='card-body contenido_reporte'>
                                   <table id='Tabla_Reporte' class='table table-condensed table-responsive table-striped'>

                                   </table>
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
<?php }else{ ?>

<h2 class='text-center'>NO TIENE PERMISO PARA VER ESTA SECCION</h2>

<?php }?>







</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</html>