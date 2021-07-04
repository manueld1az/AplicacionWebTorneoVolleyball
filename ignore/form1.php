<section class="tab-pane fade" id="contenidoTarjetas" role="tabpanel" aria-labelledby="tarjetas-tab">
    <center>
        <img src="../../img/cards.svg" alt="icono tarjetas voleibol" width="130px" />
        <h2>Amonestaciones Set
            <?php
                    if ($codigoSet <= 3) {
                        // SE IMPRIME EL SET ACTUAL
                        echo $codigoSet; ?>
        </h2>
    </center>
    <br />
    <div class="row">
        <section class="col-xs-12 col-sm-6">
            <table class="table-hover">
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
            <table class="table-hover">
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