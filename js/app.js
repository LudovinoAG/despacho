function validarTeclado(event,tipo){
    switch(tipo){
        case 1: //SOLO NUMEROS
            if(event.keyCode > 47 && event.keyCode < 58 ){
                return true;
            }else{
                return false;
            }
        break;

        case 2: //SOLO TEXTO
            if(event.keyCode > 64 && event.keyCode < 91 || event.keyCode==32){
                return true;
            }else{
                Swal.fire({
                    icon: 'info',
                    title: 'Solo mayúscula',
                    text: 'Escriba en mayúscula en este campo'
                  });
                return false;
            }
        break;
    }
      
}

$(document).ready(function(){
    //Cargar soluciones de acuerdo a la razon indicada
    $('#lstRazon').change(function(){
        var item = $('#lstRazon')[0][$('#lstRazon')[0].options.selectedIndex].innerText;    //$('#lstRazon')[0].options.selectedIndex;
        
        loadSoluciones(item);

        if(item=='Llamada Muda'){
            var INPUTS = $('#frmRegistro input');
            INPUTS.val("N/A");
            $("#LstPueblos option[value='79'").attr("selected",true);
            $("#LstPueblos option[value='0'").removeAttr("selected",true);
        }else{
            var INPUTS = $('#frmRegistro input');
            INPUTS.val("");
            $("#LstPueblos option[value='79'").removeAttr("selected",true);
            $("#LstPueblos option[value='0'").attr("selected",true);
            
        }
    });
    
    function loadSuper(){
        var n = 0;
        $.ajax({
            url: 'loadSuper.php',
            datatype: 'json',
            type: 'POST',
            data: {

            },
            success: function(resp){
                var data = $.parseJSON(resp);
                while(n < data.length){
                    $('#lstSupervisor').append(
                        "<option value="+(n+1)+">"+data[n]+"</option>"
                    );
                n++;
                }   
            }
        });
    }

    function loadPuesto(){
        //CARGAR PUESTOS AL LISTADO
        var n = 0;
        $.ajax({
            url: 'loadPuesto.php',
            datatype: 'json',
            type: 'POST',
            data: {

            },
            success: function(resp){
                var data = $.parseJSON(resp);
                while(n < data.length){
                    $('#lstPuesto').append(
                        "<option value="+ (n+1) +">"+data[n]+"</option>"
                    );

                    $('#lstPuestoSuper').append(
                        "<option value="+ (n+1) +">"+data[n]+"</option>"
                    );
                n++;
                }   
            }
        });
    }

    function loadRazones(){
        //CARGAR razones AL LISTADO
        var n = 0;
        $.ajax({
            url: 'loadRazones.php',
            datatype: 'json',
            type: 'POST',
            data: {

            },
            success: function(resp){
                var data = $.parseJSON(resp);
                while(n < data['RAZON']['ID'].length){
                    $('#lstRazon').append(
                        "<option value=" +(data['RAZON']['ID'][n])+">"+data['RAZON']['NOMBRE'][n]+"</option>"
                    );
                n++;
                }   
            }
        });
    }

    function loadTemas(){
        var tarjeta = $('#txtTarjeta').val();
        $.ajax({
            url: 'loadTemas.php',
            type: 'POST',
            data: {tarjeta:tarjeta},
            success: function(resp){
                //var data = $.parseJSON(resp);
                if(resp=="1"){
                    $("#linkEstilo_index").attr("href", "css/style.css");
                    $("#linkEstilo_llamada").attr("href", "css/llamadas.css");
                    $("#linkEstilo_config").attr("href", "css/config.css");
                    $("#linkEstilo_report").attr("href", "css/report.css");
                }
                else if(resp=="2"){
                    $("#linkEstilo_index").attr("href", "css/stylePink.css");
                    $("#linkEstilo_llamada").attr("href", "css/llamadasPink.css");
                    $("#linkEstilo_config").attr("href", "css/configPink.css");
                    $("#linkEstilo_report").attr("href", "css/reportPink.css");
                }
                else if(resp=="3"){
                    $("#linkEstilo_index").attr("href", "css/styleBlue.css");
                    $("#linkEstilo_llamada").attr("href", "css/llamadasBlue.css");
                    $("#linkEstilo_config").attr("href", "css/configBlue.css");
                    $("#linkEstilo_report").attr("href", "css/reportBlue.css");
                }
                else if(resp=="4"){
                    $("#linkEstilo_index").attr("href", "css/styleGold.css");
                    $("#linkEstilo_llamada").attr("href", "css/llamadasGold.css");
                    $("#linkEstilo_config").attr("href", "css/configGold.css");
                    $("#linkEstilo_report").attr("href", "css/reportGold.css");
                    $("#linkEstilo_admin").attr("href", "css/adminGold.css");
                }
                $('#lstApariencia')[0].options.selectedIndex = resp;
            }
        });
    } 

    function loadSoluciones(Selrazon){
        //CARGAR razones AL LISTADO
        //var spliter = Selrazon.split(" ");
        //var NombreRazon = "";
        var n = 0;
        //NombreRazon = NombreRazon + spliter[n];

        $.ajax({
            url: 'loadSoluciones.php',
            dataType: 'JSON',
            type: 'POST',
            data: {razon:Selrazon},
            success: function(resp){
                ///var data = $.parseJSON(resp);
                $('#LstSolucion').empty();
                while(n <= resp.length-1){
                    $('#LstSolucion').append(
                        "<option value="+(n+1)+">"+resp[n]+"</option>"
                    );
                n++;
                }   
            }
        });
    }
    
    function Mensajes(msg){
        var String = '';
        switch(msg){
            case 'QUERYOK':
                String = 'Registrado Correctamente';
            break;
            case 'QUERYERROR':
                String = 'No fue posible realizar el registro';
            break;
            case 'LOG1':
                String = 'El nombre de usuario o contraseña son incorrectos.';
            break;
            case 'LOG0':
                String = 'Debe indicar usuario y contraseña para acceder.';
            break;
            case 'UPDATEOK':
                String = 'Datos guardados correctamente.';
            break;
            case 'PASS_ERROR':
                String = 'Debe indicar la contraseñal actual';
            break;
            case 'TEMAOK':
                String = 'El tema ha sido aplicado exitosamente.';
            break;
            case 'TEMAERROR':
                String = 'No fue posible guardar el tema';
            break;
            case 'RECORDARERROR':
                String = 'El codigo de empleado no existe';
            break;
        }
        return String;
    }

    function ValidacionForm(elements){
        var n = 0;
        var validado = true;
        while(n <= elements.length-1){
            if (elements[n].nodeName=='INPUT' || elements[n].nodeName=='TEXTAREA' || elements[n].nodeName=='SELECT'){
                    if(elements[n].value=="" || elements[n].value=="0"){
                        Swal.fire({
                            icon: 'error',
                            title: 'Atención',
                            text: 'Existen campos vacios en el formulario.',
                        });
                        validado = false;
                        return validado;
                    }
                    if (elements[n].nodeName=='INPUT'){
                        if(elements[n].value.indexOf('*')!=-1){
                            Swal.fire({
                                icon: 'error',
                                title: 'Atención',
                                text: 'Existen campos con caracteres ínvalidos.',
                            });
                            validado = false;
                            return validado;
                        }
                    }
            }
            n++;
        }
        return validado;
    }

    function LimpiarForm(elements){
        var n = 0;
    
        while(n <= elements.length-1){
            if (elements[n].nodeName=='INPUT' || elements[n].nodeName=='TEXTAREA' ){
                    elements[n].value="";
                
            }
            else if(elements[n].nodeName=='SELECT'){
                elements[n].value=0;
            }
            n++;
        }
       
    }

    function loadDatosEmpleados(){
        //CARGAR PUESTOS AL LISTADO
        $.ajax({
            url: 'loadDatosEmpleados.php',
            datatype: 'json',
            type: 'POST',
            data: {

            },
            success: function(resp){

                var data = $.parseJSON(resp);
                var fecha = new Date(data['Empleados']['FechaNacimiento']['date']);
                var dia = fecha.getDate().toString();
                var mes = (fecha.getMonth()+1).toString();
                var año = fecha.getFullYear().toString();
                var fechaNacimiento = año + "-" + mes.padStart(2,0) + "-" + dia.padStart(2,0);

                $('#txtFechaNac').val(fechaNacimiento);
                $('#txtTelCel').val(data['Empleados']['Telefono']);
                $('#txtEmail').val(data['Empleados']['Email']);

            }
        });
    }

    function LoadEstadisticaEmpleado(){
        //CARGAR PUESTOS AL LISTADO
        var fecha = new Date();
        var dia = fecha.getDate().toString();
        var mes = (fecha.getMonth()+1).toString();
        var año = fecha.getFullYear().toString();
        var fechaRegistro = año + "-" + mes.padStart(2,0) + "-" + dia.padStart(2,0); 
        var id = parseInt($('#idEmpleado').val());
        $.ajax({
            url: 'loadEstadisticaEmpleados.php',
            datatype: 'json',
            type: 'POST',
            data: {idEmpleado:id,fechaRegistro:fechaRegistro},
            success: function(resp){
                if(resp!="null"){
                    var data = $.parseJSON(resp);
                    //Mostrar Estadisticas
                    var Registradas = data["Tipificacion"]["TotalRegistro"];
                    var Referidas = data["Tipificacion"]["Nombre"]["Referidas"];
                    var Completadas = data["Tipificacion"]["Nombre"]["Completadas"];
                    var Transferencias = data["Tipificacion"]["Nombre"]["Transferidas"];
                    var Informacion = data["Tipificacion"]["Nombre"]["Informacion"];
                    var Citas = data["Tipificacion"]["Nombre"]["Citas"];
                    var Escalados = data["Tipificacion"]["Nombre"]["Escalados"];
                    var RutasON = data["Tipificacion"]["Nombre"]["RutasON"];
                    var RutasOFF = data["Tipificacion"]["Nombre"]["RutasOFF"];
                    var Clericals = data["Tipificacion"]["Nombre"]["Clericals"];
                    var Muda = data["Tipificacion"]["Nombre"]["Muda"];
    
                    //Asignar valores
                    $('#DataCompletadas')[0].innerText = Completadas;
                    $('#DataReferidos')[0].innerText = Referidas;
                    $('#DataRegistrada')[0].innerText = Registradas;
                    $('#DataTransfer')[0].innerText = Transferencias;
                    $('#DataInformacion')[0].innerText = Informacion;
                    $('#DataCitas')[0].innerText = Citas;
                    $('#DataEscalados')[0].innerText = Escalados;
                    $('#DataClericals')[0].innerText = Clericals;
                    $('#DataRutaON')[0].innerText = RutasON;
                    $('#DataRutaOFF')[0].innerText = RutasOFF;
                    $('#DataMuda')[0].innerText = Muda;
                }
               

            }
        });
    }


    function LoadEstadisticaGeneral(){
        //CARGAR PUESTOS AL LISTADO
        var fecha = new Date();
        var dia = fecha.getDate().toString();
        var mes = (fecha.getMonth()+1).toString();
        var año = fecha.getFullYear().toString();
        var fechaRegistro = año + "-" + mes.padStart(2,0) + "-" + dia.padStart(2,0); 
        $.ajax({
            url: 'loadEstadisticaGeneral.php',
            datatype: 'json',
            type: 'POST',
            data: {fechaRegistro:fechaRegistro},
            success: function(resp){
                if(resp!="null"){
                    var data = $.parseJSON(resp);
                    //Mostrar Estadisticas
                    var Registradas = data["Tipificacion"]["TotalRegistro"];
                    var Referidas = data["Tipificacion"]["Nombre"]["Referidas"];
                    var Completadas = data["Tipificacion"]["Nombre"]["Completadas"];
                    var Transferencias = data["Tipificacion"]["Nombre"]["Transferidas"];
                    var Informacion = data["Tipificacion"]["Nombre"]["Informacion"];
                    var Citas = data["Tipificacion"]["Nombre"]["Citas"];
                    var Escalados = data["Tipificacion"]["Nombre"]["Escalados"];
                    var RutasON = data["Tipificacion"]["Nombre"]["RutasON"];
                    var RutasOFF = data["Tipificacion"]["Nombre"]["RutasOFF"];
                    var Clericals = data["Tipificacion"]["Nombre"]["Clericals"];
                    var Muda = data["Tipificacion"]["Nombre"]["Muda"];
    
                    //Asignar valores
                    $('#DataCompletadasGeneral')[0].innerText = Completadas;
                    $('#DataReferidosGeneral')[0].innerText = Referidas;
                    $('#DataRegistradaGeneral')[0].innerText = Registradas;
                    $('#DataTransferGeneral')[0].innerText = Transferencias;
                    $('#DataInformacionGeneral')[0].innerText = Informacion;
                    $('#DataCitasGeneral')[0].innerText = Citas;
                    $('#DataEscaladosGeneral')[0].innerText = Escalados;
                    $('#DataClericalsGeneral')[0].innerText = Clericals;
                    $('#DataRutaONGeneral')[0].innerText = RutasON;
                    $('#DataRutaOFFGeneral')[0].innerText = RutasOFF;
                    $('#DataMudaGeneral')[0].innerText = Muda;
                }
               

            }
        });
    }

    function LoadDataReport(){
        //CARGAR PUESTOS AL LISTADO
        var fechaInicio = $('#TxtReportDateStart').val();
        var fechaFin = $('#TxtReportDateEnd').val();

        if(fechaInicio!="" && fechaFin!=""){
            $.ajax({
                url: 'viewreport.php',
                datatype: 'json',
                type: 'POST',
                data: {fechaInicio:fechaInicio,fechaFin:fechaFin},
                success: function(resp){
                    $('#Tabla_Reporte').html(resp);
                }
            });
        }else{
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: "Debe indicar el rango de fecha a buscar",
                showConfirmButton: false,
                timer: 1800
            })
        }
       
    }

    function ExportarData(){
        //CARGAR PUESTOS AL LISTADO
        var fechaInicio = $('#TxtReportDateStart').val();
        var fechaFin = $('#TxtReportDateEnd').val();

        if(fechaInicio!="" && fechaFin!=""){
            $.ajax({
                url: 'exportar.php',
                datatype: 'json',
                type: 'GET',
                data: {fechaInicio:fechaInicio,fechaFin:fechaFin},
                success: function(resp){
                    url = "http://172.18.10.13:81/despacho/exportar.php?Inicio="+fechaInicio+"&Fin="+fechaFin;
                    window.open(url, '_parent');
                }
            });
        }else{
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: "Debe indicar el rango de fecha a exportar",
                showConfirmButton: false,
                timer: 1800
            })
        }
       
    }

    /*VER REPORTE*/
    $('#btn_Buscar_Reporte').click(function(){
        LoadDataReport();
    });

    $('#bth_exportar').click(function(){
        ExportarData();
    });

    /*AGREGAR EMPELADOS */
    $('#btn_Add_Employer').click(function(){
        var tarjeta = $('#txtTarjetaAdm').val();
        var nombre = $('#txtNombre').val();
        var apellido = $('#txtApellido').val();
        var supervisor = $('#lstSupervisor').val();
        var puesto = $('#lstPuesto').val();
        var FechaNac = $('#txtFechaNac').val();
        var observacion = $('#txtObservacion').val();
        var form = $('#form_empleados input,#form_empleados select,#form_empleados textarea');

        if(ValidacionForm(form)){
            $.ajax({
                url: 'Save_empleados.php',
                type: 'POST',
                data: {tarjeta:tarjeta,nombre:nombre,apellido:apellido,
                    idSupervisor:supervisor,idPuesto:puesto,fechaNacimiento:FechaNac, 
                    observacion:observacion},
                success: function(resp){
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: Mensajes(resp),
                        showConfirmButton: false,
                        timer: 1800
                    })
                    LimpiarForm(form);
                }
            });
        }
    });

    /*AGREGAR SUPERVISOR */
    $('#btn_AgregarSupervisor').click(function(){
        var nombre = $('#txtSuper_Nombre').val();
        var apellido = $('#txtSuper_Apellido').val();
        var puesto = $('#lstPuestoSuper').val();
        var observacion = $('#txtSuper_Observacion').val();
        var form = $('#form_Supervisor input,#form_Supervisor select,#form_Supervisor textarea');

        if(ValidacionForm(form)){
            $.ajax({
                url: 'Save_Supervisor.php',
                type: 'POST',
                data: {nombre:nombre,apellido:apellido,
                    idPuesto:puesto, observacion:observacion},
                success: function(resp){
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: Mensajes(resp),
                        showConfirmButton: false,
                        timer: 1800
                    })
                    LimpiarForm(form);
                }
            });
        }
    });

     /*REGISTRAR LLAMADAS */
     $('#btn_Registrar').click(function(){
        var razon = $('#lstRazon option:selected').val();
        var empleado = $('#idEmpleado').val();
        var nombre = $('#txtNombre').val().trim();
        var canal = $('#txtCanal').val().trim();
        var codigo = $('#txtCodigo').val().trim();
        var tel = $('#txtTelefono').val();
        var osadia = $('#txtOsadia').val();
        var m6 = $('#txtM6').val();
        var serial = $('#txtSerialModem').val().trim();
        var towncode = $('#txtTowncode').val().trim();
        var pueblos = $('#LstPueblos option:selected').index();
        var solucion = $('#LstSolucion option:selected').text();
        var fechaRegistro = new Date();
        var año = fechaRegistro.getFullYear().toString();
        var mes = (fechaRegistro.getMonth() +1).toString();
        var dia = fechaRegistro.getDate().toString();

        var Fecha_Registro = año + "-" + mes.padStart(2,0) + "-" + dia.padStart(2,0);
      
        var form = $('#frmRegistro input,#frmRegistro select,#frmRegistro textarea');
        //alert(form);
        if(ValidacionForm(form)){
            $.ajax({
                url: 'Save_Llamadas.php',
                type: 'POST',
                data: {idEmpleado:empleado, idRazon:razon, nombreCliente:nombre, 
                    codigoCliente:codigo, telefono:tel, osadia:osadia, companiaCanal:canal,
                     m6:m6, serial:serial, towmcode:towncode, idpueblo:pueblos, solucion:solucion,
                    fechaRegistro:Fecha_Registro},
                success: function(resp){
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: Mensajes(resp),
                        showConfirmButton: false,
                        timer: 1800
                    })
                    LimpiarForm(form);
                    LoadEstadisticaEmpleado();
                }
            });
        }

    });

    /*LIMPIAR CAMPOS*/ 
    $('#btn_Borrar').click(function(){
        var form = $('#frmRegistro input,#frmRegistro select,#frmRegistro textarea');
        LimpiarForm(form);
    });

    /*ACCEDER AL SISTEMA*/
    $('#bth_Acceder').click(function(){
        var tarjeta = $('#txtUser').val();
        var clave = $('#txtPass').val();

        $.ajax({
            url: 'validate.php',
            type: 'POST',
            data: {tarjeta:tarjeta, clave:clave},
            success: function(resp){
                switch(resp){
                    case 'LOG3':
                        url = "http://172.18.10.13:81/despacho/index.php";
                        window.open(url, '_parent');
                    break;

                    case 'LOG5':
                        url = "http://172.18.10.13:81/despacho/index.php";
                        window.open(url, '_parent');
                    break;

                    case 'LOG4':
                        url = "http://172.18.10.13:81/despacho/index.php";
                        window.open(url, '_parent');
                    break;

                    case 'LOG6':
                        url = "http://172.18.10.13:81/despacho/index.php";
                        window.open(url, '_parent');
                    break;

                    case 'LOG1':
                        Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: Mensajes(resp),
                            showConfirmButton: false,
                            timer: 2800
                        })
                        //LIMPIAR CAMPOS
                        $('#txtUser').val("");
                        $('#txtPass').val("");
                    break;

                    case 'LOG0':
                        Swal.fire({
                            position: 'top-center',
                            icon: 'info',
                            title: Mensajes(resp),
                            showConfirmButton: false,
                            timer: 2800
                        })
                    break;
                }
            }
        });
    })

    $('#bth_gurdar_personal').click(function(){
        var fechaNacimiento = $('#txtFechaNac').val();
        var telefono = $('#txtTelCel').val();
        var email = $('#txtEmail').val();
        var tarjeta = $('#txtTarjeta').val();
        //var form = $('.contenido input,.contenido select,.contenido textarea');
        //if(ValidacionForm(form)){
            $.ajax({
                url: 'setDatosEmpleados.php',
                type: 'POST',
                data: {tarjeta:tarjeta,fechaNacimiento:fechaNacimiento,telefono:telefono,email:email},
                success: function(resp){
                    if(resp=='UPDATEOK'){
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: Mensajes(resp),
                            showConfirmButton: false,
                            timer: 1800
                        })
                    }else{
                        Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: Mensajes(resp),
                            showConfirmButton: false,
                            timer: 1800
                        })
                    }

                }
            });
        //}
    });

    /*GUADAR NUEVA CLAVE*/ 
    $('#bth_guardar_clave').click(function(){
        var tarjeta = $('#txtTarjeta').val();
        var currentPass = $('#txtPasswordActual').val();
        var NewPass = $('#txtPasswordNew').val();
        var ConfirmPass = $('#txtPasswordRepite').val();

        if(currentPass==""){
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: Mensajes('PASS_ERROR'),
                showConfirmButton: false,
                timer: 1800
            })
        }else{
            if(NewPass!="" && ConfirmPass!=""){
                if(NewPass==ConfirmPass){
                    $.ajax({
                        url: 'setPas.php',
                        type: 'POST',
                        data: {tarjeta:tarjeta,clave:currentPass,NewPass:NewPass,ConfirmPass:ConfirmPass},
                        success: function(resp){
                            if(resp=='QUERYOK'){
                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'success',
                                    title: Mensajes(resp),
                                    showConfirmButton: false,
                                    timer: 1800
                                })
                            }else{
                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'error',
                                    title: Mensajes(resp),
                                    showConfirmButton: false,
                                    timer: 1800
                                })
                            }
                            $('#txtPasswordActual').val('');
                            $('#txtPasswordNew').val('');
                            $('#txtPasswordRepite').val('');
                        }
                    });
                }else{
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: 'La contraseña nueva y la confirmación no coinciden',
                        showConfirmButton: false,
                        timer: 1800
                    })
                }
            }else{
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Debe indicar la contraseña nueva y la confirmación',
                    showConfirmButton: false,
                    timer: 1800
                })
                $('#txtPasswordActual').val('');
                $('#txtPasswordNew').val('');
                $('#txtPasswordRepite').val('');
            }
        } 
    });

    /*Cambiar apariencia*/
    $('#lstApariencia').change(function(){
        var valor = $('#lstApariencia option:selected').val();
        switch(valor){
            case '1':
                $('#Color_Preview').css('background', 'linear-gradient(30deg, rgba(255,0,0,1) 0%, rgba(0,0,0,1) 100%)');
            break;
            case '2':
                $('#Color_Preview').css('background', 'linear-gradient(90deg, rgba(246,148,237,1) 0%, rgba(0,0,0,1) 100%)');
            break;
            case '3':
                $('#Color_Preview').css('background', 'linear-gradient(90deg, rgba(51,95,226,1) 0%, rgba(200,212,255,1) 100%)');
            break;
            case '4':
                $('#Color_Preview').css('background', 'linear-gradient(34deg, rgba(244,194,9,1) 0%, rgba(233,235,10,1) 78%, rgba(255,255,255,1) 96%)');
            break;
        }
    });

    /*GUARDAR APARIENCIA*/
    $('#bth_guardar_Apariencia').click(function(){
        var tarjeta = $('#txtTarjeta').val();
        var tema = $('#lstApariencia option:selected').val();

        $.ajax({
            url: 'setTemaEmpleado.php',
            type: 'POST',
            data: {tarjeta:tarjeta,tema:tema},
            success: function(resp){
                if(resp=='TEMAOK'){
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: Mensajes(resp),
                        showConfirmButton: false,
                        timer: 1800
                    })

                    if(tema=="1"){
                        $("#linkEstilo_index").attr("href", "css/style.css");
                        $("#linkEstilo_llamada").attr("href", "css/llamadas.css");
                        $("#linkEstilo_config").attr("href", "css/config.css");
                        $("#linkEstilo_report").attr("href", "css/report.css");
                    }
                    else if(tema=="2"){
                        $("#linkEstilo_index").attr("href", "css/stylePink.css");
                        $("#linkEstilo_llamada").attr("href", "css/llamadasPink.css");
                        $("#linkEstilo_config").attr("href", "css/configPink.css");
                        $("#linkEstilo_report").attr("href", "css/reportPink.css");
                    }
                    else if(tema=="3"){
                        $("#linkEstilo_index").attr("href", "css/styleBlue.css");
                        $("#linkEstilo_llamada").attr("href", "css/llamadasBlue.css");
                        $("#linkEstilo_config").attr("href", "css/configBlue.css");
                        $("#linkEstilo_report").attr("href", "css/reportBlue.css");
                    }
                    else if(tema=="4"){
                        $("#linkEstilo_index").attr("href", "css/styleGold.css");
                        $("#linkEstilo_llamada").attr("href", "css/llamadasGold.css");
                        $("#linkEstilo_config").attr("href", "css/configGold.css");
                        $("#linkEstilo_report").attr("href", "css/reportGold.css");
                        $("#linkEstilo_admin").attr("href", "css/adminGold.css");
                    }

                }else{
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: Mensajes(resp),
                        showConfirmButton: false,
                        timer: 1800
                    })
                }
            }
        });
    });

    $('#bth_Recordar').click(function(){
        var tarjeta = $('#txtUser').val();

        if(tarjeta!=""){
            $.ajax({
                url: 'Correo.php',
                type: 'POST',
                data: {tarjeta:tarjeta},
                success: function(resp){
                    //var datos = $.parseJSON(resp);
                    if(resp!=""){
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Correo de Recuperación enviado a Supervisor',
                            showConfirmButton: false,
                            timer: 1900
                          })
                    }else{
                        Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: Mensajes(resp),
                            showConfirmButton: false,
                            timer: 1900
                          })
                    }
                }
            });
        }else{
            Swal.fire('Debe indicar su tarjeta de empleado');
        }
       
    });

    
    
    loadTemas()
    loadSuper();
    loadPuesto();
    loadRazones();
    loadDatosEmpleados();
    LoadEstadisticaEmpleado();
    LoadEstadisticaGeneral();
});

