<?php
/* SE RECIBE LOS ATRIBUTOS NECESARIOS PARA ACTUALIZAR
LOS REGISTROS DE LA TABLA EQUIPOS */
$codigoEncuentro = $_GET['Cod_Encuentro'] ;
$codigoEquipo1 = $_GET['codigoEquipo1'];
$codigoEquipo2 = $_GET['codigoEquipo2'];

// SE INCLUYE LA CONEXION A BASE DE DATOS
include "../../conexion/conexionServer.php";

// SE CONSULTAN LOS PUNTOS DE CADA EQUIPO EN LOS SETS DEL ENCUENTRO
$sql = "SELECT Ptos_Equipo1, Ptos_Equipo2 
        FROM torneovoleibol.zet 
        WHERE Cod_Encuentro = $codigoEncuentro;";
$consulta = mysqli_query($conexion, $sql);

// SE GUARDAN LOS PUNTOS DE CADA EQUIPO POR SET EN EL ARRAY SETS[]
while ($mostrar = mysqli_fetch_assoc($consulta)) {
    $sets[] = $mostrar;
}

// SE INICIAN LOS CONTADORES ENCARGADOS DE DEFINIR EL GANADOR DEL ENCUENTRO
$setsGanadosEquipo1 = 0;
$setsGanadosEquipo2 = 0;

/* SE EVALUA CUAL EQUIPO HIZO MAS PUNTOS EN CADA SET,
Y AL GANADOR SE LE SUMA UN PUNTO POR CADA SET GANADO */
for ($i=0; $i < 3 ; $i++) {
    if ($sets[$i]['Ptos_Equipo1'] > $sets[$i]['Ptos_Equipo2']) {
        $setsGanadosEquipo1 ++;
    } else {
        $setsGanadosEquipo2 ++;
    }
}

// SE EVALUA AL GANADOR TENIENDO EN CUENTA CUANTOS SETS GANO
// TAMBIEN SE CONSULTA LOS PUNTOS PREVIOS
// Y SE LE SUMAN TRES MAS AL GANADOR DEL ENCUENTRO
if ($setsGanadosEquipo1 > $setsGanadosEquipo2) {
    $sql = "SELECT puntosPorPartido 
        FROM torneovoleibol.equipos
        WHERE Cod_Equipo = $codigoEquipo1;";
    $consulta = mysqli_query($conexion, $sql);
    $registro = mysqli_fetch_assoc($consulta);
    $puntosPrevios = $registro['puntosPorPartido'];
    $puntosPrevios += 3;
    $sql = "UPDATE torneovoleibol.equipos
            SET puntosPorPartido = $puntosPrevios  
            WHERE Cod_Equipo = $codigoEquipo1;";
    $actualizar = mysqli_query($conexion, $sql);
} else {
    $sql = "SELECT puntosPorPartido 
        FROM torneovoleibol.equipos
        WHERE Cod_Equipo = $codigoEquipo2;";
    $consulta = mysqli_query($conexion, $sql);
    $registro = mysqli_fetch_assoc($consulta);
    $puntosPrevios = $registro['puntosPorPartido'];
    $puntosPrevios += 3;
    $sql = "UPDATE torneovoleibol.equipos
            SET puntosPorPartido = $puntosPrevios  
            WHERE Cod_Equipo = $codigoEquipo2;";
    $actualizar = mysqli_query($conexion, $sql);
}

$conexion->close();
// SE EVALUA SI YA SE JUGO EL ULTIMO ENCUENTRO DE LA RONDA ACTUAL,
// TOMANDO EL CODIGO DEL ENCUENTRO DE ESE ULTIMO ENCUENTRO Y CON ESTE
// SE EVALUA SI SE SALTA A LA SIGUIENTE RONDA.
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// CAMBIAR EL 47 POR 48 SI SE MODIFCAN LOS CODIGOS DE ENCUENTRO PA QUE INICIEN DESDE 1
if ($codigoEncuentro == 47) {// FASE DE GRUPOS SE JUEGAN 48 PARTIDOS
    header("location: cambiarRonda.php?ronda=1");
} elseif ($codigoEncuentro == 55) {// OCTAVOS DE FINAL SE JUEGAN 8 PARTIDOS
    header("location: cambiarRonda.php?ronda=2");
} elseif ($codigoEncuentro == 59) {// CUARTOS DE FINAL SE JUEGAN 4 PARTIDOS
    header("location: cambiarRonda.php?ronda=3");
} elseif ($codigoEncuentro == 61) {// SEMIFINALES SE JUEGAN 2 PARTIDOS
    header("location: cambiarRonda.php?ronda=4");
} elseif ($codigoEncuentro == 63) {// FINALES SE JUEGAN 2 PARTIDOS
    header("location: cambiarRonda.php?ronda=5");
} else {
    header("location: encuentrosDiarios.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!
// SUMAR UNO MAS A LOS CODIGOS DE LOS ENCUENTROS FINALES SI SE MODIFICARON EN BASE DE DATOS
