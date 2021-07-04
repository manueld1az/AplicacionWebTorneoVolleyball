//  CONTADORES DE CADA JUGADORA DE CADA EQUIPO SEPARADO POR TIPO
let contadorTarjetasAmarillasEquipo1 = [];
let contadorTarjetasRojasEquipo1 = [];
let contadorTarjetasAmarillasEquipo2 = [];
let contadorTarjetasRojasEquipo2 = [];

//  SE OBTIENEN LOS IDS DE LAS JUGADORAS EN ARRAY POR EQUIPO LLAMANDO A LOS JSON DEL PHP DE LA INTERFAZ
var idJugadorasEquipo1 = JSON.parse(idsJugadorasEquipo1);
var idJugadorasEquipo2 = JSON.parse(idsJugadorasEquipo2);

async function alertaConfirmarTarjeta(nombreJugadora, idJugadora, x) {
  //  VARIABLES PARA MOSTRAR EL NOMBRE DE LOS EQUIPOS EN SU ALERTA PERSONALIZADA
  let nombreEquipo1 = document.getElementById("nombreEquipo1").textContent;
  let nombreEquipo2 = document.getElementById("nombreEquipo2").textContent;
  let tarjetaSeleccionadaEquipo1 = 0;
  let tarjetaSeleccionadaEquipo2 = 0;
  let tarjetaSeleccionada = 0;
  let equipo = 0;
  let nombreEquipo = "";

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
    contadorTarjetasAmarillasEquipo1[idJugadora] = document.getElementById(
      "amarillasEquipo1" + idJugadora
    ).textContent;
    contadorTarjetasRojasEquipo1[idJugadora] = document.getElementById(
      "rojasEquipo1" + idJugadora
    ).textContent;
  } else if (idJugadorasEquipo2[x] == idJugadora) {
    tarjetaSeleccionadaEquipo2 = document.getElementById(
      "tarjetaSeleccionadaEquipo2" + idJugadora
    ).value;
    equipo = 2;
    nombreEquipo = nombreEquipo2;

    //  SE OBTIENEN LOS PUNTOS DE LOS CONTADORES EN LA INTERFAZ DEL EQUIPO 2
    contadorTarjetasAmarillasEquipo2[idJugadora] = document.getElementById(
      "amarillasEquipo2" + idJugadora
    ).textContent;
    contadorTarjetasRojasEquipo2[idJugadora] = document.getElementById(
      "rojasEquipo2" + idJugadora
    ).textContent;
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

        imageUrl: "../../img/yellowCard.svg",
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
          almacenarContadoresTarjetas();

          //    SE SUMA ROJA SI SE SUMAN 2 AMARILLAS
          if (contadorTarjetasAmarillasEquipo1[idJugadora] == 2) {
            if (contadorTarjetasRojasEquipo1[idJugadora] == 0) {
              contadorTarjetasRojasEquipo1[idJugadora]++;
              document.getElementById("rojasEquipo1" + idJugadora).innerHTML =
                contadorTarjetasRojasEquipo1[idJugadora];
              almacenarContadoresTarjetas();
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
            almacenarContadoresTarjetas();
          }

          //    SE SUMA ROJA SI SE SUMAN 2 AMARILLAS
          if (contadorTarjetasAmarillasEquipo2[idJugadora] == 2) {
            if (contadorTarjetasRojasEquipo2[idJugadora] == 0) {
              contadorTarjetasRojasEquipo2[idJugadora]++;
              document.getElementById("rojasEquipo2" + idJugadora).innerHTML =
                contadorTarjetasRojasEquipo2[idJugadora];
              almacenarContadoresTarjetas();
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

        imageUrl: "../../img/redCard.svg",
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
            almacenarContadoresTarjetas();
          }
        } else if (equipo == 2) {
          if (contadorTarjetasRojasEquipo2[idJugadora] == 0) {
            contadorTarjetasRojasEquipo2[idJugadora]++;
            document.getElementById("rojasEquipo2" + idJugadora).innerHTML =
              contadorTarjetasRojasEquipo2[idJugadora];
            almacenarContadoresTarjetas();
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

//  ARRAY CON LOS CONTADORES DE TODAS LAS JUGADORAS
let amarillasParciales = [];
let rojasParciales = [];

//  SE OBTIENE LA CANTIDAD DE JUGADORAS PARA ITERAR EL CICLO QUE OBTENDRA LOS CONTADORES
let cantidadJugadorasEquipo1 = idJugadorasEquipo1.length;
let cantidadJugadorasEquipo2 = idJugadorasEquipo2.length;

// SI ESTA VACIO EL ESPACIO EN EL localStorage SE INGRESAN []
// PARA QUE SE PUEDA TOMAR EL OBJETO COMO ARRAY Y NO COMO JSON
if (localStorage.getItem("amarillas") == null) {
  localStorage.setItem("amarillas", "[]");
}

//  SE CREA EL ARRAY DE AMARILLAS PARA ALLI GUARDAR LAS NUEVAS QUE SE SUMARAN DURANTE EL SET
let amarillas = JSON.parse(localStorage.getItem("amarillas"));

//  ----------------------------------------------------------------------------------------

// SI ESTA VACIO EL ESPACIO EN EL localStorage SE INGRESAN []
// PARA QUE SE PUEDA TOMAR EL OBJETO COMO ARRAY Y NO COMO JSON
if (localStorage.getItem("rojas") == null) {
  localStorage.setItem("rojas", "[]");
}

//  SE CREA EL ARRAY DE AMARILLAS PARA ALLI GUARDAR LAS NUEVAS QUE SE SUMARAN DURANTE EL SET
let rojas = JSON.parse(localStorage.getItem("rojas"));

function almacenarContadoresTarjetas() {
  // SE OPTIENEN Y SE GUARDAN LOS CONTADORES DE TARJETAS AMARILLAS

  //  SE INGRESAN LOS VALORES DE LOS CONTADORES DE CADA JUGADORA A UN SOLO ARRAY
  //  QUE TIENE COMO INDICES LOS IDS DE CADA JUGADORA Y COMO VALORES LOS PUNTOS DE CADA UNA
  //  EQUIPO 1
  for (let i = 0; i < cantidadJugadorasEquipo1; i++) {
    amarillasParciales[idJugadorasEquipo1[i]] = parseInt(
      document.getElementById("amarillasEquipo1" + idJugadorasEquipo1[i])
        .textContent
    );
    if (amarillasParciales[idJugadorasEquipo1[i]] == null) {
      amarillasParciales[idJugadorasEquipo1[i]] = 0;
    }
    if (amarillas[i] == null) {
      amarillas.push(amarillasParciales[idJugadorasEquipo1[i]]);
    } else {
      amarillas[i] = amarillasParciales[idJugadorasEquipo1[i]];
    }
  }

  //  EQUIPO 2
  for (let i = 0; i < cantidadJugadorasEquipo2; i++) {
    amarillasParciales[idJugadorasEquipo2[i]] = parseInt(
      document.getElementById("amarillasEquipo2" + idJugadorasEquipo2[i])
        .textContent
    );
    if (amarillasParciales[idJugadorasEquipo2[i]] == null) {
      amarillasParciales[idJugadorasEquipo2[i]] = 0;
    }

    let contador = parseInt(cantidadJugadorasEquipo1);

    if (amarillas[i + contador] == null) {
      amarillas.push(amarillasParciales[idJugadorasEquipo2[i]]);
    } else {
      amarillas[i + contador] = amarillasParciales[idJugadorasEquipo2[i]];
    }
  }

  //  SE ENVIAN LOS CONTADORES AL LOCAL STORAGE
  localStorage.setItem("amarillas", JSON.stringify(amarillas));

  //  ------------------------------------------------------------------------------------------------------------

  // SE OPTIENEN Y SE GUARDAN LOS CONTADORES DE TARJETAS ROJAS

  //  SE INGRESAN LOS VALORES DE LOS CONTADORES DE CADA JUGADORA A UN SOLO ARRAY
  //  QUE TIENE COMO INDICES LOS IDS DE CADA JUGADORA Y COMO VALORES LOS PUNTOS DE CADA UNA
  //  EQUIPO 1
  for (let i = 0; i < cantidadJugadorasEquipo1; i++) {
    rojasParciales[idJugadorasEquipo1[i]] = parseInt(
      document.getElementById("rojasEquipo1" + idJugadorasEquipo1[i])
        .textContent
    );
    if (rojasParciales[idJugadorasEquipo1[i]] == null) {
      rojasParciales[idJugadorasEquipo1[i]] = 0;
    }
    if (rojas[i] == null) {
      rojas.push(rojasParciales[idJugadorasEquipo1[i]]);
    } else {
      rojas[i] = rojasParciales[idJugadorasEquipo1[i]];
    }
  }

  //  EQUIPO 2
  for (let i = 0; i < cantidadJugadorasEquipo2; i++) {
    rojasParciales[idJugadorasEquipo2[i]] = parseInt(
      document.getElementById("rojasEquipo2" + idJugadorasEquipo2[i])
        .textContent
    );
    if (rojasParciales[idJugadorasEquipo2[i]] == null) {
      rojasParciales[idJugadorasEquipo2[i]] = 0;
    }

    let contador = parseInt(cantidadJugadorasEquipo1);

    if (rojas[i + contador] == null) {
      rojas.push(rojasParciales[idJugadorasEquipo2[i]]);
    } else {
      rojas[i + contador] = rojasParciales[idJugadorasEquipo2[i]];
    }
  }

  //  SE ENVIAN LOS CONTADORES AL LOCAL STORAGE
  localStorage.setItem("rojas", JSON.stringify(rojas));
}


function rellenarContadoresTarjetas() {
  //  SE OBTIENEN LOS CONTADORES DE AMARILLAS DE LOS DOS EQUIPOS
  let amarillas = JSON.parse(localStorage.getItem("amarillas"));

  for (let i = 0; i < cantidadJugadorasEquipo1; i++) {
    document.getElementById(
      "amarillasEquipo1" + idJugadorasEquipo1[i]
    ).innerHTML = amarillas[i];
  }
  for (let i = 0; i < cantidadJugadorasEquipo2; i++) {
    document.getElementById(
      "amarillasEquipo2" + idJugadorasEquipo2[i]
    ).innerHTML = amarillas[i + parseInt(cantidadJugadorasEquipo2)];
  }

  //  --------------------------------------------------------------------------------------

  //  SE OBTIENEN LOS CONTADORES DE AMARILLAS DE LOS DOS EQUIPOS
  let rojas = JSON.parse(localStorage.getItem("rojas"));

  for (let i = 0; i < cantidadJugadorasEquipo1; i++) {
    document.getElementById("rojasEquipo1" + idJugadorasEquipo1[i]).innerHTML =
      rojas[i];
  }
  for (let i = 0; i < cantidadJugadorasEquipo2; i++) {
    document.getElementById("rojasEquipo2" + idJugadorasEquipo2[i]).innerHTML =
      rojas[i + parseInt(cantidadJugadorasEquipo2)];
  }
}

/* SE OBTIENE EL EVENTO DEL BOTON/GUARDAR EN AMONESTACIONES PARA EJECUTAR EL ENVIO DE LOS CONTADORES DE LA INTERFAZ
FORMULARIO OCULTO DE LA INTERFAZ QUE ENVIARA LOS CONTADORES A EL BACKEND */
/* document.getElementById("guardarTarjetas").addEventListener("click", () => {
  //  SE ENVIA LAS TARJETAS AMARILLAS DE CADA EQUIPO AL FORMULARIO OCULTO DE LA INTERFAZ
  for (let i = 0; i < cantidadJugadorasEquipo1; i++) {
    document
      .getElementById("amarillasEquipo1[" + idJugadorasEquipo1[i] + "]")
      .setAttribute("value", amarillas[i]);
  }
  for (let i = 0; i < cantidadJugadorasEquipo2; i++) {
    document
      .getElementById("amarillasEquipo2[" + idJugadorasEquipo2[i] + "]")
      .setAttribute("value", amarillas[i + cantidadJugadorasEquipo1]);
  }

  //  SE ENVIA LAS TARJETAS ROJAS DE CADA EQUIPO AL FORMULARIO OCULTO DE LA INTERFAZ
  for (let i = 0; i < cantidadJugadorasEquipo1; i++) {
    document
      .getElementById("rojasEquipo1[" + idJugadorasEquipo1[i] + "]")
      .setAttribute("value", rojas[i]);
  }
  for (let i = 0; i < cantidadJugadorasEquipo2; i++) {
    document
      .getElementById("rojasEquipo2[" + idJugadorasEquipo2[i] + "]")
      .setAttribute("value", rojas[i + cantidadJugadorasEquipo1]);
  }


  //  SE ENVIA LOS IDS DE LAS JUGADORAS DE CADA EQUIPO AL FORMULARIO OCULTO DE LA INTERFAZ
  for (let i = 0; i < cantidadJugadorasEquipo1; i++) {
    document
      .getElementById("idJugadorasEquipo1[" + idJugadorasEquipo1[i] + "]")
      .setAttribute("value", idJugadorasEquipo1[i]);
  }
  for (let i = 0; i < cantidadJugadorasEquipo2; i++) {
    document
      .getElementById("idJugadorasEquipo2[" + idJugadorasEquipo2[i] + "]")
      .setAttribute("value", idJugadorasEquipo2[i]);
  }
}); */