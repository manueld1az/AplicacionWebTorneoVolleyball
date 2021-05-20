<?php

if (isset($_POST['enviarPuntos'])) {

    include "../../conexion/conexionServer.php";

    $puntosEquipo1 = $_POST["puntosEquipo1"];
    $puntosEquipo2 = $_POST["puntosEquipo2"];
    $codigoEncuentro = $_POST['codigoEncuentro'];
    $codigoSet = $_POST['codigoSet'];
    $codigoEquipo1 = $_POST["codigoEquipo1"];
    $codigoEquipo2 = $_POST["codigoEquipo2"];

    //  SE GUARDAN LOS PUNTOS EN LA TABLA ZET
    $sql = "UPDATE zet
            SET Ptos_Equipo1 = $puntosEquipo1
            WHERE Cod_Encuentro = $codigoEncuentro
            AND Cod_Set = $codigoSet";
    $actualizar = mysqli_query($conexion, $sql);
    $sql = "UPDATE zet
            SET Ptos_Equipo2 = $puntosEquipo2
            WHERE Cod_Encuentro = $codigoEncuentro
            AND Cod_Set = $codigoSet";
    $actualizar = mysqli_query($conexion, $sql);

    //  SE ACTUALIZAN LOS PUNTOS EN LA TABLA ENCUENTRO SUMANDO LOS PUNTOS DE CADA EQUIPO EN LOS SETS JUGADOS
    if ($codigoSet == 1){
        //  SE SUMAN LOS PUNTOS INICIALES DEL PRIMER SET
        $sql = "UPDATE encuentro
                SET Ptos_Equipo1 = $puntosEquipo1
                WHERE Cod_Encuentro = $codigoEncuentro";
        $actualizar = mysqli_query($conexion, $sql);
        $sql = "UPDATE encuentro
                SET Ptos_Equipo2 = $puntosEquipo2
                WHERE Cod_Encuentro = $codigoEncuentro";
        $actualizar = mysqli_query($conexion, $sql);
    } else {
        // SE CONSULTAN LOS PUNTOS DEL PRIMER SET
        $sql = "SELECT Ptos_Equipo1, Ptos_Equipo2 FROM encuentro
                WHERE Cod_Encuentro = $codigoEncuentro";
        $consulta = mysqli_query($conexion, $sql);
        $mostrar = mysqli_fetch_assoc($consulta);

        //  CON LOS PUNTOS OBTENIDOS DE LA CONSULTA SE LE SUMAN LOS DEL NUEVO SET QUE PODRIA SER EL 2 O EL 3
        $puntosEquipo1 += $mostrar['Ptos_Equipo1'];
        $puntosEquipo2 += $mostrar['Ptos_Equipo2'];

        //  SE INGRESAN LOS NUEVOS PUNTOS
        $sql = "UPDATE encuentro
                SET Ptos_Equipo1 = $puntosEquipo1
                WHERE Cod_Encuentro = $codigoEncuentro";
        $actualizar = mysqli_query($conexion, $sql);
        $sql = "UPDATE encuentro
                SET Ptos_Equipo2 = $puntosEquipo2
                WHERE Cod_Encuentro = $codigoEncuentro";
        $actualizar = mysqli_query($conexion, $sql);
    }

    //  SE GUARDAN LOS PUNTOS DEL ENCUENTRO AL FINALIZAR EL MISMO A LA TABLA EQUIPOS
    if ($codigoSet == 3){
        //  SE INGRESAN LOS NUEVOS PUNTOS DE CADA EQUIPO
        $sql = "UPDATE equipos
                SET Ptos_Equipo = $puntosEquipo1
                WHERE Cod_Equipo = $codigoEquipo1";
        $actualizar = mysqli_query($conexion, $sql);
        $sql = "UPDATE equipos
                SET Ptos_Equipo = $puntosEquipo2
                WHERE Cod_Equipo = $codigoEquipo2";
        $actualizar = mysqli_query($conexion, $sql);
    }

    //  SE CREA UN NUEVO ZET Y SE INSERTA EN LA BD
    if ($codigoSet < 3){
    $sql = "INSERT INTO zet (NumeroRegistro, Cod_Set, Cod_Encuentro)
            VALUES ( $numeroRegistro + 1, $codigoSet + 1, $codigoEncuentro )";
    $insertar = mysqli_query($conexion,$sql);
    }

}
