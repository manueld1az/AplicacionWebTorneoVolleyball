<?php

if (isset($_POST["botonGuardarDatosAlerta"])) {

    include "../conexion/conexionServer.php";

    //  Se obtiene la fecha del ultimo encuentro

    $sql = "SELECT MAX(Fecha) as mayorFechaEncuentro FROM encuentro";
    $consulta = mysqli_query($conexion, $sql);
    $mayorFechaEncuentro = mysqli_fetch_array($consulta);
    $ultimaFechaEncuentro = $mayorFechaEncuentro["mayorFechaEncuentro"];

    if ($ultimaFechaEncuentro == 0) {

        //  Obtengo la fecha, hora y cantidad de encuentros diarios para hacer el salto diario de fechas y hora.
        //  Estos datos son ingresados por el usuario.
        $fechaInicioTorneo = $_POST['fechaInicioTorneo'];
        $cantidadEncuentrosDiarios = $_POST["cantidadEncuentrosDiarios"];
        //  Cambio los nimbres de las variables y les doy el mismo valor recibido del usuario
        $ultimaFechaTorneo = $fechaInicioTorneo;
        //  Esta variable se encarga de contar las filas modificadas para hacer el salto sumando un dia
        $contador = 0;
        $fechasIngresadas = 0;
        $iteradorPosicion = 1;

        //      Ingresos de las dos primeras fechas en los grupos
        for ($a = 1; $a <= 16; $a++) {

            if ($contador < 2) {

                //  Se ingresa la ultima fecha y hora hasta que el contador se iguale a la
                //  cantidad de partidos diarios ingresados por el usuario
                $sql = "UPDATE encuentro
                        SET Fecha = '$ultimaFechaTorneo'
                        WHERE ( Cod_Encuentro = $contador+$iteradorPosicion )";
                $ingresar = mysqli_query($conexion, $sql);
                $contador++;
                $fechasIngresadas++;

            } else {

                if ($fechasIngresadas == $cantidadEncuentrosDiarios) {
                    $ultimaFechaTorneo = date("Y-m-j", strtotime($ultimaFechaTorneo . "+ 1 days"));
                    $fechasIngresadas = 0;
                }
                $contador = 0;
                $iteradorPosicion += 6;
                for ($b = 1; $b <= 2; $b++) {
                    //  Se ingresa la ultima fecha y hora hasta que el contador se iguale a la
                    //  cantidad de partidos diarios ingresados por el usuario
                    $sql = "UPDATE encuentro
                        SET Fecha = '$ultimaFechaTorneo'
                        WHERE ( Cod_Encuentro = $contador+$iteradorPosicion )";
                    $ingresar = mysqli_query($conexion, $sql);
                    $contador++;
                    $fechasIngresadas++;
                }

            }
        }

        //  Esta variable se encarga de contar las filas modificadas para hacer el salto sumando un dia
        $contador = 0;
        $fechasIngresadas = 0;
        $iteradorPosicion = 3;

        //      Ingresos de las dos segundas fechas en los grupos
        for ($c = 1; $c <= 16; $c++) {

            if ($contador < 2) {

                //  Se ingresa la ultima fecha y hora hasta que el contador se iguale a la
                //  cantidad de partidos diarios ingresados por el usuario
                $sql = "UPDATE encuentro
                        SET Fecha = '$ultimaFechaTorneo'
                        WHERE ( Cod_Encuentro = $contador+$iteradorPosicion )";
                $ingresar = mysqli_query($conexion, $sql);
                $contador++;
                $fechasIngresadas++;

            } else {

                if ($fechasIngresadas == $cantidadEncuentrosDiarios) {
                    $ultimaFechaTorneo = date("Y-m-j", strtotime($ultimaFechaTorneo . "+ 1 days"));
                    $fechasIngresadas = 0;
                }
                $contador = 0;
                $iteradorPosicion += 6;
                for ($d = 1; $d <= 2; $d++) {
                    //  Se ingresa la ultima fecha y hora hasta que el contador se iguale a la
                    //  cantidad de partidos diarios ingresados por el usuario
                    $sql = "UPDATE encuentro
                        SET Fecha = '$ultimaFechaTorneo'
                        WHERE ( Cod_Encuentro = $contador+$iteradorPosicion )";
                    $ingresar = mysqli_query($conexion, $sql);
                    $contador++;
                    $fechasIngresadas++;
                }

            }
        }

        //  Esta variable se encarga de contar las filas modificadas para hacer el salto sumando un dia
        $contador = 0;
        $fechasIngresadas = 0;
        $iteradorPosicion = 5;

        //      Ingresos de las dos segundas fechas en los grupos
        for ($e = 1; $e <= 16; $e++) {

            if ($contador < 2) {

                //  Se ingresa la ultima fecha y hora hasta que el contador se iguale a la
                //  cantidad de partidos diarios ingresados por el usuario
                $sql = "UPDATE encuentro
                        SET Fecha = '$ultimaFechaTorneo'
                        WHERE ( Cod_Encuentro = $contador+$iteradorPosicion )";
                $ingresar = mysqli_query($conexion, $sql);
                $contador++;
                $fechasIngresadas++;

            } else {

                if ($fechasIngresadas == $cantidadEncuentrosDiarios) {
                    $ultimaFechaTorneo = date("Y-m-j", strtotime($ultimaFechaTorneo . "+ 1 days"));
                    $fechasIngresadas = 0;
                }
                $contador = 0;
                $iteradorPosicion += 6;
                for ($f = 1; $f <= 2; $f++) {
                    //  Se ingresa la ultima fecha y hora hasta que el contador se iguale a la
                    //  cantidad de partidos diarios ingresados por el usuario
                    $sql = "UPDATE encuentro
                        SET Fecha = '$ultimaFechaTorneo'
                        WHERE ( Cod_Encuentro = $contador+$iteradorPosicion )";
                    $ingresar = mysqli_query($conexion, $sql);
                    $contador++;
                    $fechasIngresadas++;
                }

            }
        }

    } /*     SE USA PARA REINICIAR LAS FECHAS EN LA BASE DE DATOS ENVIANDO EL VALOR DE 0
    else {
    for ($i = 1; $i <= 48; $i++) {
    $sql = "UPDATE encuentro
    SET Fecha = 0
    WHERE ( Cod_Encuentro = '$i' )";
    $ingresar = mysqli_query($conexion, $sql);
    }
    }*/

    //  Se obtiene la hora del ultimo encuentro

    $sql = "SELECT MAX(Hora) as mayorHoraEncuentro FROM encuentro";
    $consulta = mysqli_query($conexion, $sql);
    $mayorHoraEncuentro = mysqli_fetch_array($consulta);
    $ultimaHoraEncuentro = $mayorHoraEncuentro["mayorHoraEncuentro"];

    if ($ultimaHoraEncuentro == 0) {

        //  Obtengo la fecha, hora y cantidad de encuentros diarios para hacer el salto diario de fechas y hora.
        //  Estos datos son ingresados por el usuario.
        $horaInicioTorneo = $_POST["horaInicioTorneo"];
        $intervaloEntrePartidos = $_POST["intervaloEntrePartidos"];
        //  Cambio los nombres de las variables y les doy el mismo valor recibido del usuario
        $ultimaHoraTorneo = $horaInicioTorneo;
        //  Esta variable se encarga de contar las filas modificadas para hacer el salto sumando un dia
        $contador = 0;

        for ($i = 1; $i <= 48; $i++) {
            if ($contador != $cantidadEncuentrosDiarios) {
                if ($contador == 0) {
                    //  Se ingresa la ultima fecha y hora hasta que el contador se iguale a la
                    //  cantidad de partidos diarios ingresados por el usuario
                    $sql = "UPDATE encuentro
                            SET Hora = '$horaInicioTorneo'
                            WHERE ( Cod_Encuentro = '$i' )";
                    $ingresar = mysqli_query($conexion, $sql);
                    //  Se reinicia el contador para que empiece denuevo el conteo de partidos diarios.
                    $contador++;
                } else {
                    //  Si el contador se iguala a la cantidad de partidos diarios ingresados por el usuario
                    //  se suma un dia a la ultima fecha y hora para hacer el salto diario.
                    $ultimaHoraTorneo = date("H:i:s", strtotime("+ $intervaloEntrePartidos hour", strtotime($ultimaHoraTorneo)));
                    $sql = "UPDATE encuentro
                            SET Hora = '$ultimaHoraTorneo'
                            WHERE ( Cod_Encuentro = '$i' )";
                    $ingresar = mysqli_query($conexion, $sql);
                    $contador++;
                }

            } else {
                //  Se ingresa la ultima fecha y hora hasta que el contador se iguale a la
                //  cantidad de partidos diarios ingresados por el usuario
                $sql = "UPDATE encuentro
                            SET Hora = '$horaInicioTorneo'
                            WHERE ( Cod_Encuentro = '$i' )";
                $ingresar = mysqli_query($conexion, $sql);
                //  Se reinicia el contador para que empiece denuevo el conteo de partidos diarios.
                $contador = 1;
                $ultimaHoraTorneo = $horaInicioTorneo;
            }
        }
    } /*    SE USA PARA REINICIAR LAS HORAS EN LA BASE DE DATOS ENVIANDO EL VALOR DE 0
    else {
    $ultimaHoraTorneo = 0;
    for ($i = 1; $i <= 48; $i++) {
    $sql = "UPDATE encuentro
    SET Hora = '$ultimaHoraTorneo'
    WHERE ( Cod_Encuentro = '$i' )";
    $ingresar = mysqli_query($conexion, $sql);
    }
    }*/
    include "../conexion/cerrarConexion.php";
    header("location: ../torneo/ronda1/encuentrosRonda1.php");
}
