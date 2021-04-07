function alertaInicioTorneo() {
    Swal.fire({
        // title: 
        //text:
        html: '<form class="needs-validation" novalidate action="guardarDatosAlerta.php" method="POST"><label for="inicioTorneo"><b class="textoAlerta">Ingrese la fecha del primer partido</b></label>' +
            '<p> </p>' +
            '<input type="date" name="fechaInicioTorneo" id="inicioTorneo" class="container form-control" requerid>' +
            '<p> </p>' +
            '<label for="inicioTorneo"><b class="textoAlerta">Ingrese la hora del primer partido</b></label>' +
            '<p> </p>' +
            '<input type="time" name="horaInicioTorneo" id="inicioTorneo" class="container form-control" requerid>' +
            '<button type="submit" name="botonGuardarDatosAlerta" class="btn botonGuardarDatosAlerta"><b>Registrar</b></button></form>',
        icon: 'warning',
        confirmButtonText: 'Guardar',
        footer: 'Por favor ingrese la fecha y hora del primer partido del torneo',
        // width:
        // padding: 
        // background:
        // grow:
        // backdrop:
        // timer:
        // timerProgressBar:
        // toast:
        // position:
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: true,
        stopKeydownPropagation: false,

        // input:
        // inputPlaceholder:
        // inputValue:
        // inputOptions:

        customClass: {
            // 	container:
            // 	popup:
            // 	header:
            // 	title:
            //  closeButton:
            // 	icon:
            // 	image:
            // 	content:
            input: 'botonGuardarDatosAlerta',
            // 	actions:
            // 	confirmButton:
            // 	cancelButton:
            // 	footer:	
        },

        showConfirmButton: false,
        // confirmButtonColor: '#1d3557',
        // confirmButtonAriaLabel: 'Guardar',

        // showCancelButton:
        // cancelButtonText:
        // cancelButtonColor:
        // cancelButtonAriaLabel:

        // buttonsStyling:
        showCloseButton: true,
        closeButtonAriaLabel: 'Cerrar',


        // imageUrl:
        // imageWidth:
        // imageHeight:
        // imageAlt:
    });
}

function alertaFechaNoValida() {
    Swal.fire({
        // title: 
        //text:
        html: '<form class="needs-validation" novalidate action="guardarDatosAlerta.php" method="POST"><label for="inicioTorneo"><b class="textoAlerta">Ingrese la fecha del primer partido</b></label>' +
            '<p> </p>' +
            'Error debe ingresar una fecha valida' +
            '<p> </p>' +
            '<input type="date" name="fechaInicioTorneo" id="inicioTorneo" class="container form-control" requerid>' +
            '<p> </p>' +
            '<label for="inicioTorneo"><b class="textoAlerta">Ingrese la hora del primer partido</b></label>' +
            '<p> </p>' +
            '<input type="time" name="horaInicioTorneo" id="inicioTorneo" class="container form-control" requerid>' +
            '<a href="guardarDatosAlerta.php"><button type="submit" name="botonGuardarDatosAlerta" class="btn botonGuardarDatosAlerta"><b>Registrar</b></button></a></form>',
        icon: 'error',
        confirmButtonText: 'Guardar',
        footer: 'Por favor confirme la fecha y hora del primer partido del torneo',
        // width:
        // padding: 
        // background:
        // grow:
        // backdrop:
        // timer:
        // timerProgressBar:
        // toast:
        // position:
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: true,
        stopKeydownPropagation: false,

        // input:
        // inputPlaceholder:
        // inputValue:
        // inputOptions:

        customClass: {
            // 	container:
            // 	popup:
            // 	header:
            // 	title:
            //  closeButton:
            // 	icon:
            // 	image:
            // 	content:
            input: 'botonGuardarDatosAlerta',
            // 	actions:
            // 	confirmButton:
            // 	cancelButton:
            // 	footer:	
        },

        showConfirmButton: false,
        // confirmButtonColor: '#1d3557',
        // confirmButtonAriaLabel: 'Guardar',

        // showCancelButton:
        // cancelButtonText:
        // cancelButtonColor:
        // cancelButtonAriaLabel:

        // buttonsStyling:
        showCloseButton: true,
        closeButtonAriaLabel: 'Cerrar',


        // imageUrl:
        // imageWidth:
        // imageHeight:
        // imageAlt:
    });
}

function alertaHoraNoValida() {
    Swal.fire({
        // title: 
        //text:
        html: '<form class="needs-validation" novalidate action="guardarDatosAlerta.php" method="POST"><label for="inicioTorneo"><b class="textoAlerta">Ingrese la fecha del primer partido</b></label>' +
            '<p> </p>' +
            'Error debe ingresar una hora valida' +
            '<p> </p>' +
            '<input type="date" name="fechaInicioTorneo" id="inicioTorneo" class="container form-control" requerid>' +
            '<p> </p>' +
            '<label for="inicioTorneo"><b class="textoAlerta">Ingrese la hora del primer partido</b></label>' +
            '<p> </p>' +
            '<input type="time" name="horaInicioTorneo" id="inicioTorneo" class="container form-control" requerid>' +
            '<a href="guardarDatosAlerta.php"><button type="submit" name="botonGuardarDatosAlerta" class="btn botonGuardarDatosAlerta"><b>Registrar</b></button></a></form>',
        icon: 'error',
        confirmButtonText: 'Guardar',
        footer: 'Por favor confirme la fecha y hora del primer partido del torneo',
        // width:
        // padding: 
        // background:
        // grow:
        // backdrop:
        // timer:
        // timerProgressBar:
        // toast:
        // position:
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: true,
        stopKeydownPropagation: false,

        // input:
        // inputPlaceholder:
        // inputValue:
        // inputOptions:

        customClass: {
            // 	container:
            // 	popup:
            // 	header:
            // 	title:
            //  closeButton:
            // 	icon:
            // 	image:
            // 	content:
            input: 'botonGuardarDatosAlerta',
            // 	actions:
            // 	confirmButton:
            // 	cancelButton:
            // 	footer:	
        },

        showConfirmButton: false,
        // confirmButtonColor: '#1d3557',
        // confirmButtonAriaLabel: 'Guardar',

        // showCancelButton:
        // cancelButtonText:
        // cancelButtonColor:
        // cancelButtonAriaLabel:

        // buttonsStyling:
        showCloseButton: true,
        closeButtonAriaLabel: 'Cerrar',


        // imageUrl:
        // imageWidth:
        // imageHeight:
        // imageAlt:
    });
}
