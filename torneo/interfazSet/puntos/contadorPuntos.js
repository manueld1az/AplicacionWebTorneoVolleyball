//                      CONTADOR DE LA INTERFAZ DE PUNTOS

//  ARRAY CON LOS CONTADORES DE TODAS LAS JUGADORAS
let contadoresParciales = [];

//  FUNCION QUE SE EJECUTA AL CARGAR LA VENTANA
window.onload = () => {
  //  SE RELLENAN LOS CONTADORES CON EL ARRAY DEL LOCAL STORAGE GUARDADO AL CAMBIAR DE PAGINA
  rellenarContadores();
};

//  SE OBTIENEN LOS IDS DE LAS JUGADORAS EN ARRAY POR EQUIPO LLAMANDO A LOS JSON DE LA INTERFAZ
//  IDS JUGADORAS EQUIPO 1
var idJugadorasEquipo1 = JSON.parse(idJugadorasEquipo1);

//  IDS JUGADORAS EQUIPO 2
var idJugadorasEquipo2 = JSON.parse(idJugadorasEquipo2);

//  AQUI SE GUARDAN LOS PUNTOS TRANSITORIOS DEL CONTADOR
var contadorEquipo1 = 0;
var contadorEquipo2 = 0;
//  SE CREA PARA VALIDAR SI NO HAY GANADOR PARA PERMITIR MODIFICAR LOS CONTADORES
let ganador = false;

//  -------------------------------------------------------------------------------------------

//  FUNCION PARA EVALUAR SI HAY GANADOR AL MOMENTO
function verificarGanador(nombreEquipo1, nombreEquipo2, ganador) {
  if (contadorEquipo1 >= 3) {
    Swal.fire({
      title: "<b>El equipo " + nombreEquipo1 + " es el ganador de este set</b>",
      // text:
      // html:
      icon: "info",
      // confirmButtonText:
      footer: "Ahora debe guardar la informacion",
      width: "98%",
      padding: "1rem 1rem",
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
    ganador = true;
    // SE HABILITA EL BOTON DE GUARDAR SOLO SI YA HAY GANADOR SI NO EL BOTON SIGUE DESHABILITADO
    document.getElementById("guardarPuntos").disabled = false;
  } else if (contadorEquipo2 >= 3) {
    Swal.fire({
      title: "<b>El equipo " + nombreEquipo2 + " es el ganador este set</b>",
      // text:
      // html:
      icon: "info",
      // confirmButtonText:
      footer: "Ahora debe guardar la informacion",
      width: "98%",
      padding: "1rem 1rem",
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
    ganador = true;
    // SE HABILITA EL BOTON DE GUARDAR SOLO SI YA HAY GANADOR SI NO EL BOTON SIGUE DESHABILITADO
    document.getElementById("guardarPuntos").disabled = false;
  } else {
    ganador = false;
    document.getElementById("guardarPuntos").disabled = true;
  }
  return ganador;
}

//-----------------------------------------------------------------------------------------------

//  FUNCION PARA SUMAR UN PUNTO AL EQUIPO 1
function countingClicks(idJugadora, ganador) {
  //  AQUI SE GUARDAN LOS PUNTOS TRANSITORIOS DE CADA EQUIPO
  let puntosEquipo1 = parseInt(document.getElementById(idJugadora).textContent);
  document.getElementById(idJugadora).innerHTML = ++puntosEquipo1;

  if (puntosEquipo1 > 0) {
    puntosJugadorasEquipo1[idJugadora] = puntosEquipo1;
    let cantidadJugadorasEquipo1 = document
      .getElementById("cantidadJugadorasEquipo1")
      .getAttribute("value");
    for (let i = 0; i < cantidadJugadorasEquipo1; i++) {
      document
        .getElementById("puntosJugadorasEquipo1[" + idJugadora + "]")
        .setAttribute("value", puntosJugadorasEquipo1[idJugadora]);
    }
  }

  //  SE OPTIENE LOS NOMBRES DE LOS EQUIPOS PARA MOSTRARLOS EN LA ALERTA PERSONALIZADA
  let nombreEquipo1 = document.getElementById("nombreEquipo1").innerHTML;
  let nombreEquipo2 = document.getElementById("nombreEquipo2").innerHTML;
  obtenerContadoresEquipo1(
    idJugadora,
    cantidadJugadorasEquipo1,
    puntosJugadorasEquipo1
  );
  almacenarContadores();
  //  SE SUMA LOS PUNTOS DE CADA JUGADORA DEL EQUIPO DEL ARRAY CONTADORES PARCIALES
  sumarPuntosEquipo1();
  verificarGanador(
    contadorEquipo1,
    contadorEquipo2,
    nombreEquipo1,
    nombreEquipo2,
    ganador
  );
}

//  FUNCION PARA RESTAR UN PUNTO AL EQUIPO 1
function deductClicks(idJugadora, ganador) {
  //  AQUI SE GUARDAN LOS PUNTOS TRANSITORIOS DE CADA EQUIPO
  let puntosEquipo1 = parseInt(document.getElementById(idJugadora).textContent);
  //  CREAR EL IF PARA NO PERMITIR BAJAR DE 0 PUNTOS
  if (puntosEquipo1 > 0) {
    document.getElementById(idJugadora).innerHTML = --puntosEquipo1;
    if (puntosEquipo1 > 0) {
      puntosJugadorasEquipo1[idJugadora] = puntosEquipo1;

      let cantidadJugadorasEquipo1 = document
        .getElementById("cantidadJugadorasEquipo1")
        .getAttribute("value");
      for (let i = 0; i < cantidadJugadorasEquipo1; i++) {
        document
          .getElementById("puntosJugadorasEquipo1[" + idJugadora + "]")
          .setAttribute("value", puntosJugadorasEquipo1[idJugadora]);
      }
    }

    //  SE OPTIENE LOS NOMBRES DE LOS EQUIPOS PARA MOSTRARLOS EN LA ALERTA PERSONALIZADA
    let nombreEquipo1 = document.getElementById("nombreEquipo1").innerHTML;
    let nombreEquipo2 = document.getElementById("nombreEquipo2").innerHTML;
    obtenerContadoresEquipo1(
      idJugadora,
      cantidadJugadorasEquipo1,
      puntosJugadorasEquipo1
    );
  }
  almacenarContadores();
  //  SE SUMA LOS PUNTOS DE CADA JUGADORA DEL EQUIPO DEL ARRAY CONTADORES PARCIALES
  sumarPuntosEquipo1();
  verificarGanador(
    contadorEquipo1,
    contadorEquipo2,
    nombreEquipo1,
    nombreEquipo2,
    ganador
  );
}

//  FUNCION PARA SUMAR UN PUNTO AL EQUIPO 2
function countingClicksb(idJugadora, ganador) {
  //  AQUI SE GUARDAN LOS PUNTOS TRANSITORIOS DE CADA EQUIPO
  let puntosEquipo2 = parseInt(document.getElementById(idJugadora).textContent);
  document.getElementById(idJugadora).innerHTML = ++puntosEquipo2;

  if (puntosEquipo2 > 0) {
    puntosJugadorasEquipo2[idJugadora] = puntosEquipo2;
    let cantidadJugadorasEquipo2 = document
      .getElementById("cantidadJugadorasEquipo2")
      .getAttribute("value");
    for (let i = 0; i < cantidadJugadorasEquipo2; i++) {
      document
        .getElementById("puntosJugadorasEquipo2[" + idJugadora + "]")
        .setAttribute("value", puntosJugadorasEquipo2[idJugadora]);
    }
  }

  //  SE OPTIENE LOS NOMBRES DE LOS EQUIPOS PARA MOSTRARLOS EN LA ALERTA PERSONALIZADA
  let nombreEquipo1 = document.getElementById("nombreEquipo1").innerHTML;
  let nombreEquipo2 = document.getElementById("nombreEquipo2").innerHTML;
  obtenerContadoresEquipo1(
    idJugadora,
    cantidadJugadorasEquipo2,
    puntosJugadorasEquipo2
  );
  almacenarContadores();
  //  SE SUMA LOS PUNTOS DE CADA JUGADORA DEL EQUIPO DEL ARRAY CONTADORES PARCIALES
  sumarPuntosEquipo2();
  verificarGanador(
    contadorEquipo1,
    contadorEquipo2,
    nombreEquipo1,
    nombreEquipo2,
    ganador
  );
}

//  FUNCION PARA RESTAR UN PUNTO AL EQUIPO 2
function deductClicksb(idJugadora, ganador) {
  //  AQUI SE GUARDAN LOS PUNTOS TRANSITORIOS DE CADA EQUIPO
  let puntosEquipo2 = parseInt(document.getElementById(idJugadora).textContent);
  //  CREAR EL IF PARA NO PERMITIR BAJAR DE 0 PUNTOS
  if (puntosEquipo2 > 0) {
    document.getElementById(idJugadora).innerHTML = --puntosEquipo2;
    if (puntosEquipo2 > 0) {
      puntosJugadorasEquipo2[idJugadora] = puntosEquipo2;
      let cantidadJugadorasEquipo2 = document
        .getElementById("cantidadJugadorasEquipo2")
        .getAttribute("value");
      for (let i = 0; i < cantidadJugadorasEquipo2; i++) {
        document
          .getElementById("puntosJugadorasEquipo2[" + idJugadora + "]")
          .setAttribute("value", puntosJugadorasEquipo2[idJugadora]);
      }
    }

    //  SE OPTIENE LOS NOMBRES DE LOS EQUIPOS PARA MOSTRARLOS EN LA ALERTA PERSONALIZADA
    let nombreEquipo1 = document.getElementById("nombreEquipo1").innerHTML;
    let nombreEquipo2 = document.getElementById("nombreEquipo2").innerHTML;
    obtenerContadoresEquipo1(
      idJugadora,
      cantidadJugadorasEquipo2,
      puntosJugadorasEquipo2
    );
  }
  almacenarContadores();
  //  SE SUMA LOS PUNTOS DE CADA JUGADORA DEL EQUIPO DEL ARRAY CONTADORES PARCIALES
  sumarPuntosEquipo2();
  verificarGanador(
    contadorEquipo1,
    contadorEquipo2,
    nombreEquipo1,
    nombreEquipo2,
    ganador
  );
}

//----------------------------------------------------------------------------------

//  SE CREAN LOS ARRAYS POR EQUIPO CON LOS PUNTAJES DE CADA JUGADORA
let puntosJugadorasEquipo1 = [];
let puntosJugadorasEquipo2 = [];

function obtenerContadoresEquipo1(
  idJugadora,
  cantidadJugadorasEquipo1,
  puntosJugadorasEquipo1
) {
  // console.log(puntosJugadorasEquipo1);
  return puntosJugadorasEquipo1;
}

function obtenerContadoresEquipo2(
  idJugadora,
  cantidadJugadorasEquipo2,
  puntosJugadorasEquipo2
) {
  // console.log(puntosJugadorasEquipo2);
  return puntosJugadorasEquipo2;
}

function almacenarContadores() {
  //  SE CREA EL ARRAY DE CONTADORES ALMACENADOS PARA ALLI GUARDAR LOS NUEVOS
  let contadoresGuardados = JSON.parse(
    localStorage.getItem("contadoresGuardados")
  );

  let contador = parseInt(cantidadJugadorasEquipo1.value);
  //  SE INGRESAN LOS VALORES DE LOS CONTADORES DE CADA JUGADORA A UN SOLO ARRAY
  //  QUE TIENE COMO INDICES LOS IDS DE CADA JUGADORA Y COMO VALORES LOS PUNTOS DE CADA UNA
  for (let i = 0; i < cantidadJugadorasEquipo1.value; i++) {
    contadoresParciales[idJugadorasEquipo1[i]] = parseInt(
      document.getElementById(idJugadorasEquipo1[i]).textContent
    );
    if (contadoresParciales[idJugadorasEquipo1[i]] == null) {
      contadoresParciales[idJugadorasEquipo1[i]] = 0;
    }
    if (contadoresGuardados[i] == null) {
      contadoresGuardados.push(contadoresParciales[idJugadorasEquipo1[i]]);
    } else {
      contadoresGuardados[i] = contadoresParciales[idJugadorasEquipo1[i]];
    }
  }
  for (let i = 0; i < cantidadJugadorasEquipo2.value; i++) {
    contadoresParciales[idJugadorasEquipo2[i]] = parseInt(
      document.getElementById(idJugadorasEquipo2[i]).textContent
    );
    if (contadoresParciales[idJugadorasEquipo2[i]] == null) {
      contadoresParciales[idJugadorasEquipo2[i]] = 0;
    }
    if (contadoresGuardados[i + contador] == null) {
      contadoresGuardados.push(contadoresParciales[idJugadorasEquipo2[i]]);
    } else {
      contadoresGuardados[i + contador] =
        contadoresParciales[idJugadorasEquipo2[i]];
    }
  }

  localStorage.setItem(
    "contadoresGuardados",
    JSON.stringify(contadoresGuardados)
  );
}

//  TOMAR CONTADORES PREVIOS SI EXITEN, COMO PARAMETROS Y RELLENAR LOS VALORES NUEVAMENTE
//  EN LOS REGISTROS DE CADA JUGADORA TENIENDO EN CUENTA SU ID
function rellenarContadores() {
  // SI ESTA VACIO EL ESPACIO EN EL localStorage SE INGRESAN []
  // PARA QUE SE PUEDA TOMAR EL OBJETO COMO ARRAY Y NO COMO JSON
  if (localStorage.getItem("contadoresGuardados") == null) {
    localStorage.setItem("contadoresGuardados", "[]");
    // SE DESHABILITA EL BOTON GUARDAR SI AUN NO HA EMPEZADO EL SET
    document.getElementById("guardarPuntos").disabled = true;
  }
  // SE DESHABILITA EL BOTON GUARDAR SI AUN NO HAY EQUIPO GANDADOR
  if (!ganador) {
    document.getElementById("guardarPuntos").disabled = true;
  }

  let contadoresGuardados = JSON.parse(
    localStorage.getItem("contadoresGuardados")
  );

  for (let i = 0; i < cantidadJugadorasEquipo1.value; i++) {
    if (contadoresGuardados[i] == null) {
      contadoresGuardados[i] = 0;
    }
    document.getElementById(idJugadorasEquipo1[i]).innerHTML =
      contadoresGuardados[i];
  }
  for (let i = 0; i < cantidadJugadorasEquipo2.value; i++) {
    if (
      contadoresGuardados[i + parseInt(cantidadJugadorasEquipo2.value)] == null
    ) {
      contadoresGuardados[i + parseInt(cantidadJugadorasEquipo2.value)] = 0;
    }
    document.getElementById(idJugadorasEquipo2[i]).innerHTML =
      contadoresGuardados[i + parseInt(cantidadJugadorasEquipo2.value)];
  }
}

//  -----------------------------------------------------------------------------------------

/*  SE SUMAN LOS PUNTOS DE LA INTERFAZ AL CONTADOR POR EQUIPOS Y ASI NO SE REINICIA EL CONTEO GENERAL
    CADA QUE	SE RECARGUE LA PAGINA. */
function sumarPuntosEquipo1() {
  //  SE TOMAN LOS PUNTOS DE LOS CONTADORES POR JUGADORA Y SE SUMAN A UNA VARIABLE GENERAL DE EQUIPO1
  let contadorParcialEquipo1 = 0;
  for (let i = 0; i < idJugadorasEquipo1.length; i++) {
    contadorParcialEquipo1 += parseInt(
      document.getElementById(idJugadorasEquipo1[i]).textContent
    );
  }
  contadorEquipo1 = contadorParcialEquipo1;
  // SE ENVIA LOS PUNTOS POR EQUIPO AL FORMULARIO OCULTO
  document
    .getElementById("puntosEquipo1")
    .setAttribute("value", contadorEquipo1);
  console.log("PUNTOS EQUIPO 1: " + contadorEquipo1);
}

function sumarPuntosEquipo2() {
  //  SE TOMAN LOS PUNTOS DE LOS CONTADORES POR JUGADORA Y SE SUMAN A UNA VARIABLE GENERAL DE EQUIPO2
  let contadorParcialEquipo2 = 0;
  for (let i = 0; i < idJugadorasEquipo2.length; i++) {
    contadorParcialEquipo2 += parseInt(
      document.getElementById(idJugadorasEquipo2[i]).textContent
    );
  }
  contadorEquipo2 = contadorParcialEquipo2;
  // SE ENVIA LOS PUNTOS POR EQUIPO AL FORMULARIO OCULTO
  document
    .getElementById("puntosEquipo2")
    .setAttribute("value", contadorEquipo2);
  console.log("PUNTOS EQUIPO 2: " + contadorEquipo2);
}

//  ------------------------------------------------------------------------------

//  REINICIAR CONTADORES SI SE PRESIONA EL BOTON GUARDAR.
document.getElementById("guardarPuntos").addEventListener("click", () => {
  //  REINICIAR CONTADORES EN LA INTERFAZ PARA ELLO SE REINICIA LOS CONTADORES DEL LOCAL STORAGE
  //  Y AL PRESIONAR EL BOTON SE RECARGA LA PAGINA, ENTONCES LA INTERFAZ TOMARA LOS CONTADORES
  //  DEL LOCAL STORAGE AUTOMATICAMENTE.
  let contadoresGuardados = JSON.parse(
    localStorage.getItem("contadoresGuardados")
  );
  for (let i = 0; i < contadoresGuardados.length; i++) {
    contadoresGuardados[i] = 0;
  }
  localStorage.setItem(
    "contadoresGuardados",
    JSON.stringify(contadoresGuardados)
  );
});
