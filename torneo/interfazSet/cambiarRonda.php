<?php

/* SE RECIBE LA RONDA ACTUAL QUE TERMINO CON EL ENVIO DEL NUMERO DE LA RONDA,
ENVIADO AL FINALIZAR EL ULTIMO ENCUENTRO DE LA RONDA ACTUAL DESDE LA INTERFAZ DEL SET */
$ronda = $_GET['ronda'];
echo  $ronda;

include "../../conexion/conexionServer.php";

$sql ="UPDATE torneo SET rondaActual = $ronda + 1 WHERE idTorneo = 1193";
/* EL ID DEL TORNEO INGRESADA POR EL USUARIO AL INICIAR EL TORNEO DEBE LLEGAR
HASTA AQUI PARA PODER ACTUALIZAR EL ESTADO DEL TORNEO */
$actualizar = mysqli_query($conexion, $sql);

$conexion->close();

header("location: ../verificarEquipos.php");
