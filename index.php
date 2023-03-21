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
    <link rel="stylesheet" href="css/style.css" id='linkEstilo_index'>

    <title>Despacho - Inicio</title>
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
                <li class='activado'><a href="index.php">INICIO</a></li>
                <li><a href="llamadas.php">LLAMADA</a></li>
                <li><a href="config.php">CONFIGURAR</a></li>
            <?php } elseif($_SESSION['puesto']=='Supervisor' || $_SESSION['puesto']=='Lider'){?>
                <li class='activado'><a href="index.php">INICIO</a></li>
                <li><a href="llamadas.php">LLAMADA</a></li>
                <li><a href="config.php">CONFIGURAR</a></li>
                <li><a href="report.php">REPORTES</a></li>
            <?php } elseif($_SESSION['puesto']=='Administrador'){?>
                <li class='activado'><a href="index.php">INICIO</a></li>
                <li><a href="llamadas.php">LLAMADA</a></li>
                <li><a href="config.php">CONFIGURAR</a></li>
                <li><a href="report.php">REPORTES</a></li>
                <li><a href="admin.php">ADMINISTRAR</a></li>
            <?php } ?>
        </ul>
    </nav>

    <div class='contenido'>
        <div class='row'>
            <div class='col-lg-8'>
                <section class='cont_inicio'>
                    <img src="pics/logo.png" alt="">
                    <span class='name'>DD<span class='name2'>ST</span></span>
                    <span class='descripcion'>Data Despacho Soporte a Tecnicos</span>
                </section>

            </div>

            <div class='col-lg-4'>
                <aside>
                    <h5>Nuestros Objetivos</h5>
                    <p>Brindar asistencia a los técnicos en los procesos relacionados con despacho
                        y completación de órdenes.
                    </p>

                    <ul>
                        <li>Asignación y movimiento de citas</li>
                        <li>Reactivación de órdenes</li>
                        <li>Brindar facilidades</li>
                        <li>Suministrar numeros de referencias</li>
                        <li>Autenticación de Modems</li>
                        <li>Portal cautivo</li>
                        <li>Llamada de pruebas a clientes</li>
                    </ul>
                       
                    <p>
                    En caso de escenarios extraordinarios referir por las vías correspondientes 
                    para su pronta solución.
                    </p>
                    <p class='import'>Confirmar siempre el funcionamiento del servicio con el cliente.</p>
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
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</html>