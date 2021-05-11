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
        $cantidadEncuentrosDiarios = $_POST["cantidadEncuentrosSemana"];
        //  Cambio los nimbres de las variables y les doy el mismo valor recibido del usuario
        $ultimaFechaTorneo = $fechaInicioTorneo;
        //  Esta variable se encarga de contar las filas modificadas para hacer el salto sumando un dia
        $contador = 0;

        for ($i = 1; $i <= 48; $i++) {
            if ($contador == $cantidadEncuentrosDiarios) {
                //  Si el contador se iguala a la cantidad de partidos diarios ingresados por el usuario
                //  se suma un dia a la ultima fecha y hora para hacer el salto diario.
                $ultimaFechaTorneo = date("Y-m-j", strtotime($ultimaFechaTorneo . "+ 1 days"));

                $sql = "UPDATE encuentro
                        SET Fecha = '$ultimaFechaTorneo'
                        WHERE ( Cod_Encuentro = '$i' )";
                $ingresar = mysqli_query($conexion, $sql);
                //  Se reinicia el contador para que empiece denuevo el conteo de partidos diarios.
                $contador = 1;
            } else {
                //  Se ingresa la ultima fecha y hora hasta que el contador se iguale a la
                //  cantidad de partidos diarios ingresados por el usuario
                $sql = "UPDATE encuentro
                        SET Fecha = '$ultimaFechaTorneo'
                        WHERE ( Cod_Encuentro = '$i' )";
                $ingresar = mysqli_query($conexion, $sql);

                $contador++;
            }
        }
    }

    //  Se obtiene la hora del ultimo encuentro

    $sql = "SELECT MAX(Hora) as mayorHoraEncuentro FROM encuentro";
    $consulta = mysqli_query($conexion, $sql);
    $mayorHoraEncuentro = mysqli_fetch_array($consulta);
    $ultimaHoraEncuentro = $mayorHoraEncuentro["mayorHoraEncuentro"];

    if ($ultimaHoraEncuentro == 0) {

        //  Obtengo la fecha, hora y cantidad de encuentros diarios para hacer el salto diario de fechas y hora.
        //  Estos datos son ingresados por el usuario.
        $horaInicioTorneo = $_POST['horaInicioTorneo'];
        $intervaloEntrePartidos = $_POST["mayorHoraEncuentro"];
        //  Cambio los nombres de las variables y les doy el mismo valor recibido del usuario
        $ultimaHoraTorneo = $horaInicioTorneo;
        //  Esta variable se encarga de contar las filas modificadas para hacer el salto sumando un dia
        $contador = 0;

        for ($i = 1; $i <= 48; $i++) {
            if ($contador == $intervaloEntrePartidos) {
                //  Si el contador se iguala a la cantidad de partidos diarios ingresados por el usuario
                //  se suma un dia a la ultima fecha y hora para hacer el salto diario.
                $ultimaHoraTorneo = date("H:i:s", strtotime("+ 1 hour", $ultimaHoraTorneo));

                $sql = "UPDATE encuentro
                        SET Hora = '$ultimaHoraTorneo'
                        WHERE ( Cod_Encuentro = '$i' )";
                $ingresar = mysqli_query($conexion, $sql);
                //  Se reinicia el contador para que empiece denuevo el conteo de partidos diarios.
                $contador = 1;
            } else {
                //  Se ingresa la ultima fecha y hora hasta que el contador se iguale a la
                //  cantidad de partidos diarios ingresados por el usuario
                $sql = "UPDATE encuentro
                        SET Hora = '$ultimaHoraTorneo'
                        WHERE ( Cod_Encuentro = '$i' )";
                $ingresar = mysqli_query($conexion, $sql);

                $contador++;
            }
        }
    } else {
        $ultimaHoraTorneo = 0;
        for ($i = 1; $i <= 48; $i++) {
            $sql = "UPDATE encuentro
                        SET Hora = '$ultimaHoraTorneo'
                        WHERE ( Cod_Encuentro = '$i' )";
            $ingresar = mysqli_query($conexion, $sql);
        }
    }
}
