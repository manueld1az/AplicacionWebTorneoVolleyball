let contadorTarjetasAmarillasEquipo1=0;
let contadorTarjetasRojasEquipo1=0;
let contadorTarjetasAmarillasEquipo2=0;
let contadorTarjetasRojasEquipo2=0;
document.getElementById("contadorEquipo1Amarillas").innerHTML = 0;
document.getElementById("contadorEquipo2Amarillas").innerHTML = 0;
document.getElementById("contadorEquipo1Rojas").innerHTML = 0;
document.getElementById("contadorEquipo2Rojas").innerHTML = 0;

async function  alertaConfirmarTarjeta() {

  let tarjetaSeleccionada=0;
  let equipo = 0;
  
  //  SE OPTIENE LA OPCION SELECCIONADA EN EL SELECT DEL HTML 
  let tarjetaSeleccionadaEquipo1 = document.getElementById("tarjetaSeleccionadaEquipo1").value;

  let tarjetaSeleccionadaEquipo2 = document.getElementById("tarjetaSeleccionadaEquipo2").value;

  //  SE EVALUA SI SE HA SELECCIONA UNA DE LAS OPCIONES QUE CONTIENE UNA TARJETA  
  if (tarjetaSeleccionadaEquipo1 != "0" || tarjetaSeleccionadaEquipo2 != "0") {

    //  SE EVALUA LA TARJETA RECIBIDA A QUE EQUIPO PERTENECE
    if (tarjetaSeleccionadaEquipo1=="1" || tarjetaSeleccionadaEquipo1=="2"){
      equipo = 1;
    }else if (tarjetaSeleccionadaEquipo2=="1" || tarjetaSeleccionadaEquipo2=="2"){
      equipo = 2;
    }

    //  SE EVALUA SI SE RECIBIO UNA TARJETA AMARILLA O ROJA
    if (tarjetaSeleccionadaEquipo1=="1" || tarjetaSeleccionadaEquipo2=="1"){
      tarjetaSeleccionada=1;
    }else{
      tarjetaSeleccionada=2;
    }
    
    //  SE EVALUA QUE SE DEBE MOSTRAR LA ALERTA DE CONFIRMACION DE LA TARJETA AMARILLA
    if (tarjetaSeleccionada == 1) {
      const {value: confirmacionAmarilla}= await Swal.fire({
        // title:
        text: "Esta segur@ de sumar la tarjeta amarilla a la jugadora (1) del equipo "+equipo,
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
      if (confirmacionAmarilla){
        if (equipo==1){
          if (contadorTarjetasAmarillasEquipo1<2){
            contadorTarjetasAmarillasEquipo1++;
          }
          document.getElementById("contadorEquipo1Amarillas").innerHTML = contadorTarjetasAmarillasEquipo1;
          if (contadorTarjetasAmarillasEquipo1==2){
            if (contadorTarjetasRojasEquipo1==0){
              contadorTarjetasRojasEquipo1++;
              document.getElementById("contadorEquipo1Rojas").innerHTML = contadorTarjetasRojasEquipo1;
            }
          }
        }else if (equipo==2){
          if (contadorTarjetasAmarillasEquipo2<2){
            contadorTarjetasAmarillasEquipo2++;
          }
          document.getElementById("contadorEquipo2Amarillas").innerHTML = contadorTarjetasAmarillasEquipo2;
          if (contadorTarjetasAmarillasEquipo2==2){
            if (contadorTarjetasRojasEquipo2==0){
              contadorTarjetasRojasEquipo2++;
              document.getElementById("contadorEquipo2Rojas").innerHTML = contadorTarjetasRojasEquipo2;
            }
          }
        }
      }

    //  SE EVALUA QUE SE DEBE MOSTRAR LA ALERTA DE CONFIRMACION DE LA TARJETA ROJA
    } else if (tarjetaSeleccionada == 2) {
      const {value: confirmacionRoja}= await Swal.fire({
        // title:
        text: "Esta segur@ de sumar la tarjeta roja a la jugadora (1) del equipo "+equipo,
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
      if (confirmacionRoja){
        if (equipo==1){
          if (contadorTarjetasRojasEquipo1==0){
            contadorTarjetasRojasEquipo1++;
            document.getElementById("contadorEquipo1Rojas").innerHTML = contadorTarjetasRojasEquipo1;
          }
        }else if (equipo==2){
          if (contadorTarjetasRojasEquipo2==0){
            contadorTarjetasRojasEquipo2++;
            document.getElementById("contadorEquipo2Rojas").innerHTML = contadorTarjetasRojasEquipo2;
          }
        }
      }
    } 
    
    //  SE RESTABLECEN LOS VALORES DE TODAS LAS VARIABLES 
    //  AL QUE DEBEN TENER POR DEFECTO AL PRINCIPIO DE LA FUNCION
    tarjetaSeleccionada=0;
    equipo=0;
    tarjetaSeleccionadaEquipo1 = "0";
    tarjetaSeleccionadaEquipo2 = "0";
    tarjetaSeleccionada=0;
  }

  //  DESPUES DE SELECCIONAR UNA TARJETA SE POSICIONA EL SELECT A LA PRIMERA OPTION
  document.getElementById("tarjetaSeleccionadaEquipo1").value = 0;
  document.getElementById("tarjetaSeleccionadaEquipo2").value = 0;
}
