<?php

if (isset($_POST['guardarPuntos'])) {

    /*     SE USA PARA MOSTRAR TODOS LOS DATOS DE LA PETICION
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
     */

    include "../../../conexion/conexionServer.php";

    $puntosEquipo1 = $_POST["puntosEquipo1"];
    $puntosEquipo2 = $_POST["puntosEquipo2"];
    $codigoEncuentro = $_POST['codigoEncuentro'];
    $codigoSet = $_POST['codigoSet'];
    $codigoEquipo1 = $_POST["codigoEquipo1"];
    $codigoEquipo2 = $_POST["codigoEquipo2"];
    $numeroRegistro = $_POST["numeroRegistro"];

//      SE RECIBE EL SET ACUAL Y SE CREA EL SIGUIENTE
    $sql = "    INSERT INTO zet (NumeroRegistro, Cod_Set, Cod_Encuentro)
                VALUES ( $numeroRegistro, $codigoSet, $codigoEncuentro )";
    $ingresar = mysqli_query($conexion, $sql);



//  SE GUARDAN LOS PUNTOS EN LA TABLA ZET

    $sql = "    UPDATE zet
                SET Ptos_Equipo1 = $puntosEquipo1
                WHERE Cod_Encuentro = $codigoEncuentro
                AND Cod_Set = $codigoSet";
    $actualizar = mysqli_query($conexion, $sql);
    $sql = "    UPDATE zet
                SET Ptos_Equipo2 = $puntosEquipo2
                WHERE Cod_Encuentro = $codigoEncuentro
                AND Cod_Set = $codigoSet";
    $actualizar = mysqli_query($conexion, $sql);

//  SE ACTUALIZAN LOS PUNTOS EN LA TABLA ENCUENTRO SUMANDO LOS PUNTOS DE CADA EQUIPO EN LOS SETS JUGADOS
    if ($codigoSet == 1) {
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
        $mostrar = mysqli_fetch_array($consulta);
        $puntosConsultados1 = $mostrar["Ptos_Equipo1"];
        $puntosConsultados2 = $mostrar["Ptos_Equipo2"];

//  CON LOS PUNTOS OBTENIDOS DE LA CONSULTA SE LE SUMAN LOS DEL NUEVO SET QUE PODRIA SER EL 2 O EL 3
        $puntosEquipo1 += $puntosConsultados1;
        $puntosEquipo2 += $puntosConsultados2;

//  SE INGRESAN LOS NUEVOS PUNTOS
        $sql = "UPDATE encuentro
                SET Ptos_Equipo1 = " . $puntosEquipo1 . "
                WHERE Cod_Encuentro = " . $codigoEncuentro;
        $actualizar = mysqli_query($conexion, $sql);
        $sql = "UPDATE encuentro
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
        $sql = "UPDATE equipos
                SET Ptos_Equipo = $puntosEquipo1
                WHERE Cod_Equipo = $codigoEquipo1";
        $actualizar = mysqli_query($conexion, $sql);
        $sql = "UPDATE equipos
                SET Ptos_Equipo = $puntosEquipo2
                WHERE Cod_Equipo = $codigoEquipo2";
        $actualizar = mysqli_query($conexion, $sql);

        header("location: ../encuentrosDiarios.php");
    } else {
        header("location: puntosSet.php?Cod_Encuentro=$codigoEncuentro");
    }

//      INGRESO DE PUNTOS DE CADA JUGADORA DEL ENCUENTRO A LA BASE DE DATOS POR EQUIPO

        //      SE RECIBEN LOS ARRAYS CON LOS PUNTOS DE CADA JUGADORA EN SU EQUIPO AL FINAL DEL ENCUENTRO    
        $nuevosPuntosJugadorasEquipo1 = $_POST['puntosJugadorasEquipo1'];
        $nuevosPuntosJugadorasEquipo2 = $_POST['puntosJugadorasEquipo2'];

        //      SE CONSULTAN LAS JUGADORAS DE ESTOS EQUIPOS EN DISPUTA Y SUS PUNTAJES CONSEGUIDOS EN PATIDOS POSTERIORES

        //      EQUIPO 1
        $sql = "SELECT Id_Jugadora, Puntos_Anotados FROM jugadoras WHERE Cod_equipo = $codigoEquipo1";
        $consulta = mysqli_query($conexion,$sql);
        $i=0;
        while ($mostrar=mysqli_fetch_assoc($consulta)){
                $idJugadorasEquipo1[]=$mostrar['Id_Jugadora'];
                $ultimosPuntosJugadorasEquipo1[]=$mostrar['Puntos_Anotados'];
        
                //      SE INGRESAN LOS PUNTOS POR CADA JUGADORA EN ORDEN
                $puntosJugadorasEquipo1[$i] = $ultimosPuntosJugadorasEquipo1[$i] + $nuevosPuntosJugadorasEquipo1[$i];
                $sql = "UPDATE `torneovoleibol`.`jugadoras` SET `Puntos_Anotados` = '$puntosJugadorasEquipo1[$i]'  WHERE (`Id_Jugadora` = '$idJugadorasEquipo1[$i]');";
                $actualizar = mysqli_query($conexion,$sql);
                $i++;
        }

        //      EQUIPO 2
        $sql = "SELECT Id_Jugadora, Puntos_Anotados FROM jugadoras WHERE Cod_equipo = $codigoEquipo2";
        $consulta = mysqli_query($conexion,$sql);
        $i=0;
        while ($mostrar=mysqli_fetch_assoc($consulta)){
                $idJugadorasEquipo1[]=$mostrar['Id_Jugadora'];
                $ultimosPuntosJugadorasEquipo2[]=$mostrar['Puntos_Anotados'];

                //      SE INGRESAN LOS PUNTOS POR CADA JUGADORA EN ORDEN
                $puntosJugadorasEquipo2[$i] = $ultimosPuntosJugadorasEquipo2[$i] + $nuevosPuntosJugadorasEquipo2[$i];
                $sql = "UPDATE `torneovoleibol`.`jugadoras` SET `Puntos_Anotados` = '$puntosJugadorasEquipo2[$i]'  WHERE (`Id_Jugadora` = '$idJugadorasEquipo2[$i]');";
                $actualizar = mysqli_query($conexion,$sql);
                $i++;
        }


/*
    echo "<pre>";
    print_r($puntosJugadorasEquipo1);
    echo "</pre>";
    echo "<pre>";
    print_r($puntosJugadorasEquipo2);
*/
}
