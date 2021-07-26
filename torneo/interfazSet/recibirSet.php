<?php

if (isset($_POST['guardarPuntos'])) {
    include("../../conexion/conexionServer.php");

    $puntosEquipo1 = $_POST["puntosEquipo1"];
    $puntosEquipo2 = $_POST["puntosEquipo2"];
    $codigoEncuentro = $_POST['codigoEncuentro'];
    $codigoSet = $_POST['codigoSet'];
    $codigoEquipo1 = $_POST["codigoEquipo1"];
    $codigoEquipo2 = $_POST["codigoEquipo2"];
    $numeroRegistro = $_POST["numeroRegistro"];
    $idJugadorasEquipo1 = $_POST["idJugadorasEquipo1"];
    $idJugadorasEquipo2 = $_POST["idJugadorasEquipo2"];
    $amarillasEquipo1 = $_POST["amarillasEquipo1"];
    $amarillasEquipo2 = $_POST["amarillasEquipo2"];
    $rojasEquipo1 = $_POST["rojasEquipo1"];
    $rojasEquipo2 = $_POST["rojasEquipo2"];

    //     EQUIPO 1
    for ($i=0; $i < count($idJugadorasEquipo1); $i++) {
        // SE CONSULTAN LAS TARJETAS PREVIAS DE CADA JUGADORA PARA SUMARLAS A LAS ANTERIORES
        $sql = "SELECT amarillas, rojas FROM jugadoras WHERE Id_Jugadora = $idJugadorasEquipo1[$i]";
        $consulta = mysqli_query($conexion, $sql);
        echo "<pre>";
        print_r($consulta);
        echo "</pre>";
        while ($tarjetasEquipo1 = mysqli_fetch_assoc($consulta)) {
            //      CREAR UNA POSICION EN LA MATRIZ PARA CADA JUGADORA CON SUS TARJETAS
            $tarjetasJugadora[$i];
        }

        if ($tarjetasEquipo1['amarillas'] == null) {
            $tarjetasEquipo1['amarillas'] = $amarillasEquipo1[$i];
        } else {
            $tarjetasEquipo1['amarillas']+=$amarillasEquipo1[$i];
        }
        if ($tarjetasEquipo1['rojas'] == null) {
            $tarjetasEquipo1['rojas'] = $rojasEquipo1[$i];
        } else {
            $tarjetasEquipo1['rojas']+=$rojasEquipo1[$i];
        }
        //     SE SUMAN LAS NUEVAS TARJETAS AMARILLAS AL EQUIPO 1
        $sql = "UPDATE id17287989_torneovoleibol.jugadoras SET amarillas = ".$tarjetasEquipo1['amarillas']." WHERE Id_Jugadora = $idJugadorasEquipo1[$i]";
        $actualizar = mysqli_query($conexion, $sql);

        //     SE SUMAN LAS TARJETAS ROJAS AL EQUIPO 1
        $sql = "UPDATE id17287989_torneovoleibol.jugadoras SET rojas = ".$tarjetasEquipo1['rojas']." WHERE Id_Jugadora = $idJugadorasEquipo1[$i]";
        $actualizar = mysqli_query($conexion, $sql);
    }

    //     EQUIPO 2
    for ($i=0; $i < count($idJugadorasEquipo2); $i++) {
        // SE CONSULTAN LAS TARJETAS PREVIAS DE CADA JUGADORA PARA SUMARLAS A LAS ANTERIORES
        $sql = "SELECT amarillas, rojas FROM jugadoras WHERE Id_Jugadora = $idJugadorasEquipo2[$i]";
        $consulta = mysqli_query($conexion, $sql);
        $tarjetasEquipo2 = mysqli_fetch_assoc($consulta);
        $tarjetasEquipo2['amarillas']+=$amarillasEquipo2[$i];
        $tarjetasEquipo2['rojas']+=$rojasEquipo2[$i];

        if ($tarjetasEquipo2['amarillas'] == null) {
            $tarjetasEquipo2['amarillas'] = $amarillasEquipo2[$i];
        } else {
            $tarjetasEquipo2['amarillas']+=$amarillasEquipo2[$i];
        }
        if ($tarjetasEquipo2['rojas'] == null) {
            $tarjetasEquipo2['rojas'] = $rojasEquipo2[$i];
        } else {
            $tarjetasEquipo2['rojas']+=$rojasEquipo2[$i];
        }
        //     SE SUMAN TARJETAS AMARILLAS AL EQUIPO 2
        $sql = "UPDATE id17287989_torneovoleibol.jugadoras SET amarillas = ".$tarjetasEquipo2['amarillas']." WHERE Id_Jugadora = $idJugadorasEquipo2[$i]";
        $actualizar = mysqli_query($conexion, $sql);

        //     SE SUMAN TARJETAS ROJAS AL EQUIPO 2
        $sql = "UPDATE id17287989_torneovoleibol.jugadoras SET rojas = ".$tarjetasEquipo2['rojas']." WHERE Id_Jugadora = $idJugadorasEquipo2[$i]";
        $actualizar = mysqli_query($conexion, $sql);
    }
} else {
//      SE RECIBE EL SET ACUAL Y SE CREA EL SIGUIENTE
    $sql = "    INSERT INTO zet (NumeroRegistro, Cod_Set, Cod_Encuentro)
                VALUES ( $numeroRegistro, $codigoSet, $codigoEncuentro )";
    $ingresar = mysqli_query($conexion, $sql);

    //  SE GUARDAN LOS PUNTOS EN LA TABLA ZET

    $sql = "    UPDATE id17287989_torneovoleibol.zet
                SET Ptos_Equipo1 = $puntosEquipo1
                WHERE Cod_Encuentro = $codigoEncuentro
                AND Cod_Set = $codigoSet";
    $actualizar = mysqli_query($conexion, $sql);
    $sql = "    UPDATE id17287989_torneovoleibol.zet
                SET Ptos_Equipo2 = $puntosEquipo2
                WHERE Cod_Encuentro = $codigoEncuentro
                AND Cod_Set = $codigoSet";
    $actualizar = mysqli_query($conexion, $sql);

    //  SE ACTUALIZAN LOS PUNTOS EN LA TABLA ENCUENTRO SUMANDO LOS PUNTOS DE CADA EQUIPO EN LOS SETS JUGADOS
    if ($codigoSet == 1) {
        //  SE SUMAN LOS PUNTOS INICIALES DEL PRIMER SET
        $sql = "UPDATE id17287989_torneovoleibol.encuentro
                SET Ptos_Equipo1 = $puntosEquipo1
                WHERE Cod_Encuentro = $codigoEncuentro";
        $actualizar = mysqli_query($conexion, $sql);
        $sql = "UPDATE id17287989_torneovoleibol.encuentro
                SET Ptos_Equipo2 = $puntosEquipo2
                WHERE Cod_Encuentro = $codigoEncuentro";
        $actualizar = mysqli_query($conexion, $sql);
    } else {
        // SE CONSULTAN LOS PUNTOS DEL PRIMER SET
        $sql = "SELECT Ptos_Equipo1, Ptos_Equipo2 FROM encuentro
                WHERE Cod_Encuentro = $codigoEncuentro";
        $consulta = mysqli_query($conexion, $sql);
        $mostrar = mysqli_fetch_array($consulta);
        $puntosConsultados1 = $mostrar["Ptos_Equipo1"];
        $puntosConsultados2 = $mostrar["Ptos_Equipo2"];

        //  CON LOS PUNTOS OBTENIDOS DE LA CONSULTA SE LE SUMAN LOS DEL NUEVO SET QUE PODRIA SER EL 2 O EL 3
        $puntosEquipo1 += $puntosConsultados1;
        $puntosEquipo2 += $puntosConsultados2;

        //  SE INGRESAN LOS NUEVOS PUNTOS
        $sql = "UPDATE id17287989_torneovoleibol.encuentro
                SET Ptos_Equipo1 = " . $puntosEquipo1 . "
                WHERE Cod_Encuentro = " . $codigoEncuentro;
        $actualizar = mysqli_query($conexion, $sql);
        $sql = "UPDATE id17287989_torneovoleibol.encuentro
                SET Ptos_Equipo2 = $puntosEquipo2
                WHERE Cod_Encuentro = $codigoEncuentro";
        $actualizar = mysqli_query($conexion, $sql);
    }

    //  SE GUARDAN LOS PUNTOS DEL ENCUENTRO AL FINALIZAR EL MISMO A LA TABLA EQUIPOS
    if ($codigoSet == 3) {

//      SE CONSULTAN LOS PUNTOS PREVIOS QUE HALLA SUMADO EL PRIMER EQUIPO DEL ENCUENTRO
        $sql = "SELECT Ptos_Equipo FROM equipos WHERE Cod_Equipo = $codigoEquipo1";
        $consulta = mysqli_query($conexion, $sql);
        $mostrar = mysqli_fetch_array($consulta);
        $puntosConsultados1 = $mostrar["Ptos_Equipo"];

//      SE CONSULTAN LOS PUNTOS PREVIOS QUE HALLA SUMADO EL SEGUNDO EQUIPO DEL ENCUENTRO
        $sql = "SELECT Ptos_Equipo FROM equipos WHERE Cod_Equipo = $codigoEquipo2";
        $consulta = mysqli_query($conexion, $sql);
        $mostrar = mysqli_fetch_array($consulta);
        $puntosConsultados2 = $mostrar["Ptos_Equipo"];

        //  CON LOS PUNTOS OBTENIDOS DE LA CONSULTA SE LE SUMAN LOS DEL ENCUENTRO AL TERMINAR EL MISMO
        $puntosEquipo1 += $puntosConsultados1;
        $puntosEquipo2 += $puntosConsultados2;

        //  SE INGRESAN LOS NUEVOS PUNTOS DE CADA EQUIPO
        $sql = "UPDATE id17287989_torneovoleibol.equipos
                SET Ptos_Equipo = $puntosEquipo1
                WHERE Cod_Equipo = $codigoEquipo1";
        $actualizar = mysqli_query($conexion, $sql);
        $sql = "UPDATE id17287989_torneovoleibol.equipos
                SET Ptos_Equipo = $puntosEquipo2
                WHERE Cod_Equipo = $codigoEquipo2";
        $actualizar = mysqli_query($conexion, $sql);

//      INGRESO DE PUNTOS DE CADA JUGADORA DEL ENCUENTRO A LA BASE DE DATOS POR EQUIPO


        /* !!!!!!!!!!!!!!!!!!!!!!!! ERORRRRR
        EN ESTA SECCION NO SE ESTAN ACTUALIZANDO LOS PUNTOS EN LA TABLA DE JUGADORAS */
        /*
                //      SE RECIBEN LOS ARRAYS CON LOS PUNTOS DE CADA JUGADORA EN SU EQUIPO AL FINAL DEL ENCUENTRO
                $nuevosPuntosJugadorasEquipo1 = $_POST['puntosJugadorasEquipo1'];
                $nuevosPuntosJugadorasEquipo2 = $_POST['puntosJugadorasEquipo2'];

                //SE CONSULTAN LAS JUGADORAS DE ESTOS EQUIPOS EN DISPUTA Y SUS PUNTAJES CONSEGUIDOS EN PATIDOS POSTERIORES

                //      EQUIPO 1
                $sql = "SELECT Id_Jugadora, Puntos_Anotados FROM jugadoras WHERE Cod_equipo = $codigoEquipo1";
                $consulta = mysqli_query($conexion, $sql);
                $i = 0;
                while ($mostrar = mysqli_fetch_assoc($consulta)) {
                    $idJugadorasEquipo1[] = $mostrar['Id_Jugadora'];
                    $ultimosPuntosJugadorasEquipo1[] = $mostrar['Puntos_Anotados'];

                    //      SE INGRESAN LOS PUNTOS POR CADA JUGADORA EN ORDEN
                    $puntosJugadorasEquipo1[$i] = $ultimosPuntosJugadorasEquipo1[$i] + $nuevosPuntosJugadorasEquipo1[$i];
                    $sql = "UPDATE `torneovoleibol`.`jugadoras` SET `Puntos_Anotados` = '$puntosJugadorasEquipo1[$i]'  WHERE (`Id_Jugadora` = '$idJugadorasEquipo1[$i]');";
                    $actualizar = mysqli_query($conexion, $sql);
                    $i++;
                }

                //      EQUIPO 2
                $sql = "SELECT Id_Jugadora, Puntos_Anotados FROM jugadoras WHERE Cod_equipo = $codigoEquipo2";
                $consulta = mysqli_query($conexion, $sql);
                $i = 0;
                while ($mostrar = mysqli_fetch_assoc($consulta)) {
                    $idJugadorasEquipo1[] = $mostrar['Id_Jugadora'];
                    $ultimosPuntosJugadorasEquipo2[] = $mostrar['Puntos_Anotados'];

                    //      SE INGRESAN LOS PUNTOS POR CADA JUGADORA EN ORDEN
                    $puntosJugadorasEquipo2[$i] = $ultimosPuntosJugadorasEquipo2[$i] + $nuevosPuntosJugadorasEquipo2[$i];
                    $sql = "UPDATE `torneovoleibol`.`jugadoras` SET `Puntos_Anotados` = '$puntosJugadorasEquipo2[$i]'  WHERE (`Id_Jugadora` = '$idJugadorasEquipo2[$i]');";
                    $actualizar = mysqli_query($conexion, $sql);
                    $i++;
                } */
        header("location: resultadoEncuentro.php?Cod_Encuentro=$codigoEncuentro&&codigoEquipo1=$codigoEquipo1&&codigoEquipo2=$codigoEquipo2");
    } else {
        header("location: interfazSet.php?Cod_Encuentro=$codigoEncuentro");
    }
}
