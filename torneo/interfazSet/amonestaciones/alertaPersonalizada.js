let contadorTarjetasAmarillasEquipo1 = [];
let contadorTarjetasRojasEquipo1 = [];
let contadorTarjetasAmarillasEquipo2 = [];
let contadorTarjetasRojasEquipo2 = [];

async function alertaConfirmarTarjeta(nombreJugadora, idJugadora, x) {
  
  //  VARIABLES PARA MOSTRAR EL NOMBRE DE LOS EQUIPOS EN SU ALERTA PERSONALIZADA
  let nombreEquipo1 = document.getElementById("nombreEquipo1").textContent;
  let nombreEquipo2 = document.getElementById("nombreEquipo2").textContent;
  let tarjetaSeleccionadaEquipo1 = 0;
  let tarjetaSeleccionadaEquipo2 = 0;
  let tarjetaSeleccionada = 0;
  let equipo = 0;
  let nombreEquipo = "";
  //  SE OBTIENEN LOS IDS DE LAS JUGADORAS EN ARRAY POR EQUIPO LLAMANDO A LOS JSON DE LA INTERFAZ

  //  IDS JUGADORAS EQUIPO 1
  var idJugadorasEquipo1 = JSON.parse(idsJugadorasEquipo1);

  //  IDS JUGADORAS EQUIPO 2
  var idJugadorasEquipo2 = JSON.parse(idsJugadorasEquipo2);

  //  SE CONDICIONA QUE ID LLEGA A LA FUNCION Y CON ELLO SE TOMAN ALGUNAS DECISIONES
  if (idJugadorasEquipo1[x] == idJugadora) {
    //  SE OPTIENE LA OPCION SELECCIONADA EN EL SELECT DEL HTML
    tarjetaSeleccionadaEquipo1 = document.getElementById(
      "tarjetaSeleccionadaEquipo1" + idJugadora
    ).value;
    //  LA TARJETA RECIBIDA A QUE EQUIPO PERTENECE
    equipo = 1;
    nombreEquipo = nombreEquipo1;

    //  SE OBTIENEN LOS PUNTOS DE LOS CONTADORES EN LA INTERFAZ DEL EQUIPO 1
  contadorTarjetasAmarillasEquipo1[idJugadora] = document.getElementById("amarillasEquipo1"+idJugadora).textContent;
  contadorTarjetasRojasEquipo1[idJugadora] = document.getElementById("rojasEquipo1"+idJugadora).textContent;
  } else if (idJugadorasEquipo2[x] == idJugadora) {
    tarjetaSeleccionadaEquipo2 = document.getElementById(
      "tarjetaSeleccionadaEquipo2" + idJugadora
    ).value;
    equipo = 2;
    nombreEquipo = nombreEquipo2;

    //  SE OBTIENEN LOS PUNTOS DE LOS CONTADORES EN LA INTERFAZ DEL EQUIPO 2
    contadorTarjetasAmarillasEquipo2[idJugadora] = document.getElementById("amarillasEquipo2"+idJugadora).textContent;
    contadorTarjetasRojasEquipo2[idJugadora] = document.getElementById("rojasEquipo2"+idJugadora).textContent;
  }

  //  SE EVALUA SI SE HA SELECCIONA UNA DE LAS OPCIONES QUE CONTIENE UNA TARJETA
  if (tarjetaSeleccionadaEquipo1 != "0" || tarjetaSeleccionadaEquipo2 != "0") {
    //  SE EVALUA SI SE RECIBIO UNA TARJETA AMARILLA O ROJA
    if (
      tarjetaSeleccionadaEquipo1 == "1" ||
      tarjetaSeleccionadaEquipo2 == "1"
    ) {
      tarjetaSeleccionada = 1;
    } else {
      tarjetaSeleccionada = 2;
    }

    //  SE EVALUA QUE SE DEBE MOSTRAR LA ALERTA DE CONFIRMACION DE LA TARJETA AMARILLA
    if (tarjetaSeleccionada == 1) {
      const { value: confirmacionAmarilla } = await Swal.fire({
        // title:
        text:
          "Esta segur@ de sumar la tarjeta amarilla a la jugadora " +
          nombreJugadora +
          " del equipo " +
          nombreEquipo,
        // html:
        // icon: 'warning',
        confirmButtonText: "Aceptar",
        footer: "Por favor confirme la tarjeta amarilla",
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

        // customClass: {
        // 	container:
        // 	popup:
        // 	header:
        // 	title:
        //  closeButton:
        // 	icon:
        // 	image:
        // 	content:
        //  input:
        // 	actions:
        // 	confirmButton:
        // 	cancelButton:
        // 	footer:
        // }

        showConfirmButton: true,
        confirmButtonColor: "#1d3557",
        confirmButtonAriaLabel: "Aceptar",

        showCancelButton: true,
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#c21f2c",
        cancelButtonAriaLabel: "Cancelar",

        // buttonsStyling:
        showCloseButton: true,
        closeButtonAriaLabel: "Cerrar",

        imageUrl: "../../../img/yellowCard.svg",
        imageWidth: "7em",
        imageHeight: "8em",
        imageAlt: "imgAlertaTarjeta",
      });

      //  CONTADOR DE TARJETAS AMARILLAS
      if (confirmacionAmarilla) {
        if (equipo == 1) {
          if (
            contadorTarjetasAmarillasEquipo1[idJugadora] < 2 &&
            contadorTarjetasRojasEquipo1[idJugadora] == 0
          ) {
            contadorTarjetasAmarillasEquipo1[idJugadora]++;
          }
          document.getElementById("amarillasEquipo1" + idJugadora).innerHTML =
            contadorTarjetasAmarillasEquipo1[idJugadora];
          console.log(contadorTarjetasAmarillasEquipo1[idJugadora]);

          //    SE SUMA ROJA SI SE SUMAN 2 AMARILLAS
          if (contadorTarjetasAmarillasEquipo1[idJugadora] == 2) {
            if (contadorTarjetasRojasEquipo1[idJugadora] == 0) {
              contadorTarjetasRojasEquipo1[idJugadora]++;
              document.getElementById("rojasEquipo1" + idJugadora).innerHTML =
                contadorTarjetasRojasEquipo1[idJugadora];
            }
          }
        } else if (equipo == 2) {
          if (
            contadorTarjetasAmarillasEquipo2[idJugadora] < 2 &&
            contadorTarjetasRojasEquipo2[idJugadora] == 0
          ) {
            contadorTarjetasAmarillasEquipo2[idJugadora]++;
            document.getElementById("amarillasEquipo2" + idJugadora).innerHTML =
              contadorTarjetasAmarillasEquipo2[idJugadora];
          }

          //    SE SUMA ROJA SI SE SUMAN 2 AMARILLAS
          if (contadorTarjetasAmarillasEquipo2[idJugadora] == 2) {
            if (contadorTarjetasRojasEquipo2[idJugadora] == 0) {
              contadorTarjetasRojasEquipo2[idJugadora]++;
              document.getElementById("rojasEquipo2" + idJugadora).innerHTML =
                contadorTarjetasRojasEquipo2[idJugadora];
            }
          }
        }
      }

      //  SE EVALUA QUE SE DEBE MOSTRAR LA ALERTA DE CONFIRMACION DE LA TARJETA ROJA
    } else if (tarjetaSeleccionada == 2) {
      const { value: confirmacionRoja } = await Swal.fire({
        // title:
        text:
          "Esta segur@ de sumar la tarjeta roja a la jugadora " +
          nombreJugadora +
          " del equipo " +
          nombreEquipo,
        // html:
        // icon: 'warning',
        confirmButtonText: "Aceptar",
        footer: "Por favor confirme la tarjeta roja",
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

        // customClass: {
        // 	container:
        // 	popup:
        // 	header:
        // 	title:
        //  closeButton:
        // 	icon:
        // 	image:
        // 	content:
        //  input:
        // 	actions:
        // 	confirmButton:
        // 	cancelButton:
        // 	footer:
        // }

        showConfirmButton: true,
        confirmButtonColor: "#1d3557",
        confirmButtonAriaLabel: "Aceptar",

        showCancelButton: true,
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#c21f2c",
        cancelButtonAriaLabel: "Cancelar",

        // buttonsStyling:
        showCloseButton: true,
        closeButtonAriaLabel: "Cerrar",

        imageUrl: "../../../img/redCard.svg",
        imageWidth: "7em",
        imageHeight: "8em",
        imageAlt: "imgAlertaTarjeta",
      });

      //  CONTADOR DE TARJETAS ROJAS
      if (confirmacionRoja) {
        if (equipo == 1) {
          if (contadorTarjetasRojasEquipo1[idJugadora] == 0) {
            contadorTarjetasRojasEquipo1[idJugadora]++;
            document.getElementById("rojasEquipo1" + idJugadora).innerHTML =
              contadorTarjetasRojasEquipo1[idJugadora];
          }
        } else if (equipo == 2) {
          if (contadorTarjetasRojasEquipo2[idJugadora] == 0) {
            contadorTarjetasRojasEquipo2[idJugadora]++;
            document.getElementById("rojasEquipo2" + idJugadora).innerHTML =
              contadorTarjetasRojasEquipo2[idJugadora];
          }
        }
      }
    }
  }

  //  DESPUES DE SELECCIONAR UNA TARJETA SE POSICIONA EL SELECT A LA PRIMERA OPTION
  //  PERO ANTES SE DEBE IDENTIFICAR EL SELECT A QUE EQUIPO PERTENECE Y NO HACER LOS DOS A LA VEZ
  if (equipo == 1) {
    document.getElementById(
      "tarjetaSeleccionadaEquipo1" + idJugadora
    ).value = 0;
  } else {
    document.getElementById(
      "tarjetaSeleccionadaEquipo2" + idJugadora
    ).value = 0;
  }

  //  SE RESTABLECEN LOS VALORES DE TODAS LAS VARIABLES
  //  AL QUE DEBEN TENER POR DEFECTO AL PRINCIPIO DE LA FUNCION
  equipo = 0;
  tarjetaSeleccionadaEquipo1 = "0";
  tarjetaSeleccionadaEquipo2 = "0";
  tarjetaSeleccionada = 0;
}
