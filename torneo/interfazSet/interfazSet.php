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
    <title>Contador Puntos</title>
    <link rel="stylesheet" href="set.css" />
</head>

<body>
    <!--  SE CONSULTA LA INFORMACION ESCENCIAL PARA LA REALIZACION DEL SET  -->
    <?php
        //  SE ENCARGA DE VALIDAR SI EL JUEGO YA TERMINO
        $ganador = false;
        include "../../conexion/conexionServer.php";
        $codigoEncuentro = $_GET["Cod_Encuentro"];
        $sql = "SELECT Nombre_Equipo, Cod_Equipo FROM equipos WHERE Cod_Equipo = (  SELECT Cod_Equipo1
                                                                                    FROM encuentro
                                                                                    WHERE Cod_Encuentro = $codigoEncuentro )";
        $consulta = mysqli_query($conexion, $sql);
        $mostrar = mysqli_fetch_assoc($consulta);
        $nombreEquipo1 = $mostrar["Nombre_Equipo"];
        $codigoEquipo1 = $mostrar["Cod_Equipo"];

        $sql = "SELECT Nombre_Equipo, Cod_Equipo FROM equipos WHERE Cod_Equipo = (  SELECT Cod_Equipo2
                                                                                    FROM encuentro
                                                                                    WHERE Cod_Encuentro = $codigoEncuentro )";
        $consulta = mysqli_query($conexion, $sql);
        $mostrar = mysqli_fetch_assoc($consulta);
        $nombreEquipo2 = $mostrar["Nombre_Equipo"];
        $codigoEquipo2 = $mostrar["Cod_Equipo"];

        //  SE CONSULTA SI YA EXISTE UN SET ANTERIOR EN ESTE ENCUENTRO Y SI NO ES ASI SE CREAN
        $sql = "SELECT MAX(Cod_Set) AS mayorCodigoSet,
        MAX(NumeroRegistro) AS mayorNumeroRegistro FROM zet
        WHERE Cod_Encuentro = $codigoEncuentro";
        $consulta = mysqli_query($conexion, $sql);
        $mostrar = mysqli_fetch_assoc($consulta);
        $codigoSet = $mostrar['mayorCodigoSet'];
        $numeroRegistro = $mostrar['mayorNumeroRegistro'];
        //  SE SUMA 1 PARA AUMENTAR CADA VEZ QUE INICIA UN NUEVO SET
        $numeroRegistro++;
        if ($numeroRegistro == 1) {
            //  SE CONSULTA EL ULTIMO NUMEROREGISTRO DE LA TABLA POR QUE SE CONSULTO ANTERIORMENTE SOLO EL NUMERO REGISTRO
            //  POR ENCUENTRO Y PARA EL PRIMER REGISTRO DEL ENCUENTRO SE NECESITA EL ULTIMO REGISTRO DEL ENCUENTRO ANTERIOR
            $sql = "SELECT MAX(NumeroRegistro) AS mayorNumeroRegistro FROM zet ";
            $consulta = mysqli_query($conexion, $sql);
            $mostrar = mysqli_fetch_assoc($consulta);
            $numeroRegistro += $mostrar['mayorNumeroRegistro'];
        }
        $codigoSet++;
        //  SE EVALUA SI EL ENCUENTRO YA CUMPLIO LOS 3 SETS Y YA TERMINO

    ?>
    <header class="container">
        <div class="row">
            <div class="col-auto">
                <a href="encuentrosDiarios.php">
                    <h1><i class="fas fa-arrow-alt-circle-left"></i></h1>
                </a>
            </div>
            <div class="col-auto me-auto">
                <a href="../../index.html">
                    <h1><i class="fas fa-volleyball-ball"></i> SGTV</h1>
                </a>
            </div>
            <!--    FORMULARIO PARA ENVIAR LOS PUNTOS Y AMONESTACIONES A LA BASE DE DATOS   -->
            <div class="col-auto">
                <form action="recibirSet.php" method="POST">
                    <input type="hidden" name="codigoEncuentro"
                        value="<?php echo $codigoEncuentro; ?>">
                    <input type="hidden" name="codigoEquipo1"
                        value="<?php echo $codigoEquipo1; ?>">
                    <input type="hidden" name="codigoEquipo2"
                        value="<?php echo $codigoEquipo2; ?>">
                    <input type="hidden" name="puntosEquipo1" id="puntosEquipo1" value="0">
                    <input type="hidden" name="puntosEquipo2" id="puntosEquipo2" value="0">
                    <button class="btn button" name="guardarPuntos" id="guardarPuntos" type="submit">
                        <b>Guardar</b>
                    </button>
            </div>
        </div>
    </header>
    <!-- TITULOS DE TABS -->
    <ul class="nav justify-content-center" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link btn button BN1" id="puntos-tab" data-toggle="tab" href="#contenidoPuntos" role="tab"
                aria-controls="contenidoPuntos" aria-selected="true">Puntos</a>
        </li>
        <li class="nav-item">
            <!--   SE RELLENAN LOS CONTADORES DE TARJETAS CON EL ARRAY DEL LOCAL STORAGE AL CAMBIAR DE PAGINA -->
            <a class="nav-link btn button " id="tarjetas-tab" data-toggle="tab" href="#contenidoTarjetas" role="tab"
                aria-controls="contenidoTarjetas" aria-selected="false"
                onclick="rellenarContadoresTarjetas()">Tarjetas</a>
        </li>
    </ul>
    <!-- CONTENIDO DE LAS TABS -->
    <main class="tab-content container" id="myTabContent">

        <!-- SECCION DE PUNTOS -->
        <section class="tab-pane fade show active" id="contenidoPuntos" role="tabpanel" aria-labelledby="puntos-tab">
            <center>
                <img src="../../img/mallaVolleyball.svg" alt="icono malla voleibol" width="130px" />
                <h2>Puntos Set
                    <?php
                    if ($codigoSet <= 3) {
                        // SE IMPRIME EL SET ACTUAL
                        echo $codigoSet; ?>
                </h2>
            </center>
            <br />
            <div class="row">
                <section class="col-xs-12 col-sm-6">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td class="columnaCabecera">
                                    <b>
                                        <center id="nombreEquipo1"><?php echo $nombreEquipo1; ?>
                                        </center>
                                    </b>
                                </td>
                                <td>
                                    <b>
                                        <center>Contador</center>
                                    </b>
                                </td>
                            </tr>
                        </thead>
                        <?php
                            $sql = "SELECT Id_Jugadora, Nombre FROM jugadoras WHERE Cod_equipo = (  SELECT Cod_Equipo1
                                                                                                    FROM encuentro
                                                                                                    WHERE Cod_Encuentro = $codigoEncuentro )";
                        $consulta = mysqli_query($conexion, $sql);
                        while ($mostrar = mysqli_fetch_assoc($consulta)) {
                            $jugadorasEquipo1[] = $mostrar['Id_Jugadora']; ?>
                        <tbody>
                            <tr>
                                <td>
                                    <center><?php echo $mostrar['Nombre'] ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <div class="btn contadores"
                                            onclick="deductClicks('<?php echo $mostrar['Id_Jugadora']; ?>', '<?php echo $ganador; ?>')">
                                            <i class="fas fa-minus"></i>
                                        </div>
                                        <text
                                            id="<?php echo $mostrar['Id_Jugadora'] ?>"
                                            class="contador">0</text>
                                        <div class="btn contadores"
                                            onclick="countingClicks('<?php echo $mostrar['Id_Jugadora']; ?>', '<?php echo $ganador; ?>')">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                        } ?>
                        <script>
                            var idJugadorasEquipo1 =
                                '<?php echo json_encode($jugadorasEquipo1); ?>';
                        </script>
                    </table>
                </section>
                <section class="col-xs-12 col-sm-6">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td class="columnaCabecera">
                                    <center>
                                        <b id="nombreEquipo2"><?php echo $nombreEquipo2; ?>
                                        </b>
                                    </center>
                                </td>
                                <td>
                                    <b>
                                        <center>Contador</center>
                                    </b>
                                </td>
                            </tr>
                        </thead>
                        <?php
                        $sql = "SELECT Id_Jugadora, Nombre FROM jugadoras WHERE Cod_equipo = (  SELECT Cod_Equipo2
                                                                                FROM encuentro
                                                                                WHERE Cod_Encuentro = $codigoEncuentro )";
                        $consulta = mysqli_query($conexion, $sql);
                        while ($mostrar = mysqli_fetch_assoc($consulta)) {
                            $jugadorasEquipo2[] = $mostrar['Id_Jugadora']; ?>
                        <tbody>
                            <tr>
                                <td>
                                    <center><?php echo $mostrar['Nombre'] ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <div class="btn contadores"
                                            onclick="deductClicksb('<?php echo $mostrar['Id_Jugadora']; ?>', '<?php echo $ganador; ?>')">
                                            <i class="fas fa-minus"></i>
                                        </div>
                                        <text
                                            id="<?php echo $mostrar['Id_Jugadora'] ?>"
                                            class="contador">0</text>
                                        <div class="btn contadores"
                                            onclick="countingClicksb('<?php echo $mostrar['Id_Jugadora']; ?>', '<?php echo $ganador; ?>')">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                        } ?>
                        <script>
                            var idJugadorasEquipo2 =
                                '<?php echo json_encode($jugadorasEquipo2); ?>';
                        </script>
                    </table>
                </section>
            </div>
            <!--  SE ENCAPSULAN LOS PUNTOS DE CADA JUGADORA EN UN ARRAY POR EQUIPO Y SE ENVIA A PHP  -->
            <?php
                        //  INPUTS PARA ENVIAR LOS PUNTOS POR CADA JUGADORA
                        //  1 - SE CONSULTA LA CANTIDAD DE JUGADORAS DEL EQUIPO 1
                        $sql = "SELECT COUNT(Id_Jugadora) AS cantidadJugadorasEquipo1 FROM jugadoras WHERE (Cod_equipo = $codigoEquipo1)";
                        $consulta = mysqli_query($conexion, $sql);
                        $mostrar = mysqli_fetch_assoc($consulta);
                        $cantidadJugadorasEquipo1 = $mostrar['cantidadJugadorasEquipo1']; ?>
            <input type="hidden" name="cantidadJugadorasEquipo1" id="cantidadJugadorasEquipo1"
                value="<?php echo $cantidadJugadorasEquipo1; ?>">
            <?php
                        for ($i = 0; $i < $cantidadJugadorasEquipo1; $i++) {
                            ?>
            <input type="hidden" name="puntosJugadorasEquipo1[]"
                id="puntosJugadorasEquipo1[<?php echo $jugadorasEquipo1[$i]; ?>]"
                value="">
            <?php
                        }
                        //  2 - SE CONSULTA LA CANTIDAD DE JUGADORAS DEL EQUIPO 2
                        $sql = "SELECT COUNT(Id_Jugadora) AS cantidadJugadorasEquipo2 FROM jugadoras WHERE (Cod_equipo = $codigoEquipo2)";
                        $consulta = mysqli_query($conexion, $sql);
                        $mostrar = mysqli_fetch_assoc($consulta);
                        $cantidadJugadorasEquipo2 = $mostrar['cantidadJugadorasEquipo2']; ?>
            <input type="hidden" name="cantidadJugadorasEquipo2" id="cantidadJugadorasEquipo2"
                value="<?php echo $cantidadJugadorasEquipo2; ?>">
            <?php
                        for ($i = 0; $i < $cantidadJugadorasEquipo2; $i++) {
                            ?>
            <input type="hidden" name="puntosJugadorasEquipo2[]"
                id="puntosJugadorasEquipo2[<?php echo $jugadorasEquipo2[$i]; ?>]"
                value="">
            <?php
                        } ?>
            <input type="hidden" name="numeroRegistro"
                value="<?php echo $numeroRegistro; ?>">
            <input type="hidden" name="codigoSet" id="codigoSet"
                value="<?php echo $codigoSet; ?>">
            <!--  SE MUESTRA LA ADVERTENCIA SI EL CODIGO DEL SET ES MAYOR A 3  -->
            <?php
                    } else {
                        ?>
            <center>
                <h3><b>Este encuentro ya ha sido disputado los resultados podra
                        encontrarlos en la seccion de resultados</b></h3>
                <p>
                    presione la flecha que esta en la parte superior izquierda para
                    escoger un encuentro distinto
                </p>
            </center>
            <?php
                    }
        ?>
        </section>

        <!-- SECCION DE TARJETAS -->
        <section class="tab-pane fade" id="contenidoTarjetas" role="tabpanel" aria-labelledby="tarjetas-tab">
            <center>
                <img src="../../img/cards.svg" alt="icono tarjetas voleibol" width="130px" />
                <h2>Amonestaciones
                    <?php
                    if ($codigoSet <= 3) {
                        ?>
                </h2>
            </center>
            <br />
            <div class="row">
                <section class="col-xs-12 col-sm-6">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="columnaCabecera">
                                    <b>
                                        <center id="nombreEquipo1"><?php echo $nombreEquipo1; ?>
                                        </center>
                                    </b>
                                </th>
                                <th>
                                    <b>
                                        <center>Contador</center>
                                    </b>
                                </th>
                            </tr>
                        </thead>
                        <?php
                        $i = 0;
                        $sql = "SELECT Id_Jugadora, Nombre FROM jugadoras WHERE Cod_equipo = (  SELECT Cod_Equipo1
                                                                                                FROM encuentro
                                                                                                WHERE Cod_Encuentro = $codigoEncuentro )";
                        $consulta = mysqli_query($conexion, $sql);
                        while ($mostrar = mysqli_fetch_assoc($consulta)) {
                            $idJugadora = $mostrar['Id_Jugadora'];
                            $idJugadorasEquipo1[] = $idJugadora; ?>
                        <tbody>
                            <tr>
                                <td><?php echo $mostrar['Nombre'] ?>
                                </td>
                                <td>
                                    <center>
                                        <select
                                            id="tarjetaSeleccionadaEquipo1<?php echo $idJugadorasEquipo1[$i]; ?>"
                                            onchange="alertaConfirmarTarjeta('<?php echo $mostrar['Nombre']; ?>', '<?php echo $idJugadora; ?>', '<?php echo $i; ?>')">
                                            <option value="0">Seleccione...</option>
                                            <option value="1">Tarjeta Amarilla</option>
                                            <option value="2">Tarjeta Roja</option>
                                        </select>
                                        <div id="yellowCard"></div>
                                        <text
                                            id="amarillasEquipo1<?php echo $idJugadora; ?>"
                                            class="contador">0</text>
                                        <div id="redCard"></div>
                                        <text
                                            id="rojasEquipo1<?php echo $idJugadora; ?>"
                                            class="contador">0</text>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                            $i++;
                        } ?>
                        <script>
                            //  OBTENER EN JAVASCRIPT PERO LA VARIABLE O ARRAY RECEPTOR DEBE TENER
                            //  UN NOMBRE DIFERENTE A EL REMITENTE
                            var idsJugadorasEquipo1 =
                                '<?php echo json_encode($idJugadorasEquipo1); ?>';
                        </script>
                    </table>
                </section>
                <section class="col-xs-12 col-sm-6">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="columnaCabecera">
                                    <b>
                                        <center id="nombreEquipo2"><?php echo $nombreEquipo2; ?>
                                        </center>
                                    </b>
                                </th>
                                <th>
                                    <b>
                                        <center>Contador</center>
                                    </b>
                                </th>
                            </tr>
                        </thead>
                        <?php
                        $i = 0;
                        $sql = "SELECT Id_Jugadora, Nombre FROM jugadoras WHERE Cod_equipo = (  SELECT Cod_Equipo2
                                                                                                FROM encuentro
                                                                                                WHERE Cod_Encuentro = $codigoEncuentro )";
                        $consulta = mysqli_query($conexion, $sql);
                        while ($mostrar = mysqli_fetch_assoc($consulta)) {
                            $idJugadora = $mostrar['Id_Jugadora'];
                            $idJugadorasEquipo2[] = $idJugadora; ?>
                        <tbody>
                            <tr>
                                <td><?php echo $mostrar['Nombre']; ?>
                                </td>
                                <td>
                                    <center>
                                        <select
                                            id="tarjetaSeleccionadaEquipo2<?php echo $idJugadorasEquipo2[$i]; ?>"
                                            onchange="alertaConfirmarTarjeta('<?php echo $mostrar['Nombre']; ?>', '<?php echo $idJugadora; ?>', '<?php echo $i; ?>')">
                                            <option value="0">Seleccione...</option>
                                            <option value="1">Tarjeta Amarilla</option>
                                            <option value="2">Tarjeta Roja</option>
                                        </select>
                                        <div id="yellowCard"></div>
                                        <text
                                            id="amarillasEquipo2<?php echo $idJugadora; ?>"
                                            class="contador">0</text>
                                        <div id="redCard"></div>
                                        <text
                                            id="rojasEquipo2<?php echo $idJugadora; ?>"
                                            class="contador">0</text>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                            $i++;
                        } ?>
                        <script>
                            //  OBTENER EN JAVASCRIPT PERO LA VARIABLE O ARRAY RECEPTOR DEBE TENER
                            //  UN NOMBRE DIFERENTE A EL REMITENTE
                            var idsJugadorasEquipo2 =
                                '<?php echo json_encode($idJugadorasEquipo2); ?>';
                        </script>
                    </table>
                </section>
            </div>
            <!-- SE ENVIAN LOS IDS DE LAS JUGADORAS PARA ENLAZAR LOS CONTADORES A CADA UNA DE ELLAS EN EL BACKEND -->
            <?php
                        for ($i = 0; $i < $cantidadJugadorasEquipo1; $i++) {
                            ?>
            <input type="hidden" name="idJugadorasEquipo1[]"
                id="idJugadorasEquipo1[<?php echo $idJugadorasEquipo1[$i]; ?>]"
                value="">
            <?php
                        } ?>
            <?php
                        for ($i = 0; $i < $cantidadJugadorasEquipo2; $i++) {
                            ?>
            <input type="hidden" name="idJugadorasEquipo2[]"
                id="idJugadorasEquipo2[<?php echo $idJugadorasEquipo2[$i]; ?>]"
                value="">
            <?php
                        } ?>


            <!--  SE ENCAPSULAN LAS TARJETAS DE CADA JUGADORA EN UN ARRAY POR EQUIPO Y SE ENVIA Al SERVIDOR  -->
            <!--  INPUTS PARA ENVIAR LAS TARJETAS POR CADA JUGADORA -->

            <!-- TARJETAS AMARILLAS -->
            <!-- EQUIPO 1 -->
            <?php
                        for ($i = 0; $i < $cantidadJugadorasEquipo1; $i++) {
                            ?>
            <input type="hidden" name="amarillasEquipo1[]"
                id="amarillasEquipo1[<?php echo $idJugadorasEquipo1[$i]; ?>]"
                value="">
            <?php
                        } ?>
            <!-- EQUIPO 2 -->
            <?php
                        for ($i = 0; $i < $cantidadJugadorasEquipo2; $i++) {
                            ?>
            <input type="hidden" name="amarillasEquipo2[]"
                id="amarillasEquipo2[<?php echo $idJugadorasEquipo2[$i]; ?>]"
                value="">
            <?php
                        }

                        // TARJETAS ROJAS
                        // EQUIPO 1

                        for ($i = 0; $i < $cantidadJugadorasEquipo1; $i++) {
                            ?>
            <input type="hidden" name="rojasEquipo1[]"
                id="rojasEquipo1[<?php echo $idJugadorasEquipo1[$i]; ?>]"
                value="">
            <?php
                        }

                        // EQUIPO 2

                        for ($i = 0; $i < $cantidadJugadorasEquipo2; $i++) {
                            ?>
            <input type="hidden" name="rojasEquipo2[]"
                id="rojasEquipo2[<?php echo $idJugadorasEquipo2[$i]; ?>]"
                value="">
            <?php
                        } ?>
            </form>
            <!--  SE MUESTRA LA ADVERTENCIA SI EL CODIGO DEL SET ES MAYOR A 3  -->
            <?php
                    } else {
                        ?>
            <center>
                <h3><b>Este encuentro ya ha sido disputado los resultados podra
                        encontrarlos en la seccion de resultados</b></h3>
                <p>
                    presione la flecha que esta en la parte superior izquierda para
                    escoger un encuentro distinto
                </p>
            </center>
            <?php
                    }
        ?>
        </section>
    </main>



    <!--  SCRIPT PARA HACER LOS CONTEOS DE PUNTOS  -->
    <script src="puntos/contadorPuntos.js"></script>
    <!--Scripts cdn de font awesome-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"
        integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw=="
        crossorigin="anonymous"></script>
    <!-- Scripts de bootstrap-->
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
    <!--Scripts cdn de sweetAlert2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="amonestaciones/alertaPersonalizada.js"></script>

</body>

</html>