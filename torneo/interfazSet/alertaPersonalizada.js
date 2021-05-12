async function  alertaConfirmarTarjeta() {

  let tarjetaSeleccionada=0;
  let equipo = 0;
  
  let tarjetaSeleccionadaEquipo1 = document.getElementById("tarjetaSeleccionadaEquipo1").value;

  let tarjetaSeleccionadaEquipo2 = document.getElementById("tarjetaSeleccionadaEquipo2").value;
  
  if (tarjetaSeleccionadaEquipo1 != "0" || tarjetaSeleccionadaEquipo2 != "0") {

    if (tarjetaSeleccionadaEquipo1=="1" || tarjetaSeleccionadaEquipo1=="2"){
      equipo = 1;
    }else if (tarjetaSeleccionadaEquipo2=="1" || tarjetaSeleccionadaEquipo2=="2"){
      equipo = 2;
    }

    if (tarjetaSeleccionadaEquipo1=="1" || tarjetaSeleccionadaEquipo2=="1"){
      tarjetaSeleccionada=1;
    }else{
      tarjetaSeleccionada=2;
    }
    
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
    } 
    equipo=0;
    tarjetaSeleccionadaEquipo1 = "0";
    tarjetaSeleccionadaEquipo2 = "0";
    tarjetaSeleccionada=0;

    //  CONTADOR

    let contadorEquipo1 = 0;
    let contadorEquipo2 = 0;

    if (counter == 0 || counterb == 0){
        document.getElementById("contadorEquipo1").innerHTML = 0;
        document.getElementById("contadorEquipo2").innerHTML = 0;
    }

    if (){
    document.getElementById("contadorEquipo1").innerHTML = ++counter;
    }
  }
}
