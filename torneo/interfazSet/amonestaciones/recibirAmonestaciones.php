<?php
if (isset($_POST['guardarTarjetas'])) {
    $respuesta = $_REQUEST;
    echo "<pre>";
    print_r($respuesta);
    echo "</pre>";
    $codigoSet = $respuesta['codigoSet'];

    if ($codigoSet == 3) {

        $cantidadJugadorasEquipo1 = $respuesta['cantidadJugadorasEquipo1'];
        $cantidadJugadorasEquipo2 = $respuesta['cantidadJugadorasEquipo2'];

        $idJugadorasEquipo1 = $respuesta['idJugadorasEquipo1'];
        $idJugadorasEquipo2 = $respuesta['idJugadorasEquipo2'];

        $amarillasEquipo1 = $respuesta['amarillasEquipo1'];
        $amarillasEquipo2 = $respuesta['amarillasEquipo2'];

        $rojasEquipo1 = $respuesta['rojasEquipo1'];
        $rojasEquipo2 = $respuesta['rojasEquipo2'];

        // ELEGIR LA O LAS JUGADORAS QUE HALLAN RECIBIDO POR LO MENOS UNA TARJETA
        // SE SUMAN LA CANTIDAD DE TARJETAS AMARILLAS DE LAS JUGADORAS DEL EQUIPO 1 SI LAS RECIBIERON
        for ($i = 0; $i < $cantidadJugadorasEquipo1; $i++) {
            if ($amarillasEquipo1[$i] != 0) {
                include "../../../conexion/conexionServer.php";
                $sql = "SELECT amarillas FROM jugadoras WHERE Id_Jugadora = " . $idJugadorasEquipo1[$i];
                $consulta = mysqli_query($conexion, $sql);
                $mostrar = mysqli_fetch_assoc($consulta);
                $amarillasEquipo1[$i] += $mostrar['amarillas'];
                $sql = "UPDATE jugadoras SET amarillas = $amarillasEquipo1[$i] WHERE Id_Jugadora = " . $idJugadorasEquipo1[$i];
                $actualizar = mysqli_query($conexion, $sql);
                include "../../../conexion/cerrarConexion.php";
            }
        }

        // SE SUMAN LA CANTIDAD DE TARJETAS AMARILLAS DE LAS JUGADORAS DEL EQUIPO 2 SI LAS RECIBIERON
        for ($i = 0; $i < $cantidadJugadorasEquipo2; $i++) {
            if ($amarillasEquipo2[$i] != 0) {
                include "../../../conexion/conexionServer.php";
                $sql = "SELECT amarillas FROM jugadoras WHERE Id_Jugadora = " . $idJugadorasEquipo2[$i];
                $consulta = mysqli_query($conexion, $sql);
                $mostrar = mysqli_fetch_assoc($consulta);
                $amarillasEquipo2[$i] += $mostrar['amarillas'];
                $sql = "UPDATE jugadoras SET amarillas = $amarillasEquipo2[$i] WHERE Id_Jugadora = " . $idJugadorasEquipo2[$i];
                $actualizar = mysqli_query($conexion, $sql);
                include "../../../conexion/cerrarConexion.php";
            }
        }

        // SE SUMAN LA CANTIDAD DE TARJETAS ROJAS DE LAS JUGADORAS DEL EQUIPO 1 SI LAS RECIBIERON
        for ($i = 0; $i < $cantidadJugadorasEquipo1; $i++) {
            if ($rojasEquipo1[$i] != 0) {
                include "../../../conexion/conexionServer.php";
                $sql = "SELECT rojas FROM jugadoras WHERE Id_Jugadora = " . $idJugadorasEquipo1[$i];
                $consulta = mysqli_query($conexion, $sql);
                $mostrar = mysqli_fetch_assoc($consulta);
                $rojasEquipo1[$i] += $mostrar['rojas'];
                $sql = "UPDATE jugadoras SET rojas = $rojasEquipo1[$i] WHERE Id_Jugadora = " . $idJugadorasEquipo1[$i];
                $actualizar = mysqli_query($conexion, $sql);
                include "../../../conexion/cerrarConexion.php";
            }
        }

        // SE SUMAN LA CANTIDAD DE TARJETAS ROJAS DE LAS JUGADORAS DEL EQUIPO 2 SI LAS RECIBIERON
        for ($i = 0; $i < $cantidadJugadorasEquipo2; $i++) {
            if ($rojasEquipo2[$i] != 0) {
                include "../../../conexion/conexionServer.php";
                $sql = "SELECT rojas FROM jugadoras WHERE Id_Jugadora = " . $idJugadorasEquipo2[$i];
                $consulta = mysqli_query($conexion, $sql);
                $mostrar = mysqli_fetch_assoc($consulta);
                $rojasEquipo2[$i] += $mostrar['rojas'];
                $sql = "UPDATE jugadoras SET rojas = $rojasEquipo2[$i] WHERE Id_Jugadora = " . $idJugadorasEquipo2[$i];
                $actualizar = mysqli_query($conexion, $sql);
                include "../../../conexion/cerrarConexion.php";
            }
        }

    }
}
