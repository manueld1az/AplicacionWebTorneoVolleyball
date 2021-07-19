<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Link de boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <!-- Link de font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <title>Finales</title>
    <link rel="stylesheet" href="../../nuevoTorneo/listados/listas.css" />
</head>

<body>

    <header class="container">
        <div class="row">
            <div class="col-auto">
                <a href="menuRonda5.html">
                    <h1><i class="fas fa-arrow-alt-circle-left"></i></h1>
                </a>
            </div>
            <div class="col-auto me-auto">
                <a href="../../index.html">
                    <h1><i class="fas fa-volleyball-ball"></i> SGTV</h1>
                </a>
            </div>
        </div>
    </header>

    <main class="container main">

        <div class="container">
            <h3 class="tittleMain">Encuentros Finales</h3>
        </div>
        <input type="button" name="imprimir" value="Imprimir" onclick="window.print();">
        <!-- SE ORGANIZAN LOS ENCUENTROS DE LOS Cuartos de Final -->
        <?php
            include("../../conexion/conexionServer.php");

        // SE CONSULTAN LOS EQUIPOS CLASIFICADOS
            $sql =" SELECT Nombre_Equipo, Cod_Equipo
                    FROM torneovoleibol.equipos 
                    WHERE finales is not null ORDER BY finales;";
            $consulta = mysqli_query($conexion, $sql);
            while ($registros = mysqli_fetch_assoc($consulta)) {
                $equipos[] = $registros['Nombre_Equipo'];
                $codigosEquipos[] = $registros['Cod_Equipo'];
            }
            /* echo "EQUIPOS CLASIFICADOS";
            echo "<pre>";
            print_r($equipos);
            echo "</pre>"; */

        // SE CONSULTA EL ULTMIMO CODIGO , FECHA Y HORA DE ENCUENTRO
        // PARA ORGANIZAR LOS ENCUENTROS DE LAS SIGUIENTES RONDAS
            $sql =" SELECT  MAX(Cod_Encuentro) AS ultimoCodigo,
                            MAX(Fecha) AS ultimaFecha, 
                            MAX(Hora) AS ultimaHora
                    FROM torneovoleibol.encuentro WHERE Cod_Encuentro < 62;";
            $consulta = mysqli_query($conexion, $sql);
            $datosUltimoEncuentro = mysqli_fetch_assoc($consulta);
            /* echo "ULTIMO ENCUENTRO";
            echo "<pre>";
            print_r($datosUltimoEncuentro);
            echo "</pre>"; */

        // SE CONSULTA EL INTERVALO EN HORAS Y LA CANTIDAD DE PARTIDOS QUE SE JUEGAN DIARIAMENTE INGRESADO POR EL USUARIO AL INICIAR EL TORNEO
            $sql ="SELECT intervaloDiario, cantidadEncuentrosDiarios FROM torneovoleibol.torneo WHERE idTorneo = 1193;"; // SE DEBE CAMBIAR EL NUMERO FIJO POR UNA VARIBLE QUECONTENGA EL ID DEL TORNEO DE CADA USUARIO
            $consulta = mysqli_query($conexion, $sql);
            $registro = mysqli_fetch_assoc($consulta);
            $intervalo = $registro['intervaloDiario'];
            $cantidadEncuentrosDiarios = $registro['cantidadEncuentrosDiarios'];

            // SE CALCULA LA HORA INGRESADA POR EL USUARIO PARA LOS PRIMEROS PARTIDOS DIARIOS
            $intervaloDiario = $intervalo * ($cantidadEncuentrosDiarios - 1);
            // SE GUARDA LA HORA CALCULADA PARA EMPEZAR LOS PRIMEROS PARTIDOS DESDE ESA HORA DIARIAMENTE
            $datosUltimoEncuentro['ultimaHora'] = date(
                "H:i:s",
                strtotime(
                    "- $intervaloDiario hour",
                    strtotime($datosUltimoEncuentro['ultimaHora'])
                )
            );

        // MATRIZ QUE CONTENDRA LOS ENCUENTROS DE ESTA FASE

            /*  SE CREAN 8 ENCUENTROS CON LOS 16 EQUIPOS DE LOS OCTAVOS DE FINAL,
                SE DISPUTARAN 2 ENCUENTROS DIARIOS,
                SEPARADOS POR LAS HORAS INGRESADAS POR EL USUARIO AL INICIAR EL TORNEO */
                    $contador = 0;
                    for ($i=0; $i < 2; $i++) {
                        if ($i %2 == 0) {
                            $encuentros[$i] = [
                                "codigoEncuentro" => $datosUltimoEncuentro['ultimoCodigo'] += 1,
                                "fecha" => $datosUltimoEncuentro['ultimaFecha'] = date(
                                    "Y-m-j",
                                    strtotime($datosUltimoEncuentro['ultimaFecha'] . "+ 3 days")
                                ),
                                "hora" =>  $datosUltimoEncuentro['ultimaHora'],
                                "equipo1" => $equipos[$contador],
                                "equipo2" => $equipos[$contador + 1],
                                "codigoEquipo1" => $codigosEquipos[$contador],
                                "codigoEquipo2" => $codigosEquipos[$contador + 1], ];
                            $contador+=2;
                        } else {
                            $encuentros[$i] = [
                            "codigoEncuentro" => $datosUltimoEncuentro['ultimoCodigo'] += 1,
                            "fecha" => $datosUltimoEncuentro['ultimaFecha'],
                            "hora" => date(
                                "H:i:s",
                                strtotime(
                                    "+ 3 hour",
                                    strtotime($datosUltimoEncuentro['ultimaHora'])
                                )
                            ),
                            "equipo1" => $equipos[$contador],
                            "equipo2" => $equipos[$contador + 1],
                            "codigoEquipo1" => $codigosEquipos[$contador ],
                            "codigoEquipo2" => $codigosEquipos[$contador + 1], ];
                            $contador+=2;
                        }
                    }

        // SE MUESTRAN LOS ENCUENTROS
        for ($i = 0; $i < 2; $i++) {
            $numeroEncuentro = ["Final", "Tercer puesto"]; ?>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td class="columnaCabecera">
                                <p>
                                    <b>
                                        <center>Fecha</center>
                                    </b>
                                </p>
                            </td>
                            <td class="columnaCabecera"></td>
                            <td class="columnaCabecera">
                                <p>
                                    <b>
                                        <center><?php echo $numeroEncuentro[$i]; ?>
                                        </center>
                                    </b>
                                </p>
                            </td>
                            <td class="columnaCabecera"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <center> <?php echo $encuentros[$i]["fecha"]; ?>
                                </center>
                            </td>
                            <td>
                                <center> <?php echo $encuentros[$i]["equipo1"]; ?>
                                </center>
                            </td>
                            <td>
                                <center>VS</center>
                            </td>
                            <td>
                                <center> <?php echo $encuentros[$i]["equipo2"]; ?>
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        }
        ?>
    </main>

    <?php

        // SE VALIDA SI YA SE HAN CREADO LOS ENCUENTROS DE ESTA RONDA

            if ($encuentros[1]['codigoEncuentro'] == 63) {

                //  Se obtienen los jueces de la DB

                $sql = "SELECT idJuez FROM jueces";
                $consulta = mysqli_query($conexion, $sql);

                while ($jueces = mysqli_fetch_array($consulta)) {
                    $juez[] = $jueces["idJuez"];
                }

                $sql = "SELECT COUNT(idJuez) AS cantidadJueces FROM jueces";
                $consulta = mysqli_query($conexion, $sql);
                $jueces = mysqli_fetch_array($consulta);
                $cantidadJueces = $jueces["cantidadJueces"];

                for ($i = 0; $i < 2; $i++) {

                    // SE DEBE SORTEAR LA CANCHA Y LOS JUECES
                    //  Se crea un numero aleatorio para el sorteo que dira cuales juces estaran en cada partido

                    $numAleatorio1 = -1;
                    $numAleatorio2 = -2;
                    $numAleatorio3 = -3;
                    $numAleatorio = -4;
                    $f = 0;
                    $limite = 3;
                    do {
                        $numAleatorio = rand(0, $cantidadJueces - 1);
                        if ($f == 0 && $numAleatorio != $numAleatorio1 && $numAleatorio != $numAleatorio2 && $numAleatorio != $numAleatorio3) {
                            $numAleatorio1 = $numAleatorio;
                            $f++;
                        } elseif ($f == 1 && $numAleatorio != $numAleatorio1 && $numAleatorio != $numAleatorio2 && $numAleatorio != $numAleatorio3) {
                            $numAleatorio2 = $numAleatorio;
                            $f++;
                        } elseif ($f == 2 && $numAleatorio != $numAleatorio1 && $numAleatorio != $numAleatorio2 && $numAleatorio != $numAleatorio3) {
                            $numAleatorio3 = $numAleatorio;
                            $f++;
                        }
                    } while ($f < $limite);

                    //  Se guarda la informacion de los nuevos encuentros

                    $sql = "INSERT INTO encuentro ( Cod_Encuentro, Fecha, Hora, idCancha, Cod_Equipo1, Cod_Equipo2, Id_Juezuno, Id_Juezdos, Id_Jueztres  )
                            VALUES ('".$encuentros[$i]['codigoEncuentro']."', '".$encuentros[$i]['fecha']."', '".$encuentros[$i]['hora']."', '1', '".$encuentros[$i]['codigoEquipo1']."', 
                                    '".$encuentros[$i]['codigoEquipo2']."', ".$juez[$numAleatorio1].", ".$juez[$numAleatorio2].", ".$juez[$numAleatorio3].");";
                    $insertar = mysqli_query($conexion, $sql);
                }
            }
    ?>




























    <!-- Scripts de boostrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <!--Scripts cdn de font awesome-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"
        integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw=="
        crossorigin="anonymous"></script>
</body>

</html>