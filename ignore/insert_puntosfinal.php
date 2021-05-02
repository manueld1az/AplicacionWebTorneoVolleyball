<?php
    include("../conexion/conexionServe.php");

    $puntos= $_POST["puntos"];
    $idJugadora= $_POST["idJugadora"];
    $codigoEquipo= $_POST["codigoEquipo"];
    $codigoEncuentro= $_POST["codigoEncuentro"];
    $codigoSet= $_POST["codigoSet"];
    $puntosConsultados= "SELECT SUM(puntos) FROM puntaje WHERE 
    idJugadora = $idJugadora AND codigoSet = $codigoSet";
    //primero consultamos la suma de los puntos registrados en puntaje con el idJugadora que 
    //ingresamos por interaz y codigo de set que tambien ingresamos por interfaz.
    //luego los puntos registrados a esa jugadora especificamente en el set consultado, que 
    //ingresamos en la interfaz, se lo sumamos a los puntos en la interfaz de jugadora en el campo
    //puntos con el id_jugadora similar al consultado en puntaje. osea recogemos los puntos del set
    // en puntaje anotados a la jugadora y se los sumamos ya en la tabla jugadoras para tener la 
    //estadistica de cuantos puntos lleva anotados en su interfaz. nota aqui solo estoy modificando 
    //pero se debe modificar el codigo para en vez de modificar sumarle esos puntos, por cada set. 
    $sqlm= "UPDATE jugadoras SET Puntos_Anotados = '$puntosConsultados' WHERE 
    jugadoras.Id_Jugadora = $idJugadora;";
    // $sql = "INSERT INTO puntaje(puntos, idJugadora, codigoEquipo, codigoEncuentro, codigoSet) 
    //         VALUES ( $puntos, $idJugadora, $codigoEquipo, $codigoEncuentro, $codigoSet)";

    if (mysqli_query($conexion, $sql)) {
        header("location: ../../puntos/listarPuntos.php");
    } else {
        echo "Error: ";
    }
    $conexion->close();
?>