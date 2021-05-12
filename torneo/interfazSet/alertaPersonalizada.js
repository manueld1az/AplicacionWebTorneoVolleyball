let contadorJugadora1Equipo1=0;
let contadorJugadora1Equipo2=0;
let equipo = "";

async function  alertaConfirmarTarjeta() {
  let tarjetaSeleccionada = "";
  
  let tarjetaSeleccionadaEquipo1 = document.getElementById("tarjetaSeleccionadaEquipo1").value;
  let tarjetaSeleccionadaEquipo2 = document.getElementById("tarjetaSeleccionadaEquipo2").value;
  
  if (tarjetaSeleccionadaEquipo1 != "0" || tarjetaSeleccionadaEquipo2 != "0") {
    if (tarjetaSeleccionadaEquipo1 == "1" || tarjetaSeleccionadaEquipo2 == "1") {
      tarjetaSeleccionada = "amarilla";
    } else if (tarjetaSeleccionadaEquipo1 == "2" || tarjetaSeleccionadaEquipo2 == "2") {
      tarjetaSeleccionada = "roja";
    }
    if (tarjetaSeleccionadaEquipo1=="1" || tarjetaSeleccionadaEquipo1=="2"){
        equipo = "1";
    }else if (tarjetaSeleccionadaEquipo2=="1" || tarjetaSeleccionadaEquipo2=="2"){
        equipo = "2";
    }
    const {value: confirmacion}= await Swal.fire({
      // title:
      text: "Esta segur@ de sumar la tarjeta "+tarjetaSeleccionada+" a la jugadora (1) del equipo "+equipo,
      // html:
      // icon: 'warning',
      confirmButtonText: "Aceptar",
      footer: "Por favor confirme la tarjeta "+tarjetaSeleccionada,
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
    if (confirmacion){
        if (equipo=="1"){
            contadorJugadora1Equipo1++;
        }else if (equipo=="2"){
            contadorJugadora1Equipo2++;
        }   
    }

    if (equipo=="1"){
        console.log("Los puntos del equipo 1 son:"+contadorJugadora1Equipo1);
    }else if (equipo=="2"){
        console.log("Los puntos del equipo 2 son:"+contadorJugadora1Equipo2);
    }
  }
}
