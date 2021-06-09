//  ARRAY CON LOS CONTADORES DE TODAS LAS JUGADORAS
let contadoresParciales = [];

//  FUNCION QUE SE EJECUTA AL CARGAR LA VENTANA
window.onload = () => {
  //  SE RELLENAN LOS CONTADORES CON EL ARRAY DEL LOCAL STORAGE GUARDADO AL CAMBIAR DE PAGINA
  rellenarContadores();
};

//   CONTADOR DE LA INTERFAZ DE PUNTOS

//  SE OBTIENEN LOS IDS DE LAS JUGADORAS EN ARRAY POR EQUIPO LLAMANDO A LOS JSON DE LA INTERFAZ

//  IDS JUGADORAS EQUIPO 1
var idJugadorasEquipo1 = JSON.parse(idJugadorasEquipo1);
// console.log(idJugadorasEquipo1);

//  IDS JUGADORAS EQUIPO 2
var idJugadorasEquipo2 = JSON.parse(idJugadorasEquipo2);
// console.log(idJugadorasEquipo2);

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
  if (contadorEquipo1 == 25) {
    await Swal.fire({
      title: "<b>El equipo " + nombreEquipo1 + " es el ganador de este set</b>",
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
    ganador = true;
    document.getElementById("ganador").setAttribute("value", ganador);
  } else if (contadorEquipo2 == 25) {
    await Swal.fire({
      title: "<b>El equipo " + nombreEquipo2 + " es el ganador este set</b>",
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
    ganador = true;
    document.getElementById("ganador").setAttribute("value", ganador);
  }
  return ganador;
}

//-----------------------------------------------------------------------------------------------

//  FUNCION PARA SUMAR UN PUNTO AL EQUIPO 1
function countingClicks(idJugadora, ganador) {
  //  AQUI SE GUARDAN LOS PUNTOS TRANSITORIOS DE CADA EQUIPO
  let puntosEquipo1 = parseInt(document.getElementById(idJugadora).textContent);
  document.getElementById(idJugadora).innerHTML = ++puntosEquipo1;
  contadorEquipo1++;
  // console.log("equipo1 - " + contadorEquipo1);
  if (puntosEquipo1 > 0) {
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
      // compartirIdJugadora(idJugadora);
    }
    // console.log(puntosJugadorasEquipo1);
  }

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
  obtenerContadoresEquipo1(
    idJugadora,
    cantidadJugadorasEquipo1,
    puntosJugadorasEquipo1
  );
  almacenarContadores();
  return contadorEquipo1;
}

//  FUNCION PARA RESTAR UN PUNTO AL EQUIPO 1
function deductClicks(idJugadora, ganador) {
  //  AQUI SE GUARDAN LOS PUNTOS TRANSITORIOS DE CADA EQUIPO
  let puntosEquipo1 = parseInt(document.getElementById(idJugadora).textContent);
  //  CREAR EL IF PARA NO PERMITIR BAJAR DE 0 PUNTOS
  if (puntosEquipo1 > 0) {
    document.getElementById(idJugadora).innerHTML = --puntosEquipo1;
    if (puntosEquipo1 > 0) {
      contadorEquipo1--;
      // console.log("equipo1 - " + contadorEquipo1);
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
        // compartirIdJugadora(idJugadora);
      }
    }
    // console.log(puntosJugadorasEquipo1);

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
    obtenerContadoresEquipo1(
      idJugadora,
      cantidadJugadorasEquipo1,
      puntosJugadorasEquipo1
    );
  }
  almacenarContadores();
  return contadorEquipo1;
}

//  FUNCION PARA SUMAR UN PUNTO AL EQUIPO 2
function countingClicksb(idJugadora, ganador) {
  //  AQUI SE GUARDAN LOS PUNTOS TRANSITORIOS DE CADA EQUIPO
  let puntosEquipo2 = parseInt(document.getElementById(idJugadora).textContent);
  document.getElementById(idJugadora).innerHTML = ++puntosEquipo2;
  contadorEquipo2++;
  // console.log("equipo2 - " + contadorEquipo2);
  if (puntosEquipo2 > 0) {
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
      // compartirIdJugadora(idJugadora);
    }
    // console.log(puntosJugadorasEquipo2);
  }

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
  obtenerContadoresEquipo1(
    idJugadora,
    cantidadJugadorasEquipo2,
    puntosJugadorasEquipo2
  );
  almacenarContadores();
  return contadorEquipo2;
}

//  FUNCION PARA RESTAR UN PUNTO AL EQUIPO 2
function deductClicksb(idJugadora, ganador) {
  //  AQUI SE GUARDAN LOS PUNTOS TRANSITORIOS DE CADA EQUIPO
  let puntosEquipo2 = parseInt(document.getElementById(idJugadora).textContent);
  //  CREAR EL IF PARA NO PERMITIR BAJAR DE 0 PUNTOS
  if (puntosEquipo2 > 0) {
    document.getElementById(idJugadora).innerHTML = --puntosEquipo2;
    if (puntosEquipo2 > 0) {
      contadorEquipo2--;
      // console.log("equipo2 - " + contadorEquipo2);
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
        // compartirIdJugadora(idJugadora);
      }
    }
    // console.log(puntosJugadorasEquipo2);

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
    obtenerContadoresEquipo1(
      idJugadora,
      cantidadJugadorasEquipo2,
      puntosJugadorasEquipo2
    );
  }
  almacenarContadores();
  return contadorEquipo2;
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
  console.log(puntosJugadorasEquipo1);
  return puntosJugadorasEquipo1;
}

function obtenerContadoresEquipo2(
  idJugadora,
  cantidadJugadorasEquipo2,
  puntosJugadorasEquipo2
) {
  console.log(puntosJugadorasEquipo2);
  return puntosJugadorasEquipo2;
}

function almacenarContadores() {
  // SI ESTA VACIO EL ESPACIO EN EL localStorage SE INGRESAN []
  // PARA QUE SE PUEDA TOMAR EL OBJETO COMO ARRAY Y NO COMO JSON
  if (localStorage.getItem("contadoresGuardados") == null) {
    localStorage.setItem("contadoresGuardados", "[]");
  }

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
  let contadoresGuardados = JSON.parse(
    localStorage.getItem("contadoresGuardados")
  );

  for (let i = 0; i < cantidadJugadorasEquipo1.value; i++) {
    document.getElementById(idJugadorasEquipo1[i]).innerHTML =
      contadoresGuardados[i];
  }
  for (let i = 0; i < cantidadJugadorasEquipo2.value; i++) {
    document.getElementById(idJugadorasEquipo2[i]).innerHTML =
      contadoresGuardados[i + parseInt(cantidadJugadorasEquipo2.value)];
  }
}
