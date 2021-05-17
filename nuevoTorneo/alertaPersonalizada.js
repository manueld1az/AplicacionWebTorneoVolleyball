function alertaInicioTorneo() {
    Swal.fire({
        // title: 
        // text:
        html: '<form class="needs-validation" novalidate action="guardarDatosAlerta.php" method="POST"><label for="inicioTorneo"><b class="textoAlerta">Ingrese la fecha del primer partido</b></label>' +
            '<p> </p>' +
            '<input type="date" name="fechaInicioTorneo" class="container form-control" required>' +
            '<p> </p>' +
            '<label for="inicioTorneo"><b class="textoAlerta">Ingrese la cantidad de partidos que se jugaran diariamente</b></label>' +
            '<p> </p>' +
            '<input type="number" name="cantidadEncuentrosDiarios" class="container form-control" min="2" step="2" required >' +
            '<p> </p>' +
            '<label for="inicioTorneo"><b class="textoAlerta">Ingrese la hora del primer partido</b></label>' +
            '<p> </p>' +
            '<input type="time" name="horaInicioTorneo" class="container form-control" required>' +
            '<p> </p>' +
            '<label for="inicioTorneo"><b class="textoAlerta">Ingrese el intervalo en horas aproximado que debe haber entre cada partido diario</b></label>' +
            '<p> </p>' +
            '<input type="number" name="intervaloEntrePartidos" class="container form-control" min="0" required>' +
            '<p> </p>' +
            '<label for="inicioTorneo" class="textoAlerta">Estos datos pueden ser modificados despues de este registro, pero debe ser antes de que se llegue al dia y hora aqui ingresado!</label>' +
            '<p> </p>' +
            '<button type="submit" name="botonGuardarDatosAlerta" onclick="validarInputs()" class="btn botonGuardarDatosAlerta"><b>Registrar</b></button></form>',
        icon: 'warning',
        // confirmButtonText:
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

function validarInputs() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
}