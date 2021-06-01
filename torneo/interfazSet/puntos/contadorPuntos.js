//   CONTADOR DE LA INTERFAZ DE PUNTOS

//  VARIABLES PARA EL FRONTEND

//  AQUI SE GUARDAN LOS PUNTOS DE LAS JUGADORAS
let puntosJugadorasEquipo1 = [];
let puntosJugadorasEquipo2 = [];
//  AQUI SE GUARDAN LOS PUNTOS TRANSITORIOS DEL CONTADOR
let contadorEquipo1 = 0;
let contadorEquipo2 = 0;
//  SE CREA PARA VALIDAR SI NO HAY GANADOR PARA PERMITIR MODIFICAR LOS CONTADORES
let ganador = false;

//  FUNCION PARA EVALUAR SI HAY GANADOR AL MOMENTO
async function verificarGanador(
  contadorEquipo1,
  contadorEquipo2,
  nombreEquipo1,
  nombreEquipo2,
  ganador
) {
  if (contadorEquipo1 == 3) {
    await Swal.fire({
      title:
        "<b>El equipo " + nombreEquipo1 + " es el ganador del encuentro</b>",
      // text:
      // html:
      icon: "info",
      // confirmButtonText:
      footer: "Ahora debe guardar la informacion",
      width: "90%",
      padding: "3rem 1rem",
      // background:
      // grow:
      // backdrop:
      // timer:
      // timerProgressBar:
      toast: true,
      position: "bottom",
      allowOutsideClick: false,
      allowEscapeKey: false,
      allowEnterKey: false,
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
      // },

      showConfirmButton: false,
      // confirmButtonColor: "#1d3557",
      // confirmButtonAriaLabel: "Aceptar",

      // showCancelButton:
      // cancelButtonText:
      // cancelButtonColor:
      // cancelButtonAriaLabel:

      // buttonsStyling:
      showCloseButton: false,
      // closeButtonAriaLabel: "Cerrar",

      // imageUrl:
      // imageWidth:
      // imageHeight:
      // imageAlt:
    });
    document.getElementById("ganador").setAttribute("value", ganador);
  } else if (contadorEquipo2 == 3) {
    await Swal.fire({
      title:
        "<b>El equipo " + nombreEquipo2 + " es el ganador del encuentro</b>",
      // text:
      // html:
      icon: "info",
      // confirmButtonText:
      footer: "Ahora debe guardar la informacion",
      width: "90%",
      padding: "3rem 1rem",
      // background:
      // grow:
      // backdrop:
      // timer:
      // timerProgressBar:
      toast: true,
      position: "bottom",
      allowOutsideClick: false,
      allowEscapeKey: false,
      allowEnterKey: false,
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
      // },

      showConfirmButton: false,
      // confirmButtonColor: "#1d3557",
      // confirmButtonAriaLabel: "Aceptar",

      // showCancelButton:
      // cancelButtonText:
      // cancelButtonColor:
      // cancelButtonAriaLabel:

      // buttonsStyling:
      showCloseButton: false,
      // closeButtonAriaLabel: "Cerrar",

      // imageUrl:
      // imageWidth:
      // imageHeight:
      // imageAlt:
    });
    document.getElementById("ganador").setAttribute("value", ganador);
  }
  return ganador;
}

//-----------------------------------------------------------------------------------------------

//  FUNCION PARA SUMAR UN PUNTO AL EQUIPO 1
function countingClicks(idJugadora, codigoEquipo, ganador) {
  //  AQUI SE GUARDAN LOS PUNTOS TRANSITORIOS DE CADA EQUIPO
  let puntosEquipo1 = parseInt(document.getElementById(idJugadora).textContent);
  document.getElementById(idJugadora).innerHTML = ++puntosEquipo1;
  contadorEquipo1++;
  console.log("equipo1 - " + contadorEquipo1);
  puntosJugadorasEquipo1[idJugadora] = puntosEquipo1;
  //console.log(codigoEquipo);
  //console.log(puntosJugadorasEquipo1);
  document
    .getElementById("puntosEquipo1")
    .setAttribute("value", contadorEquipo1);
  let cantidadJugadorasEquipo1 = document
    .getElementById("cantidadJugadorasEquipo1")
    .getAttribute("value");
  for (let i = 0; i < cantidadJugadorasEquipo1; i++) {
    document
      .getElementById("puntosJugadorasEquipo1[" + idJugadora + "]")
      .setAttribute("value", puntosJugadorasEquipo1[idJugadora]);
  }
  console.log(puntosJugadorasEquipo1);

  //  SE OPTIENE LOS NOMBRES DE LOS EQUIPOS PARA MOSTRARLOS EN LA ALERTA PERSONALIZADA
  let nombreEquipo1 = document.getElementById("nombreEquipo1").innerHTML;
  let nombreEquipo2 = document.getElementById("nombreEquipo2").innerHTML;
  verificarGanador(
    contadorEquipo1,
    contadorEquipo2,
    nombreEquipo1,
    nombreEquipo2,
    ganador
  );

  return contadorEquipo1;
}

//  FUNCION PARA RESTAR UN PUNTO AL EQUIPO 1
function deductClicks(idJugadora, codigoEquipo, ganador) {
  //  AQUI SE GUARDAN LOS PUNTOS TRANSITORIOS DE CADA EQUIPO
  let puntosEquipo1 = parseInt(document.getElementById(idJugadora).textContent);
  document.getElementById(idJugadora).innerHTML = --puntosEquipo1;
  contadorEquipo1--;
  console.log("equipo1 - " + contadorEquipo1);
  puntosJugadorasEquipo1[idJugadora] = puntosEquipo1;
  //console.log(codigoEquipo);
  //console.log(puntosJugadorasEquipo1);
  document
    .getElementById("puntosEquipo1")
    .setAttribute("value", contadorEquipo1);
  let cantidadJugadorasEquipo1 = document
    .getElementById("cantidadJugadorasEquipo1")
    .getAttribute("value");
  for (let i = 0; i < cantidadJugadorasEquipo1; i++) {
    document
      .getElementById("puntosJugadorasEquipo1[" + idJugadora + "]")
      .setAttribute("value", puntosJugadorasEquipo1[idJugadora]);
  }
  console.log(puntosJugadorasEquipo1);

  //  SE OPTIENE LOS NOMBRES DE LOS EQUIPOS PARA MOSTRARLOS EN LA ALERTA PERSONALIZADA
  let nombreEquipo1 = document.getElementById("nombreEquipo1").innerHTML;
  let nombreEquipo2 = document.getElementById("nombreEquipo2").innerHTML;
  verificarGanador(
    contadorEquipo1,
    contadorEquipo2,
    nombreEquipo1,
    nombreEquipo2,
    ganador
  );
}

//  FUNCION PARA SUMAR UN PUNTO AL EQUIPO 2
function countingClicksb(idJugadora, codigoEquipo, ganador) {
  //  AQUI SE GUARDAN LOS PUNTOS TRANSITORIOS DE CADA EQUIPO
  let puntosEquipo2 = parseInt(document.getElementById(idJugadora).textContent);
  document.getElementById(idJugadora).innerHTML = ++puntosEquipo2;
  contadorEquipo2++;
  console.log("equipo2 - " + contadorEquipo2);
  puntosJugadorasEquipo2[idJugadora] = puntosEquipo2;
  //console.log(codigoEquipo);
  //console.log(puntosJugadorasEquipo2);
  document
    .getElementById("puntosEquipo2")
    .setAttribute("value", contadorEquipo2);
  let cantidadJugadorasEquipo2 = document
    .getElementById("cantidadJugadorasEquipo2")
    .getAttribute("value");
  for (let i = 0; i < cantidadJugadorasEquipo2; i++) {
    document
      .getElementById("puntosJugadorasEquipo2[" + idJugadora + "]")
      .setAttribute("value", puntosJugadorasEquipo2[idJugadora]);
  }
  console.log(puntosJugadorasEquipo2);

  //  SE OPTIENE LOS NOMBRES DE LOS EQUIPOS PARA MOSTRARLOS EN LA ALERTA PERSONALIZADA
  let nombreEquipo1 = document.getElementById("nombreEquipo1").innerHTML;
  let nombreEquipo2 = document.getElementById("nombreEquipo2").innerHTML;
  verificarGanador(
    contadorEquipo1,
    contadorEquipo2,
    nombreEquipo1,
    nombreEquipo2,
    ganador
  );
}

//  FUNCION PARA RESTAR UN PUNTO AL EQUIPO 2
function deductClicksb(idJugadora, codigoEquipo, ganador) {
  //  AQUI SE GUARDAN LOS PUNTOS TRANSITORIOS DE CADA EQUIPO
  let puntosEquipo2 = parseInt(document.getElementById(idJugadora).textContent);
  document.getElementById(idJugadora).innerHTML = --puntosEquipo2;
  contadorEquipo2--;
  console.log("equipo2 - " + contadorEquipo2);
  puntosJugadorasEquipo2[idJugadora] = puntosEquipo2;
  //console.log(codigoEquipo);
  //console.log(puntosJugadorasEquipo2);
  document
    .getElementById("puntosEquipo2")
    .setAttribute("value", contadorEquipo2);
  let cantidadJugadorasEquipo2 = document
    .getElementById("cantidadJugadorasEquipo2")
    .getAttribute("value");
  for (let i = 0; i < cantidadJugadorasEquipo2; i++) {
    document
      .getElementById("puntosJugadorasEquipo2[" + idJugadora + "]")
      .setAttribute("value", puntosJugadorasEquipo2[idJugadora]);
  }
  console.log(puntosJugadorasEquipo2);

  //  SE OPTIENE LOS NOMBRES DE LOS EQUIPOS PARA MOSTRARLOS EN LA ALERTA PERSONALIZADA
  let nombreEquipo1 = document.getElementById("nombreEquipo1").innerHTML;
  let nombreEquipo2 = document.getElementById("nombreEquipo2").innerHTML;
  verificarGanador(
    contadorEquipo1,
    contadorEquipo2,
    nombreEquipo1,
    nombreEquipo2,
    ganador
  );
}
