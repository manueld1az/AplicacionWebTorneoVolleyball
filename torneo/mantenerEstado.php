<?php

    include "../conexion/conexionServer.php";

    /* SE CONSULTA LA RONDA ACTUAL PARA MANTENER EL ESTADO DE LA RONDA AL VOLVER
    DE LOS ENCUENTROS O LOS DIARIOS */
    $sql="SELECT rondaActual FROM torneovoleibol.torneo WHERE idTorneo = 1193;";    /* SE DEBE CAMBIAR EL ID DE TORNEO 1193 POR UNA VARIABLE QUE RECIBA EL ID DEL TORNEO CREADO POR EL USUARIO */
    $consulta = mysqli_query($conexion, $sql);
    $registro = mysqli_fetch_assoc($consulta);
    $rondaActual = $registro['rondaActual'];
    $conexion->close();

    header("location: ronda$rondaActual/menuRonda$rondaActual.html");
